<?php
include 'db.php';
include 'tablesDB/session_user.php';

$session_name = $_SESSION['name'];

$session_id=$session_query3['id'];

$mesajSayısı="SELECT COUNT(m.is_read) AS mesajSayısı,m.sender_id AS sender_id,m.receiver_id AS receiver_id FROM messages AS m LEFT JOIN users AS sender ON sender.id=m.sender_id LEFT JOIN users AS receiver ON receiver.id=m.receiver_id WHERE (receiver.name='$session_name' OR  sender.name='$session_name') AND is_read=0";
$sayı = mysqli_query($db, $mesajSayısı);



$arkadaslikIstekSayisi = "SELECT COUNT(*) AS arkadas FROM friendship WHERE (sender_id=$session_id OR receiver_id =$session_id) AND status=2;";
$istekSayisi = mysqli_query($db, $arkadaslikIstekSayisi);




$query = "SELECT m.is_read,m.sender_id AS sender_id,m.receiver_id,m.sender_message AS messages,sender.name AS senderName,receiver.name AS receiverName,sender.img AS senderimg,receiver.img AS receiverimg FROM messages AS m
LEFT JOIN users AS sender ON sender.id=m.sender_id 
LEFT JOIN users AS  receiver ON receiver.id=m.receiver_id  WHERE (receiver.name='$session_name' OR  sender.name='$session_name') AND is_read=0";
$query2 = mysqli_query($db, $query);




