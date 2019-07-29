<?php
date_default_timezone_set('America/Chicago');
// session_start();
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

/* ------------------------------------
 * just replace email address with your email address
  --------------------------------------------- */
//Swap later

$address = "webmaster@pintas.com";

// Email address verification, do not edit this part.
function isEmail( $email ) {
    return(preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email ));
}

if ( !defined( "PHP_EOL" ) )
    define( "PHP_EOL", "\r\n" );

// UTM Params
// if(isset($_GET['utm_source'])) {
// 	$_SESSION['utmSource'] = $_GET['utm_source'];
// }
// if(isset($_GET['utm_medium'])) {
// 	$_SESSION['utmMedium'] = $_GET['utm_medium'];
// }
// if(isset($_GET['utm_campaign'])) {
// 	$_SESSION['utmCampaign'] = $_GET['utm_campaign'];
// }
// if(isset($_GET['utm_term'])) {
// 	$_SESSION['utmTerm'] = $_GET['utm_term'];
// }
// if(isset($_GET['utm_content'])) {
// 	$_SESSION['utmContent'] = $_GET['utm_content'];
// }


function sendContactEmail(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    $websiteUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];

    global $address;
    if ( !$_POST )
        return false;
    $fname;$lname;$email;$phone;$state;$msg;$utmSource;$utmContent;$utmCampaign;$utmMedium;$utmTerm;

    $captcha = "";
    if (isset($_POST["g-recaptcha-response"]))
        $captcha = $_POST["g-recaptcha-response"];
    if (!$captcha)
        echo "emptyCaptcha";
    $secret = '6LfIxasUAAAAAMCPVvoFC83DhmvTALERnGmRU8K8';
//    $secret = '6LdNqaYUAAAAACRW16Imqm0nuQzu7lTihiLC6owk';
    $responseCaptcha = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);

    if ($responseCaptcha["success"] != false) {
        if(isset($_POST['firstname']))
            $fname=$_POST['firstname'];
        if(isset($_POST['lastname']))
            $lname=$_POST['lastname'];
        if(isset($_POST['email']))
            $email=$_POST['email'];
        if(isset($_POST['phone']))
            $phone=$_POST['phone'];
        if(isset($_POST['state']))
            $state=$_POST['state'];
        if(isset($_POST['contact-by']))
            $contactBy=$_POST['contact-by'];
        if(isset($_POST['message']))
            $msg=$_POST['message'];
        if(isset($_POST['utm_source']))
            $utmSource=$_POST['utm_source'];
        if(isset($_POST['utm_content']))
            $utmContent=$_POST['utm_content'];
        if(isset($_POST['utm_campaign']))
            $utmCampaign=$_POST['utm_campaign'];
        if(isset($_POST['utm_medium']))
            $utmMedium=$_POST['utm_medium'];
        if(isset($_POST['utm_term']))
            $utmTerm=$_POST['utm_term'];
        if ( trim( $fname ) == '' || trim( $lname ) == '') {
            echo '<h2>Please enter your name</h2>';
            return false;
        } else if ( trim( $email ) == '' ) {
            echo '<h2> Please enter a valid email address :)</h2>';
            return false;
        } else if ( !isEmail( $email ) ) {
            echo '<h2>You have entered an invalid e-mail address.</h2>';
            return false;
        }

        if ( get_magic_quotes_gpc() ) {
            $msg = stripslashes( $msg );
        }

        // /* ------------------------------------
        //   // Configuration option.
        //   // i.e. The standard subject will appear as, "You've been contacted by XpeedStudio ."
        //   // Example, $e_subject = '$name . ' has contacted you via Your Website.';
        //   --------------------------------------------- */


        $leadData = "questions@pintas.com";
        $serverName = "pintassql.database.windows.net, 1433";
        $connectionInfo = array( "Database"=>"pintasforms", "UID"=>"pintasadmin", "PWD"=>"1C@dice368");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

        if( $conn ) {
            echo "Connection established.<br />";
        }else{
            echo "Connection could not be established.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        $today = date("F j, Y, g:i a");

        $sql = "INSERT INTO FormData (FirstName,LastName, Address, PhoneNumber, Email, Question, ContactStatus,WebsiteID, createDate, leadAddress,State) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $params = array($fname, $lname, $address, $phone, $email, $msg, $contactBy,$websiteUrl, $today,$leadData,$state);
        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }

        $c_msg = '
	<html><body>
		<table width="800px" border="0" cellpadding="0" style="width:700px; text-align:center;background: #FFF;padding:7px;">
			<tbody>
				<tr style="background:#222946">
					<td align="center" style="padding:10px;">
						<span>
							<font face="Open Sans,sans-serif" size="5" color="#000">
                                <img src="https://uscabuselawyers.com/assets/USCAbuseLawyers.com@300.png" width="400">
							</font>
						</span>
					</td>
				</tr>
				<tr>
					<td height="50"></td>
				</tr>
				<tr>
					<td style="text-align: center;padding-left:25px; padding-right:25px;">
						<span>
							<font face="Open Sans,sans-serif">
								<span style="font-size:35px; font-weight: bold;color: #9AA5C2;">
									THANK YOU FOR CONTACTING
								</span>
							</font>
						</span>
					</td>
				</tr>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td style="text-align: center;padding-left:25px; padding-right:25px;">
						<span>
							<font>
								<span style="font-size:45px;font-weight: bold;">
									Pintas & Mullins Law Firm
								</span>
							</font>
						</span>
					</td>
				</tr>
				<tr>
					<td height="25"></td>
				</tr>
				<tr>
					<td align="center" style="text-align: left;padding-left:25px; padding-right:25px;" width="600">
						<span>
							<font face="Open Sans,sans-serif">
								<span style="font-size:28px;">
									We have received your information and will be in touch with you shortly. You may reach one of our attorneys or paralegals at 800-657-3555 or by email at <a href="mailto:Questions@pintas.com">Questions@pintas.com</a>
								</span>
							</font>
						</span>
					</td>
				</tr>
			</tbody>
		</table></html></body>';

        $c_esubject = 'Re: Thank you for contacting the Pintas and Mullin Law Firm';

        if($utmSource == 'facebook' && ($utmCampaign == 'lawscout' || $utmCampaign == 'lawscout2')) {
            $e_subject = 'Re: USCAbuseLawyers.com Contact Request (Facebook - Law Scout)';
        } else {
            $e_subject = 'Re: USCAbuseLawyers.com Contact Request';
        }


        // // You can change this if you feel that you need to.
        $e_body		 = "You have been contacted by: $fname $lname, <br/>their information is as follows." . PHP_EOL . PHP_EOL;
        $e_phone	 = "Phone: $phone" . PHP_EOL . PHP_EOL;
        $e_state	 = "State: $state" . PHP_EOL . PHP_EOL;
        $e_email	 = "Email: $email" . PHP_EOL . PHP_EOL;
        $e_options	 = "Contact via: $contactBy" . PHP_EOL . PHP_EOL;
        // $e_camp  	 = "Campaign: $utmCampaign" . PHP_EOL . PHP_EOL;
        // $e_options_shower	 = "Did you or your loved one use baby powder or Shower to Shower products for at least four years in a row: $babyShower" . PHP_EOL;
        // $e_options_cancer	 = "Were you or a loved one diagnosed with ovarian cancer after 2000: $ovarianCancer" . PHP_EOL;
        // $e_options_surgery	 = "Did you or your loved one undergo surgery for ovarian cancer: $undergoSurgery" . PHP_EOL;
        $e_msg	 	 = "Message: $msg" . PHP_EOL . PHP_EOL;
        // $e_reply	 = "You can contact $name via email, $email ";

        $msg = wordwrap($e_body. "<br />"  .
            $e_phone . "<br />" .
            $e_email . "<br />" .
            $e_state . "<br />"  .
            $e_options . "<br />" .
            $e_msg . "<br />", 70 );

        $leadAddress = array("questions@pintas.com");
        $clientAddress = "questions@pintas.com";
        // Client email
        $clientEmail = new PHPMailer\PHPMailer\PHPMailer();
        $clientEmail->IsSMTP(); // enable SMTP
        $clientEmail->Host = 'smtp.office365.com';
        $clientEmail->Port       = 587;
        $clientEmail->SMTPSecure = 'tls';
        $clientEmail->SMTPAuth   = true;
        $clientEmail->Username = 'webmaster@pintas.com';
        $clientEmail->Password = 'Icodice325';
        $clientEmail->SetFrom($address, 'FromEmail'); //from address(email will go from this address)
        $clientEmail->AddReplyTo($clientAddress, 'Replay-To');//reply address(client will reply to this email)
        $clientEmail->addAddress($email, 'ToEmail');//to address(clients)
        $clientEmail->IsHTML(true);
        $clientEmail->addCustomHeader('From', $address);
        $clientEmail->addCustomHeader('MIME-Version: 1.0');
        $clientEmail->addCustomHeader('Content-type: text/html; charset=ISO-8859-1');
        $clientEmail->Subject = $c_esubject;
        $clientEmail->Body    = $c_msg;
        foreach ($leadAddress as $items) {
            //PINTAS email
            $pintasEmail = new PHPMailer\PHPMailer\PHPMailer();
            $pintasEmail->IsSMTP(); // enable SMTP
            $pintasEmail->Host = 'smtp.office365.com';
            $pintasEmail->Port = 587;
            $pintasEmail->SMTPSecure = 'tls';
            $pintasEmail->SMTPAuth = true;
            $pintasEmail->Username = 'webmaster@pintas.com';
            $pintasEmail->Password = 'Icodice325';
            $pintasEmail->SetFrom($address, 'FromEmail');//(email will go from this address)
            $pintasEmail->addAddress($items, 'ToEmail');//lead will go to this address
            $clientEmail->AddReplyTo($email, 'Replay-To');//reply address(lead will reply to this email(client's email))
            // $pintasEmail->addAddress('bold@icodice.com', 'ToEmail');
            $pintasEmail->IsHTML(true);
            $pintasEmail->addCustomHeader('From', $email);
            // $pintasEmail->addCustomHeader('Reply-To', $email);
            $pintasEmail->addCustomHeader('MIME-Version: 1.0');
            $pintasEmail->addCustomHeader('Content-type: text/plain; charset=utf-8');
            $pintasEmail->addCustomHeader('Content-Transfer-Encoding: quoted-printable');
            $pintasEmail->Subject = $e_subject;
            $pintasEmail->Body = $msg;
            $pintasEmail->send();
        }
        if ( $clientEmail->send() ) {

            $url = 'https://newcasews.pintas.com/basic/websiteleads';
            $data = array(
                'FirstName' => $fname,
                'LastName' => $lname,
                'Email' => $email,
                'Phone' => $phone,
                'State' => $state,
//                'Contact_Pref' => $contactBy,
                'Message' => $msg,
                'utm_Source' => $utmSource,
                'utm_Medium' => $utmMedium,
                'utm_Campaign' => $utmCampaign,
                'utm_Term' => $utmTerm,
                'utm_Content' => $utmContent,
                'page_path' => $websiteUrl
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
            die();
        } elseif(!$pintasEmail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $pintasEmail->ErrorInfo;
        } elseif(!$clientEmail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $clientEmail->ErrorInfo;
        }
        else {
            echo "<div id='success_page' class='contactform-response text-white'><h2>Message not sent. Please try again. </h2></div>";
            // var_dump($msg);
        }
    }
}
sendContactEmail();
function get_content($URL){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $URL);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
?>
