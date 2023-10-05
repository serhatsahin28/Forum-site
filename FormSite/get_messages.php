<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
$session_name = $_POST['session_name'];
$user_id = $_POST['user_id'];
}


include "db.php";


$query = "SELECT m.sender_message AS messages, sender.name AS senderName, receiver.name AS receiverName, sender.img AS senderimg, receiver.img AS receiverimg 
FROM messages AS m
LEFT JOIN users AS sender ON sender.id = m.sender_id 
LEFT JOIN users AS receiver ON receiver.id = m.receiver_id 
WHERE (sender.name = '" . $session_name . "' AND receiver.id = '" . $user_id . "') OR (receiver.name = '" . $session_name . "' AND sender.id = '" . $user_id . "')";

$result = mysqli_query($db, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {


        $metin = $row["messages"];
        $sinir = 700; // Her satırın karakter sınırı
        $kisalmis_metin = wordwrap($metin, $sinir, "<br>");
        




        $alignment = ($row['senderName'] === $session_name) ? 'right' : 'left';
        echo '
        <div class="message ' . $alignment . '">
            <img class="logo" src="img/' . $row['senderimg'] . '" alt="">
            <p class="messages bg-danger">' . $kisalmis_metin . '</p>
        </div>';
    }
} else {
    echo '<p>Gösterilecek mesaj yok</p>';
}



?>
