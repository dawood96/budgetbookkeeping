<?php 

/* 
@author David Shammas
@version 5/15/2020

This file will handle the sign up form logic 
you need to require db.php file to connect to the DB
*/


//go to this file to connect to the database
require_once 'config/db.php';


// if the user clicks on the sign up button
if (isset($_POST['signup'])){
    //if one of them empty
    if (empty($_POST['FName']) || empty($_POST['LName']) || empty($_POST['email']) || empty($_POST['password']) ){
        //go to this page
        header("location: signup.php?empty");

    } else {
        //get the data from the fields. using mysqli_real_escape_string for more security
        $FName = mysqli_real_escape_string($conn, $_POST['FName']);
        $LName = mysqli_real_escape_string($conn, $_POST['LName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        //Validations for characters
        if (!preg_match("/^[a-zA-Z]*$/", $FName) || !preg_match("/^[a-zA-Z]*$/", $LName) ){
            header ("location: signup.php?Invalid");
            exit();
        } else{
            //check if the email is valid
            //if NOT Valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header ("location: signup.php?Email");
                exit();

            } else {
                //check if the user available in the DB
                $query = "SELECT * FROM csi3370_users WHERE email='".$email."'";
                $result = mysqli_query($conn, $query);

                //if the user available in the DB
                if(mysqli_fetch_assoc($result)){
                    header ("location: signup.php?UserEmail");
                    exit();
                } else {
                    $Hash = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO csi3370_users (first_name, last_name, email, password) VALUES ('$FName', '$LName', '$email', '$Hash')";
                    $result = mysqli_query($conn, $query);
                    header ("location: signup.php?success");
                    exit();

                }
            }
        }
    }
} else {
    // header("location: signup.php");
    // exit();
}

?>