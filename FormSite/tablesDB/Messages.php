<?php
include 'db.php';
include 'header.php';
$session_name = $_SESSION['name'];
$query = "SELECT m.sender_id,m.receiver_id,m.sender_message AS messages,sender.name AS senderName,receiver.name AS receiverName,sender.img AS senderimg,receiver.img AS receiverimg FROM messages AS m
LEFT JOIN users AS sender ON sender.id=m.sender_id 
LEFT JOIN users AS  receiver ON receiver.id=m.receiver_id WHERE (sender.name='" . $session_name . "' AND receiver.id='" . $_GET['user_id'] . "') OR (receiver.name='" . $session_name . "'AND sender.id='" . $_GET['user_id'] . "')";
$query2 = mysqli_query($db, $query);
$query3=mysqli_fetch_assoc($query2);
