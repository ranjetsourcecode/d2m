<?php
/* Code by David McKeown - craftedbydavid.com */
/* Editable entries are bellow */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);
    return $entry;
}


$send_to = "manikandan@odigma.ooo,sales@vajramgroup.com, manisha@enthusionz.com";
$send_subject = "Website Sticky Form Enquiry";

/*Be careful when editing below this line */

$f_name = $data['name']=  cleanupentries($_POST["name"]);
$f_email = $data['email']=  cleanupentries($_POST["email"]);
$f_phone = $data['phone']=  cleanupentries($_POST["phone"]);
$f_veh = cleanupentries($_POST["vehicle"]);
$f_msg = $data['message']=  cleanupentries($_POST["msg"]);

$data['pageUrl'] = filter_var($_POST["pageUrl"], FILTER_SANITIZE_URL);



// $headers = "MIME-Version: 1.0\n" ;
// $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
// $headers .= "X-Priority: 1 (Highest)\n";
// $headers .= "X-MSMail-Priority: High\n";
// $headers .= "Importance: High\n";

if((preg_match("/^[a-zA-Z]+$/", $f_name) == 1) && (preg_match("/^[0-9]{10}+$/", $f_phone) == 1)){
	sendCRM($data);

$headers = "From: Vajram<info@vajramgroup.com>"."\r\n";

$headers .="Content-type: text/html; charset=iso-8859-1; format=flowed\n";

$headers .="MIME-Version: 1.0\n";

$headers .="Content-Transfer-Encoding: 8bit\n";

$headers .="X-Mailer: PHP\n";


$message = "This email was submitted on " . date('m-d-Y') .  "<br><br>".
"\n\nName: " . $f_name .  "<br><br>".
"\n\nE-mail: " . $f_email . "<br><br>".
"\n\nE-phone: " . $f_phone . "<br><br>".
"\n\nE-phone: " . $f_veh . "<br><br>".
"\n\nmessage: \n" . $f_msg; 


$send_subject .= " - {$f_name}";

// $headers = "";


    if (filter_var($f_email, FILTER_VALIDATE_EMAIL) ) {
        
		$send = mail($send_to, $send_subject, $message, $headers);
		if($send)
				echo 'mail sent';
			else 
				echo 'mail not sent';
        		
	}
}
else
	echo 'invalid data';

function sendCRM($data){

	$utm_source = (isset($data['utm_source']) ? $data['utm_source'] : '');
	$utm_campaign = (isset($data['utm_campaign']) ? $data['utm_campaign'] : '');
	
	$apartment_type = (isset($data['apartment-type']) ? $data['apartment-type'] : '');
	$email = (isset($data['email']) ? $data['email'] : '');
	$message = (isset($data['message']) ? $data['message'] : '');


    $url = 'https://vajram.secure.force.com/webapi';
    $_data = array(
    		'fname' => $data['name'],
    		'lstname' => '',
    		'email' => $email,
    		'mobile' => $data['phone'],
    		'project' => $data['project'],
    		'utmid' => $utm_source,
    		'campaign' => $utm_campaign,
    		'msg' => $message,
    		'Aptype' => $apartment_type,
    		'lpurl	' => $data['pageUrl']
        ); 

   
   
    // foreach ($forms as $key => $value) {
    //     $data[$key] = $value;
    // }

    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($_data));
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec( $ch );

    echo $response;
}
?>