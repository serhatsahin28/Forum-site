<?php 
include 'db.php';
$sender_message=$_POST['text'];
$sender_id=$_POST['session_id'];
$receiver_id=$_POST['user_id'];



if($sender_message!=null)
{
    $query = "INSERT INTO messages (sender_id, receiver_id, sender_message) VALUES ('$sender_id', '$receiver_id', '$sender_message')";
    $query2 = mysqli_query($db, $query);

}
    


?>