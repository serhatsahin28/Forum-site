<?php
require 'db.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $user_query = "SELECT * FROM users WHERE id= $user_id";
    $user_query2 = mysqli_query($db, $user_query);
    $user_query3 = mysqli_fetch_assoc($user_query2);
} else {

    header("Location:login.php");
}
