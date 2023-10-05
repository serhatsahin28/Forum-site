<?php
include 'head.php';
session_start();
ob_start();
require 'functions.php';


require 'tablesDB/friends_control.php';
require 'tablesDB/notification.php';

require 'tablesDB/session_user.php';

require 'tablesDB/mesaj_bildirim.php';
require 'tablesDB/topics_notification.php';





?>
<link rel="stylesheet" href="css/header.css">
<br><br><br><br>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
    <div class="container-fluid  ">
        <a class="navbar-brand" href="index.php">Anasayfa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-end " id="navbarSupportedContent">
            <ul class="navbar-nav " style="margin-right:50px;">
                <li class="nav-item ">
                    <!--Arkadaş listesi--><?php echo '
                    <a class="nav-link active" aria-current="page" href="friends.php?session_id=' . $session_query3['id'] . '">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
</svg></a>
                </li>'; ?>
                <li class="nav-item ">
                    <a class="nav-link" href="user.php?user_id=<?php echo $session_query3['id']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                </li>

                <?php
                //Bildirim sayısı
                while ($sayı2 = mysqli_fetch_assoc($sayı)) {
                    while ($istekSayısı2 = mysqli_fetch_assoc($istekSayisi)) {
                        $toplam = $sayı2['mesajSayısı'] + $istekSayısı2['arkadas'];
                        if ($sayı2['sender_id'] != $session_user_id) {
                            $notification = "(+)"; //$toplam yazdır tüm bildirimler için;
                        } else {
                            $notification = "";
                        }
                    }
                }

                $bildirim_var = 0; // Bildirim yok varsayalım

                ?>

                <li class="nav-item dropdown ">
                    <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                        </svg>
                        <?php

                        ?>



                    </a>

                    <ul class="dropdown-menu dropdown-menu-end  custom-dropdown" aria-labelledby="navbarDropdown">
                        <?php



                        while ($row = mysqli_fetch_assoc($istek2)) {


                            if ($session_user_id != $row['sender_id']) {




                                echo "<hr> <img class='col-2' width='85px' height='85px' src='img/" . $row['senderimg'] . "'></img><a href='user.php?user_id=" . $row['sender_id'] . "'>" . $row['sender_name'] . " " . "sizinle arkadaş olmak istiyor.</a><hr>";
                                $bildirim_var++; // Bildirim bulunduğunu işaretleyin

                            }
                        }




                        while ($q = mysqli_fetch_assoc($query2)) {


                            if ($q['sender_id'] != $session_user_id) {


                                echo "<hr><a href='chat.php?session_id=" . $session_user_id . "&user_id=" . $q['sender_id'] . "'>" . $q['senderName'] . " " . "Tarafından gönderildi...'" . $q['messages'] . "'" . "<br></a><hr>";
                                $bildirim_var++; // Bildirim bulunduğunu işaretleyin

                            } else {
                            }
                        }



                        //Konulara yapılan yorumların bildirim kısmı

                        while ($row = mysqli_fetch_assoc($sorgu2)) {

                            if ($row['receiver_id'] == $session_user_id) {
                                echo "<hr><a href='topics.php?baslik_sahip_id=" . $row['receiver_id'] . "&t_id=" . $row['topic_id'] . "'>" . $row['title'] . " " . "adlı konunuza " . $row['name'] . " kullanıcısı yorum yaptı... </a> <hr>";

                                $bildirim_var++; // Bildirim bulunduğunu işaretleyin
                            }
                        }



                        // Bildirim yoksa mesajı göster
                        if ($bildirim_var == 0) {
                            echo "Bildirim yok <br>";
                        }


                        ?>
                    </ul>
                </li>
                <?php if ($bildirim_var > 0) {

                    echo "<div class='col mt-2'>+" . $bildirim_var . "</div>";
                } ?>
            </ul>

            <!-- Arama=== <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
        </div>
    </div>
</nav>