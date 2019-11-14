<?php 
if(false) {
    ini_set ('display_errors', 'on');
    ini_set ('log_errors', 'on');
    ini_set ('display_startup_errors', 'on');
    ini_set ('error_reporting', E_ALL);
    $CFG->debug = 30719; // DEBUG_ALL, but that constant is not defined here.
}
// load libraries
date_default_timezone_set('America/Chicago');
// session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
// get global variables
require 'contact-defaults.php';
require 'email-templates.php';

// handleFormSubmit - this is the main call to handle everything
handleFormSubmit();

// main wrapper function to call every other function
function handleFormSubmit() {
    // did we get a POST request?
    if(!isset($_POST) || count($_POST) == 0) {
        sendJSONResponse(false, array("message" => "No post request"));
    }
    // does it have a valid Captcha?
    if(hasValidCaptcha()) {
        // initialize form response
        $formResponse = new FormResponse();
        // validate & check form fields
        if($formResponse->isValidForm()) {
            // perform necessary actions
            $dbResponse  = recordToDatabase($formResponse);
            $apiResponse = recordToAPI($formResponse);
            $emailResponse = sendEmails($formResponse);

            // send response (we assume that if one of these worked, we can accept it as a success)
            sendJSONResponse($dbResponse->success || $apiResponse->success || $emailResponse->success, array(
                "dbRecord"      => $dbResponse,
                "apiRecord"     => $apiResponse,
                "emailRecord"   => $emailResponse
            ));
        } else {
            // invalid email
            sendJSONResponse(false, array("message" => $formResponse->errorMessages));
        }
    } else {
        // captcha was incorrect
        sendJSONResponse(false, array("message" => "Invalid Captcha"));
    }
}
// Validate the Captcha method
function hasValidCaptcha() {
    $captcha = "";
    if (isset($_POST["g-recaptcha-response"]))
        $captcha = $_POST["g-recaptcha-response"];
    if (!$captcha)
        return false;
    //    $secret = '6LdNqaYUAAAAACRW16Imqm0nuQzu7lTihiLC6owk';
    $responseCaptcha = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".Constants::CAPTCHA_SECRET."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);

    if ($responseCaptcha["success"] != false) {
        return true;
    } else {
        return false;
    }
}
// record to the Pintas DB
function recordToDatabase($formResponse) {
    global $DB_CONFIG;
    // save to SQL database
    $conn = sqlsrv_connect( $DB_CONFIG->url, array(
        "Database"  => $DB_CONFIG->table,
        "UID"       => $DB_CONFIG->username,
        "PWD"       => $DB_CONFIG->password
    ));

    if($conn) {
        // echo "Connection established.<br />";
        $sql = "INSERT INTO FormData (FirstName,LastName, Address, PhoneNumber, Email, State, Question, ContactStatus,WebsiteID, createDate, leadAddress) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $params = array(
            
            // form fields
            $formResponse->firstName, 
            $formResponse->lastName, 
            Constants::FROM_EMAIL["email"], 
            $formResponse->phone, 
            $formResponse->email, 
            $formResponse->state,
            $formResponse->message, 
            $formResponse->contactBy, 
            // metadata
            $formResponse->websiteURL,
            $formResponse->today,
            implode(",", Constants::SUBMIT_EMAILS) 
        );
        // send sql
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( !isset($stmt) || $stmt === false ) {
            // sql error
            return new ActionResponse(false, array("message"=> "SQL STMT Failed", "errors" => sqlsrv_errors()));
        }
    }else{
        // echo "Connection could not be established.<br />";
        return new ActionResponse(false, "Connection could not be established.");
    }
    return new ActionResponse(true, "Succesfully recorded to DB");
}
// Send a request to the NewCase API
function recordToAPI($formResponse) {
    $url = 'https://newcasews.pintas.com/basic/websiteleads';
    $data = array(
        'FirstName' => $formResponse->firstName,
        'LastName' => $formResponse->lastName,
        'Email' => $formResponse->email,
        'Phone' => $formResponse->phone,
        'State' => $formResponse->state,
        'Message' => $formResponse->message,
        'utm_Source' => $formResponse->utmSource,
        'utm_Medium' => $formResponse->utmMedium,
        'utm_Campaign' => $formResponse->utmCampaign,
        'utm_Term' => $formResponse->utmTerm,
        'utm_Content' => $formResponse->utmContent,
        'page_path' => $formResponse->websiteURL
    );

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\nAuthorization: Basic aWNvZGljZTooQmZ5aDZIZmg5TXR5dGop\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    // NC API returns -> "success"
    return new ActionResponse(true, "Succesfully sent to API");
}
// Send the Customer the email and all the SUBMIT emails
function sendEmails($formResponse) {
    $response = array();
    // Get global variables
    try {
        // send customer email
        $phpMailer = getPHPMailer();
        $phpMailer->addAddress($formResponse->email);
        $phpMailer->Subject = Constants::CUSTOMER_SUBJECT;
        $phpMailer->Body    = getCustomerEmail($formResponse);
        // store if email send was success
        $response[$formResponse->email] = $phpMailer->send();
        // send pintas emails
        foreach (Constants::SUBMIT_EMAILS as $email) {
            $phpMailer = getPHPMailer();
            $phpMailer->addAddress($email);
            // build the dynamic pintas subject line
            $fullName = $formResponse->firstName." ".$formResponse->lastName;
            $phpMailer->Subject = str_replace("[FromCustomer]", $fullName, Constants::PINTAS_SUBJECT);
            $phpMailer->Body    = getAdminEmail($formResponse);
            // store if email send was success
            $response[$email] = $phpMailer->send();
        }
        return new ActionResponse(true, $response);
    } catch (Exception $e) {
        return new ActionResponse(false, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}

// == Helper Functions ==
function isValidEmail($email) {
    return(preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email ));
}
function sendJSONResponse($success, $data) {
    header('Content-type:application/json;charset=utf-8');
    $response = array('success' => $success, 'data' => $data);
    echo json_encode($response);
    die();
}
function getPHPMailer() {
    $phpMailer = new PHPMailer();
    $phpMailer->IsSMTP();
    $phpMailer->Host        = Constants::SMTP_CONFIG['host'];
    $phpMailer->Port        = Constants::SMTP_CONFIG['port'];
    $phpMailer->SMTPAuth    = false;
    $phpMailer->SMTPAutoTLS = false;
    $phpMailer->AuthType    = "CRAM-MD5";
    $phpMailer->IsHTML(true);
    // $phpMailer->addCustomHeader('From', Constants::FROM_EMAIL["email"]);
    $phpMailer->addCustomHeader('MIME-Version: 1.0');
    $phpMailer->addCustomHeader('Content-type: text/html; charset=ISO-8859-1');
    // Set FROM EMAIL
    $phpMailer->setFrom(Constants::FROM_EMAIL["email"], Constants::FROM_EMAIL["name"]);
    // temporarily add BCC
    $phpMailer->addBCC('tem@icodice.com');
    return $phpMailer;
}
?>

<?php
// MARK: Helper Classes
class ActionResponse {
    public $success;
    public $response;

    public function __construct($success, $response) {
        $this->success  = $success;
        $this->response = $response;
    }
}
class FormResponse {
    // metadata
    public $websiteURL;
    public $today;
    // form fields
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $state;
    public $contactBy;
    public $message;
    // seo/ad related
    public $utmSource;
    public $utmContent;
    public $utmCampaign;
    public $utmMedium;
    public $utmTerm;

    public $errorMessages = array();
    // MARK: Class Methods
    public function isValidForm() {
        // reset error messages
        $this->errorMessages = array();
        // check if valid
        if ( $this->firstName == '' ) { array_push($this->errorMessages, "First Name is a required field"); }
        if ( $this->lastName  == '' ) { array_push($this->errorMessages, "Last Name is a required field"); }
        // check if email AND phone is empty
        if ($this->email == '' && $this->phone == '') {
            array_push($this->errorMessages, "Phone or Email is a required field");
        }
        // if it has an email, and the email is invalid
        if ($this->email != '' && !isValidEmail($this->email)) {
            array_push($this->errorMessages, "The entered email address is invalid");
        }
        // if has any errors it is false
        if(count($this->errorMessages) > 0) {
            return false;
        }
        return true;
    }
    
    // things that need to be init automatically
    private function init() {
        $this->assignWebsiteURL();
        // assign date
        $this->today = date("F j, Y, g:i a");
    }
    // MARK: Constructors
    function __construct() {
        $this->init();
        $a = func_get_args(); 
        $i = func_num_args(); 

        if(isset($_POST)) {
            $this->__constructWithPOST();
        } else if ($i == 6){
            if (method_exists($this,$f='__constructWithForm')) { 
                call_user_func_array(array($this,$f),$a); 
            } 
        }
    }
    public function __constructWithForm($firstName, $lastName, $email, $phone, $state, $contactBy, $message) {
        // assign fields
        $this->firstName    = trim($firstName);
        $this->lastName     = trim($lastName);
        $this->email        = trim($email);
        $this->phone        = trim($phone);
        $this->state        = trim($state);
        $this->contactBy    = trim($contactBy);
        $this->message      = trim($message);
    }
    // assume that there is a $_POST;
    public function __constructWithPOST() {
        // assign fields
        $this->firstName    = trim($this->getFromPOST('firstname'));
        $this->lastName     = trim($this->getFromPOST('lastname'));
        $this->email        = trim($this->getFromPOST('email'));
        $this->phone        = trim($this->getFromPOST('phone'));
        $this->state        = trim($this->getFromPOST('state'));
        $this->contactBy    = trim($this->getFromPOST('contact-by'));
        $this->message      = trim($this->getFromPOST('message'));

        $this->utmSource    = trim($this->getFromPOST('utm_source'));
        $this->utmContent   = trim($this->getFromPOST('utm_content'));
        $this->utmCampaign  = trim($this->getFromPOST('utm_campaign'));
        $this->utmMedium    = trim($this->getFromPOST('utm_medium'));
        $this->utmTerm      = trim($this->getFromPOST('utm_term'));
    }

    // Helper functions for class
    private function assignWebsiteURL() {
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }else{
            $protocol = 'http';
        }
        $this->websiteURL = $protocol . "://" . $_SERVER['HTTP_HOST'];
    }

    private function getFromPOST($name) {
        if(array_key_exists($name, $_POST)) {
            return $_POST[$name];
        } else {
            return null;
        }
    }
}
?>