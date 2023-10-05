<?php
include 'db.php';
include 'tablesDB/bildirim_mesaj.php';

$session = $_POST['session_id']; // Oturumu açık olan kullanıcının ID'si
$receiver_id = $_POST['user_id']; // Mesajı alan kullanıcının ID'si

// Eğer mesajı alan kullanıcı oturumu açık olan kullanıcıysa
    if ($sender_id != $istek3['receiverid']) {

    // UPDATE sorgusu ile is_read'i 1 yapma
    $query = "UPDATE messages SET is_read = '1' WHERE sender_id = $receiver_id AND receiver_id =$session";
    $query2 = mysqli_query($db, $query);

}


?>
