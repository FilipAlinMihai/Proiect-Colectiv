<?php
// Using the ini_set()
ini_set("SMTP", "mail.zend.com");
ini_set("sendmail_from", "shlomo@zend.com");
//ini_set("smtp_port", "25");

// The message
$message = "The mail message was sent with the following mail setting:\r\nSMTP = mail.zend.com\r\nsmtp_port = 25\r\nsendmail_from = YourMail@address.com";

// Send
$headers = "From: shlomo@zend.com";

mail('shlomo@zend.com', 'My Subject', $message, $headers);

echo "Check your email now....<BR>";
?>
?>

