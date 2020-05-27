<?php

/*
@author Maurice Fuentes
@version 5/27/2020
*/

$user_email = $_SESSION["Email"];
$user_id = $_SESSION["U_D"];

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'budget');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST['add_income'])) {
    $income = mysqli_real_escape_string($conn, $_POST['incomeAmount']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    $query = "INSERT INTO csi3370_income_trans (user_id, income, comment, timestamp) VALUES ('$user_id','$income', '$comment', '$date')";
    mysqli_query($conn, $query);
    header('location: dashboard.php');
}
?>