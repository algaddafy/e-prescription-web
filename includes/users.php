<?php

if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        $sql = "SELECT * FROM users ORDER BY user_id";
        $res = mysqli_query($conn, $sql);
    } elseif ($_SESSION['role'] == 'doctor') {
        $sql = "SELECT * FROM users WHERE (role = 'doctor' OR role = 'patient') ORDER BY user_id";
        $res = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'";
        $res = mysqli_query($conn, $sql);
    }
} else {
    header("Location: login.php");
}
