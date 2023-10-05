<?php
include 'db.php';

if (isset($_GET['c_id'])&isset($_GET['t_id'])) {

    $c_id = $_GET['c_id'];
    $t_id = $_GET['t_id'];
    $user_id = $_GET['user_id'];

   $query = "DELETE FROM comment  WHERE id = '$c_id' AND topics_id='$t_id'";
    $query2 = mysqli_query($db, $query);

    if ($query2) {
        header("Location:topics_comments.php?id=".$user_id."&t_id=".$t_id);
    } else {
        echo 'error: ' . mysqli_error($db);
    }
} 
else {
    header("Location:index.php  ");
}
