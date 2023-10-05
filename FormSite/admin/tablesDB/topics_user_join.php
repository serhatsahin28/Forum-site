<?php
require 'db.php';

$u_id = $_GET['id'];

$t_u_j = "SELECT u.id,t.date,t.title AS title,u.name AS name,t.id AS t_id,t.subtitle AS subtitle,u.Register_date FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE u.id='$u_id'";

$t_u_j2 = $db->query($t_u_j);
$t_u_j3=mysqli_fetch_assoc($t_u_j2);


$t_count = "SELECT COUNT(u.id) AS count FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE user_id=$u_id";

$t_count2 = $db->query($t_count);

$t_count3 = mysqli_fetch_assoc($t_count2);

$topic_count=$t_count3['count']
;