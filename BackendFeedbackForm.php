<?php

if (isset($_POST['Submit'])) {
  $name = $_POST['name'];
  $Subject = $_POST['Subject'];
  $mailFrom = $_POST['e-mail'];
  $message = $_POST['message'];


  $mailTo = "tyler_kavanagh@yahoo.com";
  $headers = "From: ".$mailFrom;
  $txt = "You have recieved an e-mail from Budgetbooking Customer Feedback form ".$name.". \n\n" .$message;

  mail($mailTo, $Subject, $txt, $headers);
  header("location: index.php?mailsend");
}

?>
