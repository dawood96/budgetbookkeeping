<?php

if (isset($_REQUEST['Submit'])) {
  $Name = $_REQUEST['Name'];
  $Subject = $_REQUEST['Subject'];
  $MailFrom = $_REQUEST['Email'];
  $Message = $_REQUEST['Message'];

  $messages = "Name: $Name\n Subject: $Subject\n MailFrom: $MailFrom\n Message: $Message" ;

  mail("tkavanagh28@gmail.com", "You have recieved a message", "Information Requested:\n\n$messages", "From: $MailFrom" );

  header("Location: index.php?mailsend");
}

?>
