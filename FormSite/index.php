<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .title {
            font-size: 20px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 15px;

        }

        .profil {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            /* Resmi yuvarlak yapar */
        }
    </style>
</head>

<body>
    <?php



    include 'db.php';

    include 'header.php';


    if (!isset($_SESSION['name'])) {
        header("Location: login.php");
        exit;
    }


    if (!empty($_POST["submit"])) {
        header("Location: logout.php");
    }



    ?>
    <div class="row text-start">
        <h1 class="col-8 ">HOŞGELDİNİZ <?php echo $_SESSION['name']; ?> </h1>

        <div class="col  text-end">
            <form action="logout.php" method="post">
                <input type="submit" name="submit" id="submit" placeholder="Çıkış yap" value="Çıkış yap">

            </form>
        </div>

        <br><br>
        <div class="col-12 text-center">
            <h4>Konu başlıkları</h4>
            <form action="topic_add.php" method="post">
                <input type="submit" name="submit" id="submit" placeholder="Konu oluştur" value="Konu oluştur">

            </form>
        </div>

    </div>
    <br>
    <?php



    $topics = "SELECT  t.user_id,u.img,t.date, t.title,t.subtitle,u.name,t.id from topics as t LEFT JOIN users as u on t.user_id=u.id ORDER BY t.date DESC 
    ";
    $topics2 = mysqli_query($db, $topics);
    $topics_fetch = mysqli_fetch_array($topics2);


    //SAYFALAMA İÇİN KULLANILAN VERİTABANI SORGUSU



    foreach ($topics2 as $t) {

        $text = $t["subtitle"];
        $title = $t["title"];

        $text = substr($text, 0, 18);
        $title = substr($title, 0, 40);

        if ($t['img'] == null) {
            $t['img'] = "images.png";
        }

        echo '
        <div class="col-12 d-flex justify-content-center">
        <hr class="my-3 w-50">
    </div>
    
        <div class="row">
    
    <div class="col  d-flex justify-content-center">
    <img class="profil" src="img/' . $t['img'] . '">
    </div>
        <div class="col-12 title d-flex justify-content-center">
      
            <a href="topics.php?baslik_sahip_id=' . $t['user_id'] . '&t_id=' . $t['id'] . '">' . $title . '...</a>

        </div>
        <div class="col-12  subtitle d-flex justify-content-center">
            <p1>' . $text . '...</a>

        </div>
        <div class="col-12  user d-flex justify-content-center">
        <a href="user.php?user_id=' . $t['user_id'] . '&t_id=' . $t['id'] . '">' . $t["name"] . '</a>--tarafından' . $t["date"] . '--tarihinde oluşturuldu

    </div>
    </div>
    



';
    }
    ?>
    <div class="col-12 d-flex justify-content-center">
        <hr class="my-3 w-50">
    </div>

    <br>
    </div>



</body>

</html>