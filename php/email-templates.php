<?php
/*
    contact-defaults.php is a pre-requisite

    This file is for managing all the email templates, this does not work standalone.
    Must be required/included from the main PHP file
*/

// == Email Template ==
function getAdminEmail($formResponse) {
    $e_body		 = "You have been contacted by: $formResponse->firstName $formResponse->lastName, <br/>their information is as follows.";
    $e_phone	 = "Phone: $formResponse->phone";
    $e_state	 = "State: $formResponse->state";
    $e_email	 = "Email: $formResponse->email";
    $e_options	 = "Contact via: $formResponse->contactBy";
    $e_msg	 	 = "Message: $formResponse->message";
    return '
    <!doctype html>
        <html>
        <head>
            <meta name="viewport" content="width=device-width">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style>
            /* -------------------------------------
                RESPONSIVE AND MOBILE FRIENDLY STYLES
            ------------------------------------- */
            @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }
            table[class=body] p,
                    table[class=body] ul,
                    table[class=body] ol,
                    table[class=body] td,
                    table[class=body] span,
                    table[class=body] a {
                font-size: 16px !important;
            }
            table[class=body] .wrapper,
                    table[class=body] .article {
                padding: 10px !important;
            }
            table[class=body] .content {
                padding: 0 !important;
            }
            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
            }
            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }
            table[class=body] .btn table {
                width: 100% !important;
            }
            table[class=body] .btn a {
                width: 100% !important;
            }
            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
            }

            /* -------------------------------------
                PRESERVE THESE STYLES IN THE HEAD
            ------------------------------------- */
            @media all {
            .ExternalClass {
                width: 100%;
            }
            .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                line-height: 100%;
            }
            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }
            .btn-primary table td:hover {
                background-color: #34495e !important;
            }
            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
            }
            </style>
        </head>
        <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
            <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
            <tr>
                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
                <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

                    <!-- START CENTERED WHITE CONTAINER -->
                    <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                            <tr>
                            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$e_body.'</p>
                                
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;">
                                '.$e_phone.'
                                </p>
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;">
                                '.$e_state.'
                                </p>
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;">
                                '.$e_email.'
                                </p>
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;">
                                '.$e_options.'
                                </p>
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;Margin-bottom: 15px;">
                                '.$e_msg.'
                                </p>

                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0;">
                                Request made from '.$formResponse->websiteURL.'
                                </p>
                            </td>
                            </tr>
                        </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                    </table>

                    <!-- START FOOTER -->
                    <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                        <tr>
                        <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                            Powered by iCodice FlyMail </a>.
                        </td>
                        </tr>
                    </table>
                    </div>
                    <!-- END FOOTER -->

                <!-- END CENTERED WHITE CONTAINER -->
                </div>
                </td>
                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
            </tr>
            </table>
        </body>
    </html>
    ';
}
function getCustomerEmail($formResponse) {
    return '
	<html><body>
		<table width="800px" border="0" cellpadding="0" style="width:700px; text-align:center;background: #FFF;padding:7px;">
			<tbody>
				<tr style="background:#222946">
					<td align="center" style="padding:10px;">
						<span>
							<font face="Open Sans,sans-serif" size="5" color="#000">
                                <img src="'.Constants::EMAIL_LOGO_URL.'" width="400">
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
									We have received your information and will be in touch with you shortly. You may reach one of our attorneys or paralegals at '.Constants::EMAIL_PHONE_NUM.' or by email at <a href="mailto:'.Constants::FROM_EMAIL["email"].'">'.Constants::FROM_EMAIL["email"].'</a>
								</span>
							</font>
						</span>
					</td>
				</tr>
			</tbody>
        </table>
    </body></html>';
}
?>