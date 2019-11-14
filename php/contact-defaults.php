<?php
// MARK: Create the Configs
$DB_CONFIG = new DatabaseConfig("pintassql.database.windows.net, 1433", "pintasforms", "pintasadmin", "1C@dice368");
// constants
class Constants {
    // set basic smtp config
    const SMTP_CONFIG = array(
        'host' => 'ezmail.icodice.com',
        'port' => 5252
    );
    const FROM_EMAIL    = array("email"=>"questions@pintas.com", "name"=> "P&M");
    // const SUBMIT_EMAILS = array("questions@pintas.com");
    const SUBMIT_EMAILS = array("pearl@icodice.com");
    // EMAIL CONTENT
    const CUSTOMER_SUBJECT  = "Thank you for contacting the Pintas & Mullins Law Firm";
    const PINTAS_SUBJECT    = "USCAbuseLawyers.com - Contact Request ([FromCustomer])";
    // Email Templates
    const EMAIL_LOGO_URL    = "https://uscabuselawyers.com/assets/USCAbuseLawyers.com@300.png";
    const EMAIL_PHONE_NUM   = "800-657-3555";

    const CAPTCHA_SECRET = '6LfIxasUAAAAAMCPVvoFC83DhmvTALERnGmRU8K8';
}
?>

<?php 
// MARK: Helper Classes
class DatabaseConfig {
    public $url;
    public $table;
    public $username;
    public $password;
    
    public function __construct($url, $table, $user, $pass) {
        $this->url = $url;
        $this->table = $table;
        $this->username = $user;
        $this->password = $pass;
    }
}
?>