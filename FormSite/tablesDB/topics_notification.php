<?php  

//****Bu sayfada açılan konu başlıklara yapılan yorumları bildirim olarak kullanmak için yapıldı.****

$sorgu = "SELECT u.id,c.receiver_id AS receiver_id,c.date,u.name,c.comment,t.title,t.id AS topic_id,c.is_read AS is_read,t.subtitle,u.img FROM comment AS c LEFT JOIN topics AS t ON c.topics_id=t.id 
LEFT JOIN users AS u ON u.id=c.user_id WHERE c.is_read='0'";
    
$sorgu2 = $db->query($sorgu);

//While döngüsünde kullanıldığı için $sorgu3 işlevi while'ın çalışmasına engel oluyor. 
//$sorgu3 = mysqli_fetch_assoc($sorgu2);




?>
