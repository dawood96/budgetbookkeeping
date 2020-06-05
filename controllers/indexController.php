

<?php 

//go to this file to connect to the database
require_once 'config/db.php';

$query = "SELECT COUNT(user_id) FROM csi3370_users";
$num_of_users = mysqli_query($conn, $query);

if ($num_of_users->num_rows != 0) {
    while ($rows = $num_of_users->fetch_assoc()) {
        $total_number_of_users = $rows['COUNT(user_id)'];
    }
}



?>