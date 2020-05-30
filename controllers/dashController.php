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
        $incomeIC = number_format($income, 2,'.', '');
    }
}


$query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

if ($result->num_rows != 0) {
    while ($rows = $result->fetch_assoc()) {
        $expenses = $rows['SUM(expense)'];
        $expenseIC = number_format($expenses, 2,'.', '');
    }
}


$balance = $income - $expenses;
$balanceIC = number_format($balance, 2,'.', '');



    
    // this block of code is for pulling the total number of transactions in the dashboard page
    $query_expense = "SELECT COUNT(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query_expense);
    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $expense_transaction = $rows['COUNT(expense)'];
        }
    }
    $query_income = "SELECT COUNT(income) FROM csi3370_income_trans WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query_income);
    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $income_transaction = $rows['COUNT(income)'];
        }
    }
    $total_number_of_transaction = $expense_transaction + $income_transaction;



    // this for the expense DATA that is presented in the chart
    $query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id and type_of_expense = 'OTHER'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $other = $rows['SUM(expense)'];
            $other_expense = number_format($other, 2,'.', ',');
        }
    }

    $query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id and type_of_expense= 'BILLS'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $bills = $rows['SUM(expense)'];
            $bills_expense = number_format($bills, 2,'.', ',');
        }
    }
    
    $query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id and type_of_expense= 'FOOD'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $food = $rows['SUM(expense)'];
            $food_expense = number_format($food, 2,'.', ',');
        }
    }

    $query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id and type_of_expense= 'SHOPPING'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $shopping = $rows['SUM(expense)'];
            $shopping_expense = number_format($shopping, 2,'.', ',');
        }
    }

    $query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id and type_of_expense= 'GIFTS'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $gifts = $rows['SUM(expense)'];
            $gifts_expense = number_format($gifts, 2,'.', ',');
        }
    }

    $query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id and type_of_expense= 'TECHNOLOGY'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows != 0) {
        while ($rows = $result->fetch_assoc()) {
            $tech = $rows['SUM(expense)'];
            $tech_expense = number_format($tech, 2,'.', ',');
        }
    }

    $tech_expense = ($tech_expense)/$expenses * 100;
    $bills_expense = ($bills_expense)/$expenses * 100;
    $other_expense = ($other_expense)/$expenses * 100;
    $tech_expense = ($tech_expense)/$expenses * 100;
    $food_expense = ($food_expense)/$expenses * 100;
    $shopping_expense = ($shopping_expense)/$expenses * 100;
    $gifts_expense = ($gifts_expense)/$expenses * 100;



?>