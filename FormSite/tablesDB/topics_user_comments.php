<?php  

if(isset($_GET['user_id']))
{

$user_id = $_GET["user_id"];
   

$sorgu = "SELECT u.id,c.date,u.name,c.comment,t.title,t.subtitle,u.img FROM comment AS c LEFT JOIN topics AS t ON c.topics_id=t.id 
LEFT JOIN users AS u ON u.id=c.user_id WHERE u.id='$user_id'";
    
$sorgu2 = $db->query($sorgu);

$sorgu3 = mysqli_fetch_assoc($sorgu2);

}
else{

$user_id ="topics_user_comments.php sayfasında hata var";
    
}


?>


