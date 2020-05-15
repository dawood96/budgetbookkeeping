<?php

/* 
@author David Shammas
@version 5/15/2020

This file will handle the connection to the DB 

*/

require 'constants.php';

//create a connection object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if not connected
if ($conn->connect_error){
    die ('Database error:' . $conn->connect_error);
}

