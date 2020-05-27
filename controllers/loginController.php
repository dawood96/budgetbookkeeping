<?php 

/* 
@author David Shammas
@version 5/15/2020

This file will handle the Log in and it will start the session and if the user have the correct credentials, it will redirect the page to 
dashboard.php.

require db.php and start the session to save the variables in the session.
*/

session_start();
require_once 'config/db.php';


if (isset($_POST['login'])){
    if(empty($_POST['email']) || empty($_POST['password']) ){
        header("location: login.php?empty");
        exit();
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT * FROM csi3370_users WHERE email ='".$email."' ";
        $result = mysqli_query($conn, $query);

        if($row = mysqli_fetch_assoc($result)){
            $HashPass = password_verify($password, $row['password']);

            //if password does not match
            if($HashPass === false){
                header("location: login.php?P_Invalid");
                exit();
            } 
            //if password is matched
            else if ($HashPass === true) {
                //$_SESSION['Those are session variables'] = $row['column name in the DB'];
                $_SESSION['U_D'] = $row['user_id'];
                $_SESSION['FName'] = $row['first_name'];
                $_SESSION['LName'] = $row['last_name'];
                $_SESSION['Email'] = $row['email'];
                $_SESSION['Password'] = $row['password'];

                $query_info = "SELECT SUM(income), comment FROM csi3370_income_trans WHERE user_id ='".$_SESSION['U_D']."' ";
                $result_info = mysqli_query($conn, $query_info);

                if($row = mysqli_fetch_assoc($result_info)){
                    $_SESSION['income'] = $row['SUM(income)'];
                }

                header ("location: dashboard.php?Well");
                //exit();
            }

        } else {
            header("location: login.php?U_Invalid");
            exit();
        }

    }


} else {
    // header("location: login.php");
}

//create a connection object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if not connected
if ($conn->connect_error){
    die ('Database error:' . $conn->connect_error);
}



?>