<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
include 'db.php';
include 'header.php';
include 'tablesDB/topics_user_join.php';

ob_start(); //hataları gizleyen kod
$user = $_SESSION['name'];
$user_query = "SELECT * FROM users WHERE name='$user'";
$user_query2 = mysqli_query($db, $user_query);
$user_query3 = mysqli_fetch_assoc($user_query2);
$user_id = $user_query3['id'];






$topics_id = $_GET["t_id"];

$sorgu = "SELECT u.id,t.id AS topics_id,t.user_id AS user_id,c.date,u.name,c.comment,t.title,t.subtitle FROM comment AS c LEFT JOIN topics AS t ON c.topics_id=t.id 
LEFT JOIN users AS u ON u.id=c.user_id WHERE topics_id=" . $topics_id;

$sorgu2 = $db->query($sorgu);

$sorgu3 = mysqli_fetch_assoc($sorgu2);


//$baslik_sahibinin_id = $sorgu3['user_id'];
$baslik_sahibinin_id = $_GET['baslik_sahip_id'];


//saat ayarları
date_default_timezone_set("Europe/Istanbul");
$tarihsaat = date("Y-m-d h:i:s");

//konu başlıkları ve konuyu açan kullanıcı



if (!empty($sorgu3['comment'])) {



    echo '

<h1>Hoşgeldiniz ' . $user . '</h1>




<div class="row">
    <div class="col-12 title  d-flex justify-content-center">
        <a href="topics.php?baslik_sahip_id=' . $sorgu3['id'] . '&t_id=' . $sorgu3['topics_id'] . '">' . $sorgu3["title"] . '</a>

    </div>
    <div class="col-12  subtitle d-flex justify-content-center">
        <p1>' . $sorgu3["subtitle"] . '</a>

    </div>
    <div class="col-12  user d-flex justify-content-center ms-4">
    <a href="user.php?user_id=' . $t_u_j3['id'] . '&t_id=' . $sorgu3['topics_id'] . '"">' . $t_u_j3['name'] . '</a> <p1>----tarafından ' . $t_u_j3['date'] . ' tarihinde oluşturuldu</p1>

</div>
</div>

<hr>
';


    //Yorum yapan kullanıcılar ve yorumlar
    foreach ($sorgu2 as $t) {



        echo '
<div class="row">
    <div class="col-12 title  d-flex justify-content-center">
        <a href="topics.php?id=' . $t['id'] . '"></a>

    </div>
    <div class="col-12  subtitle d-flex justify-content-center">
        <p1>' . $t["comment"] . '</a>

    </div>
    <div class="col-12  user d-flex justify-content-end">
    <a href="user.php?user_id=' . $t['id'] . '&t_id=' . $t['topics_id'] . '">' . $t['name'] . '</a>
    <p1>----tarafından ' . $t['date'] . ' tarihinde oluşturuldu</p1>
 

</div>

</div>

<hr>

';
    }
} else {

    echo ' 
<h1>Hoşgeldiniz ' . $user . '</h1>




<div class="row">
    <div class="col-12 title  d-flex justify-content-center">
    <a href="topics.php?baslik_sahip_id=' . $t_u_j3['id'] . '&t_id=' . $topics_id . '">' . $t_u_j3["title"] . '</a>


    </div>
    <div class="col-12  subtitle d-flex justify-content-center">
        <p1>' . $t_u_j3["subtitle"] . '</a>

    </div>
    <div class="col-12 user d-flex justify-content-center ms-5">
    <a href="user.php?user_id=' . $t_u_j3['id'] . '&t_id=' . $topics_id . '">' . $t_u_j3['name'] . '</a> 
<p1>-----tarafından ' . $t_u_j3['date'] . ' tarihinde oluşturuldu</p1>

</div>
</div>

<hr>
<br> <p1 class="col d-flex justify-content-center">Henüz yorum yapılmamış...</p1> <br>';
}

//Formdan veri gönderme (yorumları veritabanına kaydetme işlemleri)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["text"])) {
        $text = $_POST["text"];

        if ($text != "" && $text != null) {
            $baslik_sahip_id = $_GET["baslik_sahip_id"];
            $topics_id = $_GET["t_id"];

            $kaydet_sorgu = "INSERT INTO comment (user_id,comment,topics_id,receiver_id,date) VALUES ('$user_id','$text','$topics_id','$baslik_sahibinin_id','$tarihsaat')";
            $notification = "INSERT INTO notification (user_id,new_comment,type,date) VALUES ('$user_id','$text','$topics_id','$tarihsaat')";


            //Tüm tabloları birleştiren sorgu
            /*$notification = "SELECT n.id,n.new_message,n.new_comment,n.link,n.created_at,n.user_id,c.comment,t.title,t.subtitle,u.name FROM notification as n LEFT JOIN comment AS c ON n.comment_id=c.id LEFT JOIN topics AS t ON n.topic_id=t.id LEFT JOIN users as u ON n.user_id=u.id;";
           */


            $sorgu_calistir = mysqli_query($db, $kaydet_sorgu);
            header("Refresh:0.3");
        }
    } else {
        $text = "";
    }
}

?>



<form class="sticky-top bg-danger d-flex justify-content-center" method="post">

    <input type="text" name="text" placeholder="Yorum yap">

    <input type="submit" placeholder="Gönder">

</form>


<form class="sticky-top bg-danger d-flex justify-content-center" method="post" action="index.php">


    <input type="submit" value="Geri dön">



</form>


<?php
if ($t_u_j3['name'] == $_SESSION['name']) {


?>
    <script>
        $(document).ready(function() {






            var session_name = <?php echo json_encode($_SESSION['name']); ?>;
            var user_id = <?php echo json_encode($_GET['baslik_sahip_id']); ?>;
            var t_id = <?php echo json_encode($_GET['t_id']); ?>;





            function checkReadStatus() {
                $.ajax({
                    type: 'POST',
                    url: 'is_read_comment.php',
                    data: {
                        user_id: user_id,
                        session_name: session_name,
                        t_id: t_id,
                    },

                });
            }

            // İlk çalıştırma
            checkReadStatus();

            // Belirli aralıklarla tekrar kontrol etmek için setInterval kullanabilirsiniz
            setInterval(checkReadStatus, 1500);



        });
    </script>

<?php } ?>