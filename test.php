<?php
$to = "erikanacua@gmail.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.mek mek mek";
$from = "erika_kyut_toink@yahoo.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>