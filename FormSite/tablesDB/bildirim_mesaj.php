<?php
require 'db.php';





$istek = "
    SELECT f.*,u1.img AS senderimg,u2.img AS receiverimg,f.receiver_id AS receiverid,f.sender_id AS senderid,u1.img,u2.img,u1.name AS sender_name, u2.name AS receiver_name
    FROM friendship f
    JOIN users u1 ON f.sender_id = u1.id
    JOIN users u2 ON f.receiver_id = u2.id
   ";
$istek2 = mysqli_query($db, $istek);
$istek3 = mysqli_fetch_assoc($istek2); //mesajların okunmasını sağlıyor


//mesajların olduğu kısım 

