<?php
// session_start();
ini_set('SMTP', 'wgpserver.pintas.com'); 
ini_set('smtp_port', 2525); 
ini_set('SMTP', 'smtp.office365.com');
ini_set('smtp_port', 587);  
ini_set('smtp_auth', true);  
ini_set('smtp_ssl', 'tls');  
ini_set('auth_username', 'WebMaster@pintas.com');
ini_set('auth_password', 'Icodice325');  
ini_set('Host', 'webmaster@pintas.com');
// $host = "smtp.office365.com";
// $username = "WebMaster@pintas.com";
// $password = "Icodice325";
// $to = "bold@icodice.com";


// SMTP Username: (WebMaster@pintas.com)
// SMTP Password: (Icodice325)
/* ------------------------------------
 * just replace email address with your email address
  --------------------------------------------- */
//Swap later
// $address = "questions@pintas.com";
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
	
	global $address;
	if ( !$_POST )
		return false;
	$fname;$lname;$email;$phone;$state;$contactBy;$msg;$utmSource;$utmContent;$utmCampaign;$utmMedium;$utmTerm;
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
	
	if ( get_magic_quotes_gpc() ) {
		$msg = stripslashes( $msg );
	}


	// /* ------------------------------------
	//   // Configuration option.
	//   // i.e. The standard subject will appear as, "You've been contacted by XpeedStudio ."
	//   // Example, $e_subject = '$name . ' has contacted you via Your Website.';
	//   --------------------------------------------- */
	$Body='
<!DOCTYPE html>
    <html>
      <body>
        <table style="font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; min-width:600px; max-width: 600px;" >
  <tr>
            <td colspan="3" align="center" style="text-align: center;background-color: #010A24;padding:20px; min-width:; width:;max-width:; word-wrap: break-word;">
              <img src="'.$root.'/contact-us/images/logo-cropped.png" alt="Header Image" width="200" style="display:block;"><br/><br/>
              <span style="color:#FFF;font-size: 25px;">YOUR LEAD INFORMATION</span>
            </td>
    </tr>
    <tr>
        <td colspan="3" style="padding:20px;background-color:#fff; min-width:; width:;max-width:; word-wrap: break-word;">
              You have been contacted by '.$FirstName.' '.$LastName.', their message is as follows:<br/><br/>
              '.$Message.'
            </td>
    </tr>
    <tr width="250" style="background-color:#94000E;">
                        <td colspan="3" style="font-weight:700;padding:15px;text-align:center;border:none; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="color:#FFF;font-size:18px;">Contact Information</span>
                        </td>
                      </tr>
    <tr>
    <td style="text-align:left; padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Email:</span>'.$EmailAddress.'</span>
                        </td>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Phone:</span> '.$Phone.'</span>
                        </td>
     <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">State:</span> '.$State.'</span>
                        </td>
  </tr>
  <tr>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Contact By:</span> '.$ContactBy.'</span>
                        </td>
   <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Heard Via:</span> '.$HowDidYouHear.'</span>
                        </td>
   <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Contact from Page:</span> '.$pageUrl.'</span>
                        </td>
  </tr>
  <tr>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">IP Address:</span> '.$ip.'</span>
                        </td>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">UTM Source:</span> '.$Source.'</span>
                        </td>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">IP Address:</span> '.$ip.'</span>
                        </td>
  </tr>
  <tr>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Medium:</span> '.$Medium.'</span>
                        </td>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Campaign:</span> '.$Campaign.'</span>
                        </td>
    <td style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Search Terms:</span> '.$Terms.'</span>
                        </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;padding:10px; min-width:; width:;max-width:; word-wrap: break-word;">
                          <span style="font-size:15px"><span style="font-weight: 700;font-size: 16px;">Content:</span> '.$Content.'</span>
                        </td>
  </tr>
  <tr><td colspan="3" style="background-color:#fff"></td></tr>
  <tr style="background-color: #EEE;text-align: center; padding-top:10px;">
  <td colspan="3" style="padding:15px 0; font-size: 13px; text-align:center;">
              <span style="font-weight:700;">Pintas & Mullins Law Firm</span><br/><br/>
              368 W. Huron st, Suite 100<br/>
              Chicago, IL 60654<br/>
              (800) 774-7120
            </td>
  </tr>
</table>
      </body>
    </html>'; 
    
	$c_msg = '
	<html><body>
		<table width="800px" border="0" cellpadding="0" style="width:700px; text-align:center;background: #FFF;padding:7px;">
			<tbody>
				<tr style="background:#222946">
					<td align="center" style="padding:10px;">
						<span>
							<font face="Open Sans,sans-serif" size="5" color="#000">
								<img src="https://www.3mearplugssettlement.com/assets/images/3mearplugsettlement-logo-small.png" width="400">
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
									We have received your information and will be in touch with you shortly. You may reach one of our attorneys or paralegals at 800-537-2555. 
								</span>
							</font>
						</span>
					</td>

				</tr>
			</tbody>
		</table></html></body>';
	$c_esubject = 'Re: Thank you for contacting the Military Hearing Loss lawyers at Pintas & Mullins Law Firm';
	$c_headers = "From: $address" . PHP_EOL;
	$c_headers .= "Reply-To: $address" . PHP_EOL;
	$c_headers .= "MIME-Version: 1.0" . PHP_EOL;
	$c_headers .= "Content-type: text/html; charset=ISO-8859-1" . PHP_EOL;

	if($utmSource == 'facebook' && ($utmCampaign == 'lawscout' || $utmCampaign == 'lawscout2')) {
		$e_subject = 'Re: StoptheAbuse.com Contact Request (Facebook - Law Scout)';
	} else {
		$e_subject = 'Re: StoptheAbuse.com Contact Request';
	}
	

	// // You can change this if you feel that you need to.

	$e_body		 = "You have been contacted by $fname $lname, their information is as follows." . PHP_EOL . PHP_EOL;
	$e_phone	 = "Phone: $phone" . PHP_EOL . PHP_EOL;
	$e_state	 = "State: $state" . PHP_EOL . PHP_EOL;
	$e_email	 = "Email: $email" . PHP_EOL . PHP_EOL;
	$e_options	 = "Contact via: $contactBy" . PHP_EOL . PHP_EOL;
	$e_msg	 	 = "Message: $msg" . PHP_EOL . PHP_EOL;
	$e_campaign  = "utmCampaign: $utmCampaign" . PHP_EOL . PHP_EOL;
	// $e_reply	 = "You can contact $name via email, $email ";

	$msg = wordwrap( $e_body . $e_phone . $e_email . $e_state . $e_options . $e_msg, 70 );

	$headers = "From: $email" . PHP_EOL;
	$headers .= "Reply-To: $email" . PHP_EOL;
	$headers .= "MIME-Version: 1.0" . PHP_EOL;
	$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
	$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

	$pintasEmail =  mail( "webmaster@pintas.com", $e_subject, $msg, $headers );
	$clientEmail = mail( $email, $c_esubject, $c_msg, $c_headers );
	// $pintasEmail = mail( $address, $e_subject, $msg, $headers );
	// $clientEmail = mail( $email, $c_esubject, $c_msg, $c_headers );

		echo "test";
		var_dump($email);
		var_dump($c_esubject);
		var_dump($c_msg);
		var_dump($c_headers);
		echo "test";
	

	if ($clientEmail && $pintasEmail ) {

		$url = 'https://newcasews.pintas.com/basic/websiteleads';
		$data = array(
			'FirstName' => $fname, 
			'LastName' => $lname, 
			'Email' => $email,
			'Phone' => $phone, 
			'State' => $state,
			'Contact_Pref' => $contactBy, 
			'Message' => $msg,
			'utm_Source' => $utmSource,
			'utm_Medium' => $utmMedium,
			'utm_Campaign' => $utmCampaign,
			'utm_Term' => $utmTerm,
			'utm_Content' => $utmContent
		);

		// use key 'http' even if you send the request to https://...
		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/json\r\nAuthorization: Basic aWNvZGljZTooQmZ5aDZIZmg5TXR5dGop\r\n",
		        'method'  => 'POST',
		        'content' => json_encode($data)
		    )
		);
		// var_dump($options);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		// header("Location: https://www.cerebralpalsybirthinjury.com/thank-you/");

		//ALERTs API
		
		// $url1 = 'https://intakes.alertcommunications.com/Lawruler-Parsing.aspx?Key=nvcCXw4GtS6hp1TedDcbktWpi7SRJ2&CompanyID=209&LeadProvider=Email%20Lead%204305&ReturnXML=True&FirstName='.urlencode($fname).'&LastName='.urlencode($lname).'&CellPhone='.urlencode($phone).'&Address1=1234%20MainSt.&City=Ventura&State='.urlencode($state).'&Zip=93003&Language=17&Email1='.urlencode($email).'&Summary='.urlencode($msg).'&Address2='.urlencode($utmCampaign).'&CaseType=Unknown';
		
		// $options1 = array(
	 //    	'http' => array(
		//         'method'  => 'GET'
		//         // 'content' => json_encode($data1)
	 //    	)
		// );
		// // var_dump($options1);
		// $context1  = stream_context_create($options1);
		// $result1 = file_get_contents($url1);
		// var_dump($result1);

	
		die();
	} else {
		echo "<div id='success_page' class='contactform-response text-white'><h2>Message not sent. Please try again. </h2></div>";
		// var_dump($msg);
	}
}
// if(isset($_POST['submit'])) {
	sendContactEmail();
// }


function get_content($URL){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $URL);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
?>
