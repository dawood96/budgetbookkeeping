<?php

/*
@author Samantha Belz
@version 5/27/2020
*/

$user_email = $_SESSION["Email"];
$user_id = $_SESSION["U_D"];

$update = false;
$trans_id = '';
$amount = '';
$date = '';
$comment = '';
$com = '';
$type = '';
$id_trans = 0;

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
        $query = "INSERT INTO csi3370_expenses_trans (user_id, expense, type_of_expense, comment, timestamp) VALUES ('$user_id','$expense', '$type', '$comment', '$date')";
        mysqli_query($conn, $query);
        header('location: ExpensesDesign.php?valid');
    }
}

//delete button in the income page
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM csi3370_expenses_trans where user_id = $user_id AND expense_trans_id = $id";
    mysqli_query($conn, $query);
    header('location: ExpensesDesign.php?deleted');
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = "SELECT expense, type_of_expense, timestamp, comment FROM csi3370_expenses_trans where user_id = $user_id AND expense_trans_id = $id";
    $result = mysqli_query($conn, $result);

    //
    $row = $result->fetch_array();
    //declare variables
    $amount = $row['expense'];
    $type = $row['type_of_expense'];
    $date = $row['timestamp'];
    $com = $row['comment'];
    $id_trans = $id;
}

if (isset($_POST['update'])){
    $id_trans = $_POST['id'];

    $id_trsn = mysqli_real_escape_string($conn, $_POST['id']);
    $expense = mysqli_real_escape_string($conn, $_POST['expenseAmount']);
    $type = mysqli_real_escape_string($conn, $_POST['category']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    $query1 = "UPDATE csi3370_expenses_trans SET expense='$expense', type_of_expense='$type', timestamp='$date', comment='$comment' where user_id = '$user_id' AND expense_trans_id = '$id_trans'";
    mysqli_query($conn, $query1);
    header('location: expensesDesign.php?updated');
}
?>