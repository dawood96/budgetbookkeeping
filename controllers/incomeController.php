<?php

/*
@author Maurice Fuentes
@version 5/27/2020
*/

$user_email = $_SESSION["Email"];
$user_id = $_SESSION["U_D"];

//go to this file to connect to the database
require_once 'config/db.php';

if (isset($_POST['add_income'])) {
    $income = mysqli_real_escape_string($conn, $_POST['incomeAmount']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    //Validations for characters
    if (!is_numeric($income) ){
        header ("location: IncomeDesign.php?invalid");
        exit();
    } else {
        $query = "INSERT INTO csi3370_income_trans (user_id, income, comment, timestamp) VALUES ('$user_id','$income', '$comment', '$date')";
        mysqli_query($conn, $query);
        header('location: IncomeDesign.php?valid');
    }

}
?>