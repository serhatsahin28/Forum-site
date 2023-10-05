<?php
require 'db.php';

if(isset($_SESSION['name']))
{
$session_query="SELECT * FROM users WHERE name='".$_SESSION['name']."'";
$session_query2=mysqli_query($db,$session_query);
$session_query3=mysqli_fetch_assoc($session_query2);

}

else {

    header("Location:login.php");
}