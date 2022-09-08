<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {

    $Recieve_id = $_REQUEST['user_id'];
    $query = "DELETE FROM users WHERE user_id = $Recieve_id";

    $run_delete_query = mysqli_query($conn, $query);

    if ($run_delete_query) {
        header('location: ../dashboard.php?deleted');
    }
}
