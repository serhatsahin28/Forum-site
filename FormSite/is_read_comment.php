<?php
include 'db.php';
include 'tablesDB/bildirim_mesaj.php';

$session = $_POST['session_id']; // Oturumu açık olan kullanıcının ID'si
$receiver_id = $_POST['user_id']; // Mesajı alan kullanıcının ID'si
$t_id=$_POST['t_id'];
//receiver=kabul
//session_nam=gönderen
// Eğer mesajı alan kullanıcı oturumu açık olan kullanıcıysa
    if ($sender_id != $istek3['receiverid']) {

    // UPDATE sorgusu ile is_read'i 1 yapma
    $query = "UPDATE comment SET is_read = '1' WHERE  receiver_id =$receiver_id AND topics_id=$t_id";
    $query2 = mysqli_query($db, $query);

}


?>
