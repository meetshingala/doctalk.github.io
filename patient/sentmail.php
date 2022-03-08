<?php

if(isset($_POST['submit'])) {
$mailto = $_POST['pemail'];

$name = $_POST['dname'];
$fromEmail = $_POST['demail'];
$Category = $_POST['expertise'];
$Date = $_POST['dates'];
$Time = $_POST['time'];
$Name = $_POST['pname'];
$contact = $_POST['pcontact'];

$message = "doctor name: " . $name . "\n"
. "Category: " . $Category . "\n\n"
. "Date: " . $Date . "\n\n"
. "Time: " . $Time . "\n\n" 
. "Regards," . "\n" . " - Doctalk ";

$message2 = "Patient name: " . $Name . "\n"
. "Patient contact " . $contact . "\n\n"
. "Date: " . $Date . "\n\n"
. "Time: " . $Time . "\n\n" 
. "Regards," . "\n" . " - Doctalk ";

$headers = "From:" . $fromEmail;
$headers2 = "From:" . $mailto;

//php mailer function
$result1 = mail($mailto, $message, $headers);
$result2 = mail($fromEmail, $message2, $headers2);

if ($result1 && $result2) {
	$success = "your massage was sent successfully!";
}else {
	$failed = "Sorry! message was not sent successfully, try again letter.";
}

}

?>