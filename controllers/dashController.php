<?php

/*
@author Maurice Fuentes
@version 5/22/2020

This file will take care of pulling the information from
the database and displaying it into the dashboard
*/

//session_start();

$user_email = $_SESSION["Email"];
$user_id = $_SESSION["U_D"];


//create a connection To the DB
require_once 'config/db.php';

$query = "SELECT SUM(income) FROM csi3370_income_trans WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

if ($result->num_rows != 0) {
    while ($rows = $result->fetch_assoc()) {
        $income = $rows['SUM(income)'];
        $incomeIC = number_format($income, 2,'.', ',');
    }
}

$query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

if ($result->num_rows != 0) {
    while ($rows = $result->fetch_assoc()) {
        $expenses = $rows['SUM(expense)'];
        $expenseIC = number_format($expenses, 2,'.', ',');
    }
}

$balance = $income - $expenses;
$balanceIC = number_format($balance, 2,'.', ',');

//$query = "SELECT * FROM csi3370_expenses_trans WHERE user_id = $user_id";
//$result = mysqli_query($conn, $query);

//if ($result->num_rows != 0) {
//    while ($rows = $result->fetch_assoc()) {
//        $expenses = $rows['SUM(expense)'];
//        $expenseIC = number_format($expenses, 2,'.', ',');
//    }
//}

?>