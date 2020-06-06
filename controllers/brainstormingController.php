<?php 

$user_id = $_SESSION["U_D"];
$is_done = 0;
$current_date = date('Y-m-d H:i:s');

require_once 'config/db.php';

if (isset($_POST['submit_task'])) {
    $task = mysqli_real_escape_string($conn, $_POST['task']);

    $query = "INSERT INTO csi3370_task (user_id, task, is_done, timestamp) VALUES ('$user_id', '$task', '$is_done','$current_date' )";
    mysqli_query($conn, $query);    
    header('location: brainstorming.php?valid');
}


// delete task
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
    $query = "DELETE FROM csi3370_task WHERE user_id = $user_id AND task_id = $id";
	mysqli_query($conn, "$query");
	header('location: brainstorming.php?delete_task');
}

//mark as done task
if (isset($_GET['done'])) {
    $id = $_GET['done'];
    
    $query1 = "UPDATE csi3370_task SET is_done=1 WHERE user_id = '$user_id' AND task_id = $id";
    mysqli_query($conn, $query1);
	header('location: brainstorming.php?finished_task');
}




?>