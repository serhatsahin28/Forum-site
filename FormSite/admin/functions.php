<?php



//Oturumu açık olan kullanıcı

function user_id()
{
    include 'db.php';

    $user = $_SESSION['name'];
    $user_query = "SELECT * FROM users WHERE name='$user'";
    $user_query2 = mysqli_query($db, $user_query);
    $user_query3 = mysqli_fetch_assoc($user_query2);
    $user_id = $user_query3['id'];
    echo $user_id;
}
//var_dump alternatifi
function ss(string $a)
{

    var_dump($a);
    exit;
}
//kullanıcı proifili
function user_name()
{
    require 'db.php';
    $user_id = $_GET['user_id'];
    $topics = "SELECT t.user_id,t.title,t.subtitle,u.name,t.id from topics as t LEFT JOIN users as u on t.user_id=u.id WHERE user_id='$user_id'";
    $topics2 = mysqli_query($db, $topics);
    $topics_fetch = mysqli_fetch_array($topics2);
    $username = $topics_fetch["name"];
    echo $username;
}



function topics_title()
{
    require 'db.php';
    $topics_id = $_GET["t_id"];

    $sorgu = "SELECT u.id,t.title,t.subtitle,u.Register_date FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE t.id=$topics_id";

    $sorgu2 = $db->query($sorgu);

    $sorgu3 = mysqli_fetch_array($sorgu2);
    echo $sorgu3['title'];
}

function topics_subtitle()
{
    require 'db.php';
    $topics_id = $_GET["t_id"];

    $sorgu = "SELECT u.id,t.title,u.name,t.subtitle,u.Register_date FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE t.id=$topics_id";

    $sorgu2 = $db->query($sorgu);

    $sorgu3 = mysqli_fetch_array($sorgu2);
    echo $sorgu3['subtitle'];
}
function topics_id()
{
    require 'db.php';
    $topics_id = $_GET["t_id"];

    $sorgu = "SELECT u.id,t.title,u.name,t.subtitle,u.Register_date FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE t.id=$topics_id";

    $sorgu2 = $db->query($sorgu);

    $sorgu3 = mysqli_fetch_array($sorgu2);
    echo $sorgu3['id'];
}
function topics_username()
{
    require 'db.php';
    $topics_id = $_GET["t_id"];

    $sorgu = "SELECT u.id,t.title,u.name,t.subtitle,u.Register_date FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE t.id=$topics_id";

    $sorgu2 = $db->query($sorgu);

    $sorgu3 = mysqli_fetch_array($sorgu2);
    echo $sorgu3['name'];
}

function konuSayısı()
{
    require 'db.php';
    $user_id = $_GET['user_id'];

    $t_u_j = "SELECT COUNT(u.id) AS count FROM topics AS t LEFT JOIN users AS u ON u.id=t.user_id WHERE user_id=$user_id";

    $t_u_j2 = $db->query($t_u_j);

    $t_u_j3 = mysqli_fetch_array($t_u_j2);

    echo $t_u_j3['count'];
}


function YorumSayısı()

{
    require 'db.php';


    $user_id = $_GET["user_id"];

    $sorgu = "SELECT COUNT(u.id) as count FROM comment AS c LEFT JOIN topics AS t ON c.topics_id=t.id 
    LEFT JOIN users AS u ON u.id=c.user_id WHERE u.id='$user_id'";

    $sorgu2 = $db->query($sorgu);

    $sorgu3 = mysqli_fetch_array($sorgu2);
    echo $sorgu3['count'];
}

function user_img_add($img)
{
    require 'db.php';
    $user_password = $_SESSION['password'];
    $user_name = $_SESSION['name'];


    $query = "UPDATE users SET img='$img' WHERE password='$user_password' AND name='$user_name'";
    $query2 = mysqli_query($db, $query);
}

function user_img_control()
{
    require 'db.php';
    include 'tablesDB/user_info.php';

    if ($user_query3['img'] != null) {
        echo $user_query3['img'];
    } else {
        echo 'images.png';
    }
}


function istekGonder()
{
    require 'db.php';
    if ($_SESSION["name"] != "") {

        include 'tablesDB/topics_user_comments.php';
        include 'tablesDB/friends_control.php';
        require 'tablesDB/session_user.php';

        $query = "UPDATE friendship SET status='2' WHERE sender_id=" . $session_query3['id'] . " AND receiver_id=" . $_GET['user_id'];
        $query2 = mysqli_query($db, $query);
        header("Refresh: 0.5");
    }
}

function arkadasSil()
{
    require 'db.php';
    require 'tablesDB/session_user.php';

    if ($_SESSION["name"] != "") {

        include 'tablesDB/topics_user_comments.php';
        include 'tablesDB/friends_control.php';
        $query = "DELETE FROM friendship WHERE 
        (sender_id = " . $session_query3['id'] . " AND receiver_id = " . $_GET['user_id'] . ") OR
        (sender_id = " . $_GET['user_id'] . " AND receiver_id = " . $session_query3['id'] . ")";





        $query2 = mysqli_query($db, $query);
        header("Refresh: 0.5");
    }
}

function arkadasKabul()
{
    require 'db.php';
    require 'tablesDB/session_user.php';


    if ($_SESSION["name"] != "") {
        include 'tablesDB/topics_user_comments.php';
        include 'tablesDB/friends_control.php';

        $query = "UPDATE friendship SET status='1' WHERE 
        (sender_id=" . $session_query3['id'] . " AND receiver_id=" . $_GET['user_id'] . ") OR 
        (sender_id=" . $_GET['user_id'] . " AND receiver_id=" . $session_query3['id'] . ")";

        $query2 = mysqli_query($db, $query);
        header("Refresh: 0.5");
    }
}


function request_Answer()
{

    require 'db.php';
    if ($_SESSION["name"] != "") {

        include 'tablesDB/topics_user_comments.php';
        include 'tablesDB/friends_control.php';

        echo $query3['receiver_name'] . " Arkadaşlık isteğinizi kabul etti.";
    }
}

function arkadasEkle()
{
    require 'db.php';
    require 'tablesDB/session_user.php';
    if ($_SESSION["name"] != "") {

        include 'tablesDB/topics_user_comments.php';
        include 'tablesDB/friends_control.php';


        $receiver_id = $_GET['user_id'];
        $session_id = $session_query3['id'];
        $query = "INSERT INTO friendship (sender_id,receiver_id,status) VALUES ('$session_id','$receiver_id','2')";
        $query2 = mysqli_query($db, $query);
        header("Refresh: 0.5");
    }
}

/*
function mesaj($sender_id,$receiver_id,$sender_message)
{
include 'db.php';
$query="INSERT INTO messages (sender_id,receiver_id,sender_message) VALUES ('$sender_id','$receiver_id','$sender_message')";
$query2=mysqli_query($db,$query);
if($query2)
{
    return array ($sender_id,$receiver_id,$sender_message);

}
else {
    return false;
}

}*/


function mesaj($sender_id, $receiver_id, $sender_message)
{
    include 'db.php';


    if ($sender_message != null) {
        $query = "INSERT INTO messages (sender_id, receiver_id, sender_message) VALUES ('$sender_id', '$receiver_id', '$sender_message')";
        $query2 = mysqli_query($db, $query);
    }
}
