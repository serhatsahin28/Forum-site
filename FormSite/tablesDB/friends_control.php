<?php
require 'db.php';
require 'tablesDB/session_user.php';

if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];


    //Arkadaşlık isteği gönderilen kişi, profiline bakılan kullanıcı ise

    $session_user_id = $session_query3['id']; // Bu örnekte kullanıcıların id'sini tuttuğunuz varsayılan değişkeni kullandım, değişken adınıza uygun olarak düzenleyebilirsiniz.

    $query = "
    SELECT f.*, u1.name AS sender_name, u2.name AS receiver_name
    FROM friendship f
    JOIN users u1 ON f.sender_id = u1.id
    JOIN users u2 ON f.receiver_id = u2.id
    WHERE (u1.id = $session_user_id AND f.receiver_id = $user_id) OR (u2.id = $session_user_id AND f.sender_id = $user_id)";
    $query2 = mysqli_query($db, $query);
    


    //Arkadaşlık isteğini kabul eden kişi oturumu açık kişi ise
  


    if (mysqli_num_rows($query2) > 0) {
        $query3 = mysqli_fetch_assoc($query2);

        $a = $query3['status'];
    } else {
        $a = "0";
        $query3 = mysqli_fetch_array($query2);
    }

}
