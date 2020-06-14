<?php

/*
@author Maurice Fuentes
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
$id_trans = 0;

//go to this file to connect to the database
require_once 'config/db.php';

if (isset($_POST['add_income'])) {
    $income = mysqli_real_escape_string($conn, $_POST['incomeAmount']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    //Validations for characters
    if (!is_numeric($income) || $income < 0 ){
        header ("location: IncomeDesign.php?invalid");
        exit();
    } else {
        $query = "INSERT INTO csi3370_income_trans (user_id, income, comment, timestamp) VALUES ('$user_id','$income', '$comment', '$date')";
        mysqli_query($conn, $query);    
        header('location: IncomeDesign.php?valid');
    }

}

//delete button in the income page
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM csi3370_income_trans where user_id = $user_id AND income_trans_id = $id";
    mysqli_query($conn, $query);
    header('location: IncomeDesign.php?deleted');
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = "SELECT income, timestamp, comment FROM csi3370_income_trans where user_id = $user_id AND income_trans_id = $id";
    $result = mysqli_query($conn, $result);

    //
    $row = $result->fetch_array();
    //declare variables
    $amount = $row['income'];
    $date = $row['timestamp'];
    $com = $row['comment'];
    $id_trans = $id;
}


//this is for Update button in ADD income page
if (isset($_POST['update'])){
    $id_trans = $_POST['id'];
    $id_trsn = mysqli_real_escape_string($conn, $_POST['id']);
    $income = mysqli_real_escape_string($conn, $_POST['incomeAmount']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    if (!is_numeric($income) || $income < 0 ){
        header ("location: IncomeDesign.php?invalid");
        exit();
    } else {

        $query1 = "UPDATE csi3370_income_trans SET income='$income', timestamp='$date', comment='$comment' where user_id = '$user_id' AND income_trans_id = '$id_trans'";
        mysqli_query($conn, $query1);
        header('location: IncomeDesign.php?updated');
    }
}

?>