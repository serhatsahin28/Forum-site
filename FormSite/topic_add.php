<?php

include 'db.php';
include 'header.php';
$user = $_SESSION['name'];
$user_query = "SELECT * FROM users WHERE name='$user'";
$user_query2 = mysqli_query($db, $user_query);
$user_query3 = mysqli_fetch_assoc($user_query2);
$user_id = $user_query3['id'];
?>
<h1> Hoşgeldiniz <?php echo $user ?></h1>
<div class="col d-flex justify-content-center ">
    <form method="post" action="index.php">
        <input type="submit" name="button" value="Geri Dön">
    </form>
</div>
<br>
<div class="col d-flex justify-content-center mt-5">
    <form method="post">

        <input type="text" name="title" placeholder="Başlık"> <br>
        <input type="text" name="subtitle" placeholder="Alt başlık"> <br>
        <input type="submit" name="button" value="Oluştur">
        </form>

</div>






<?php


//Konuyu oluşturma ve veritabanına kaydetme işlemleri
if (isset($_POST['button'])) {
    if (!empty($_POST['title']) && !empty($_POST['subtitle'])) {

        $stmt = $db->prepare("INSERT INTO topics (user_id, title, subtitle) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $title, $subtitle);

        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];


        $stmt->execute();

        $stmt->close();


        if ($stmt) {
            echo "Başarılı bir şekilde konu oluşturuldu";
            header('Location:index.php');
        }
    }
}




?>