<?php

/*
@author Maurice Fuentes
@author David Shammas
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
        $incomeIC1 = number_format($income, 2,'.', ',');
    }
}


$query = "SELECT SUM(expense) FROM csi3370_expenses_trans WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

if ($result->num_rows != 0) {
    while ($rows = $result->fetch_assoc()) {
        $expenses = $rows['SUM(expense)'];
        $expenseIC = number_format($expenses, 2,'.', '');
        $expenseIC1 = number_format($expenses, 2,'.', ',');
    }
}


$balance = $income - $expenses;
$balanceIC = number_format($balance, 2,'.', '');
$balanceIC1 = number_format($balance, 2,'.', ',');


    
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

    $tech_expense_percentage = ($tech)/ ($expenses > 0 ? $expenses : 1) * 100;
    $bills_expense_percentage = ($bills)/($expenses > 0 ? $expenses : 1) * 100;
    $other_expense_percentage = ($other)/($expenses > 0 ? $expenses : 1) * 100;
    $food_expense_percentage = ($food)/($expenses > 0 ? $expenses : 1) * 100;
    $shopping_expense_percentage = ($shopping)/($expenses > 0 ? $expenses : 1) * 100;
    $gifts_expense_percentage = ($gifts)/($expenses > 0 ? $expenses : 1) * 100;


    //This code for the last month of income and expense transactions
    $income_summary = "SELECT SUM(income), COUNT(income)  FROM csi3370_income_trans where user_id = $user_id AND timestamp >= (CURDATE() - INTERVAL 1 MONTH )  ORDER BY timestamp DESC LIMIT 10";
    $income_summary = mysqli_query($conn, $income_summary);
    if ($income_summary->num_rows != 0) {
        while ($rows = $income_summary->fetch_assoc()) {
            $last_month_income = number_format($rows['SUM(income)'], 2,'.', ',');
            $last_month_income_trans = $rows['COUNT(income)'];
        }
    }

    $expense_summary = "SELECT SUM(expense), COUNT(expense)  FROM csi3370_expenses_trans where user_id = $user_id AND timestamp >= (CURDATE() - INTERVAL 1 MONTH )  ORDER BY timestamp DESC LIMIT 10";
    $expense_summary = mysqli_query($conn, $expense_summary);
    if ($expense_summary->num_rows != 0) {
        while ($rows = $expense_summary->fetch_assoc()) {
            $last_month_expense = number_format($rows['SUM(expense)'], 2,'.', ',');
            $last_month_expense_trans = $rows['COUNT(expense)'];
        }
    }

    // This is for the number of accomplished and not accomplished tasks
    $unaccomplished_task = "SELECT COUNT(task)  FROM csi3370_task where user_id = $user_id AND is_done = 0";
    $unaccomplished_task = mysqli_query($conn, $unaccomplished_task);
    if ($unaccomplished_task->num_rows != 0) {
        while ($rows = $unaccomplished_task->fetch_assoc()) {
            $unaccomplished_task_total = $rows['COUNT(task)'];
        }
    }


    $accomplished_task = "SELECT COUNT(task)  FROM csi3370_task where user_id = $user_id AND is_done = 1";
    $accomplished_task = mysqli_query($conn, $accomplished_task);
    if ($accomplished_task->num_rows != 0) {
        while ($rows = $accomplished_task->fetch_assoc()) {
            $accomplished_task_total = $rows['COUNT(task)'];
        }
    }

    //Search feature in the dashboard page
    if (!isset($_POST['search'])){
        $search_result_id = "";
        $search_result_trans = "";
        $search_result_date =  "";
    } 
    else {
        $id_search = mysqli_real_escape_string($conn, $_POST['search_id']);
    
        $query_search_income = "SELECT income_trans_id, income, timestamp FROM csi3370_income_trans  where user_id = '$user_id' AND  income_trans_id = '$id_search'";
        $result_income = mysqli_query($conn, $query_search_income);

        $query_search_expense = "SELECT expense_trans_id, expense, timestamp FROM csi3370_expenses_trans  where user_id = '$user_id' AND  expense_trans_id = '$id_search'";
        $result_expense = mysqli_query($conn, $query_search_expense);

        if ($result_income->num_rows != 0) {
            while ($rows = $result_income->fetch_assoc()) {
                $search_result_id = $rows['income_trans_id'];
                $search_result_trans = $rows['income'];
                $search_result_date = $rows['timestamp'];
            }
        } elseif ($result_expense->num_rows != 0) {
            // $query_search_expense = "SELECT expense_trans_id, expense, type_of_expense FROM csi3370_expenses_trans  where user_id = '$user_id' AND  expense_trans_id = '$id_search'";
            // $result = mysqli_query($conn, $query_search_expense);
            while ($rows = $result_expense->fetch_assoc()) {
                $search_result_id = $rows['expense_trans_id'];
                $search_result_trans = $rows['expense'];
                $search_result_date = $rows['timestamp'];
            }
        } 
        else {
            header ("location: dashboard.php?InvalidID");
        }
    }

?>