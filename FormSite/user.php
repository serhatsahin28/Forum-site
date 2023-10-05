<?php

include 'db.php';
include 'header.php';
include 'tablesDB/topics_user_comments.php';
include 'tablesDB/friends_control.php';
include 'tablesDB/session_user.php';
include 'tablesDB/user_info.php';



ob_start();
//var_dump($user_query3);
if (isset($_GET['t_id']) && $_GET['t_id'] !== "") {
    if ($_GET['t_id'] != "" && $_GET['t_id'] != null) {

        echo '
        <div class="col">
        
<form class="sticky-top bg-danger d-flex justify-content-center" method="post" action="index.php">


    <input type="submit" value="Geri dön">
</form>
</div>
';
    }
} else {

    echo '
    <div class="col" style="margin-top:-40px;">

    <form class="sticky-top bg-danger d-flex justify-content-center" method="post" action="index.php">
    
    
        <input type="submit" value="Geri dön">
    
    
    
    </form>
</div>

    ';
}


?>



<div class="row">
    <div class="col-4">
        <img src="img/<?php user_img_control();    ?>" width="125">
        <?php


        if (isset($query3) && $_SESSION['name'] != $user_query3['name']) {
            echo '
    
    
        
    <a class="nav-link active d-flex justify-content-center px-5 "  aria-current="page"  href="chat.php?session_id=' . $session_query3['id'] . '&user_id=' . ($_SESSION['name'] != $query3['receiver_name'] ? $query3['receiver_id'] : $query3['sender_id']) . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
    </svg></a>
    
    
    </li>
    
    
    ';
        }
        ?>
    </div>
    <div class="col-4 ">

        <?php



        echo "<br>";


        //arkadas kontrol
        //Oturumu açık olan kullanıcı ile profili görüntülenen kullanıcı aynı değilse 
        //Oturumu açık olan kullanıcı ile arkadaşlık isteği gönderen kullanıcı aynı değilse
        if ($query3 !== null) {
            if ($_SESSION['name'] != $user_query3['name'] && $query3['sender_id'] == $user_query3['id']) {


                if ($a == 0) {
                    echo '
    <form method="post">
    <input type="submit" id="confirmButton" name="request" value="Arkadaş ekle">
</form>';
                }
                if ($a == 1) {
                    echo '
    <form method="post">
    <input type="submit" id="confirmButton" name="request" value="Arkadaşsınız">
</form>';
                }
                if ($a == 2) {
                    echo '
    <form method="post">
    <input type="submit" id="confirmButton" name="request" value="İsteği kabul et">
<input type="submit" id="confirmButton2" name="request2" value="İsteği reddet">

</form>';
                }
            }



            //arkadas kontrol
            //Oturumu açık olan kullanıcı ile profili görüntülenen kullanıcı aynı değilse 
            //Oturumu açık olan kullanıcı ile arkadaşlık isteği gönderen kullanıcı aynıysa
            elseif ($_SESSION['name'] != $user_query3['name'] && $query3['sender_id'] != $user_query3['id']) {

                if ($a == 0) {
                    echo '
<form method="post">
<input type="submit" id="confirmButton" name="request" value="Arkadaş ekle">
</form>';
                }
                if ($a == 1) {

                    echo '
<form method="post">
<input type="submit" id="confirmButton" name="request" value="Arkadaşsınız">
</form>';
                }
                if ($a == 2) {
                    echo '
<form method="post">
<input type="submit" id="confirmButton" name="request" value="İstek gönderildi">

</form>';
                }
            }
        } else if ($_SESSION['name'] != $user_query3['name']) {

            echo '
        <form method="post">
        <input type="submit" id="confirmButton" name="request" value="Arkadaş Ekle">
        </form>';
        }
        if (isset($_POST['request'])) {
            if (isset($query3['sender_id']) && $query3['sender_id'] != "" && $session_query3['id'] != "") {

                // Arkadaşlık isteğini gönderen kullanıcı ile oturumu açık kullanıcı eşit mi?
                if ($query3['sender_id'] == $session_query3['id']) {
                    if ($a == 0) {

                        istekGonder();
                        exit;
                    } elseif ($a == 1) {
                        arkadasSil();
                        exit;
                    } elseif ($a == 2) {
                        arkadasSil();
                        exit;
                    }
                }


                //DEĞİLSE
                else if (isset($query3['receiver_id']) && $query3['receiver_id'] == $session_query3['id']) {



                    if ($a == 0) {
                        istekGonder();
                        exit;
                    } else if ($a == 1) {
                        arkadasSil();
                        exit;
                    } elseif ($a == 2) {

                        arkadasKabul();
                        exit;
                    }
                }
            } else {

                arkadasEkle();
                exit;
            }
            //Eger iki kullanıcı hiç arkadaş olmadıysa veritabanında arkadaşlıkları kayıtlı değilse

        }
        if (isset($_POST['request2'])) {

            arkadasSil();
            exit;
        }

        ?>

    </div>


    <?php
    if ($_SESSION['name'] == $user_query3['name']) {
        echo '
    <div class="col-4">
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="resim" id="resim"> <br>
            <input type="submit" name="img" value="Button">
        </form>
    </div>
    
    
    ';
    }




    if (isset($_POST['img'])) {
        $hedef_klasor = "img/"; // Resimlerin yükleneceği kalıcı klasör
        $gecici_dosya = $_FILES['resim']['tmp_name'];
        $hedef_dosya = $hedef_klasor . basename($_FILES['resim']['name']);

        // Resmi geçici klasörden kalıcı klasöre taşıma
        if (move_uploaded_file($gecici_dosya, $hedef_dosya)) {
            echo "Resim başarıyla yüklendi. Dosya adı: " . basename($_FILES['resim']['name']);
            user_img_add(basename($_FILES['resim']['name']));
            header('Refresh:0.3');
        } else {
            echo "Resim yüklenirken bir hata oluştu.";
        }
    }

    ?>
    <div class="col-12 d-flex justify-content-center">
        <p1>Kullanıcı adı:<?php echo $user_query3['name'] ?></p1>

    </div>
    <div class="col-12 d-flex justify-content-center ">
        <p1>Katılım tarihi:<?php echo $user_query3['Register_date'] ?></p1>

    </div>
    <div class="col-12 d-flex justify-content-center ">
        <p1>Açtığı başlık sayısı:<?php konuSayısı() ?></p1>

    </div>
    <div class="col-12 d-flex justify-content-center ">
        <p1>Yaptığı yorum sayısı:<?php YorumSayısı()  ?></p1>

    </div>

</div>


<?php



?>

<script>
    document.getElementById("confirmButton").onclick = function() {
        var result = confirm("Emin misiniz?");
        if (result) {
            // Kullanıcı "Tamam" düğmesine bastığında yapılacak işlemleri buraya yazabilirsiniz
            // Örneğin, PHP kodlarınıza bir istek göndererek sunucu tarafında işlem yapabilirsiniz.
            alert("İşlem onaylandı!");
        } else {
            alert("İşlem iptal edildi!");
            event.preventDefault(); // Form gönderimini iptal eder
        }
    };
</script>