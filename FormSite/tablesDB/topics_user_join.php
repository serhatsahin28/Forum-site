<?php
 require 'db.php';
 
$session_name=$_SESSION['name'];
$t_id=$_GET['t_id'];


 $t_u_j = "SELECT u.id,t.date,t.title,u.name,t.subtitle,u.Register_date FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE t.id='$t_id'";
     
 $t_u_j2 = $db->query($t_u_j);
 
 $t_u_j3 = mysqli_fetch_array($t_u_j2);


 

?>

