<?php
include 'db.php';

if (isset($_POST['deleteBtn'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM topics  WHERE id = '$id'";
    $query2 = mysqli_query($db, $query);

    if ($query2) {
        header("Location:index.php");
    } else {
        echo 'error: ' . mysqli_error($db);
    }
} else {
    header("Location:index.php");
}
