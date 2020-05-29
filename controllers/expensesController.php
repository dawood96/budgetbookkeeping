<?php

/*
@author Samantha Belz
@version 5/27/2020
*/

$user_email = $_SESSION["Email"];
$user_id = $_SESSION["U_D"];

//go to this file to connect to the database
require_once 'config/db.php';

if (isset($_POST['add_expense'])) {
    $expense = mysqli_real_escape_string($conn, $_POST['expenseAmount']);
    $type = mysqli_real_escape_string($conn, $_POST['category']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);


    if (!is_numeric($expense) ){
        header ("location: ExpensesDesign.php?invalid");
        exit();
    } else {
        $query = "INSERT INTO csi3370_expenses_trans (user_id, expense, type_of_expense, comment, timestamp) VALUES ('$user_id','$expense', '$category', '$comment', '$date')";
        mysqli_query($conn, $query);
        header('location: ExpensesDesign.php?valid');
    }
}
?>