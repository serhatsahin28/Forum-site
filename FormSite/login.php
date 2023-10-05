<?PHP
include 'db.php';
include 'functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<link href=" //maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="css/login.css">

</head>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h1>Giriş Yap</h1>
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="#" id="icon" alt="" />
        </div>

        <!-- Login Form -->
        <form method="POST">
            <input type="text" id="login" class="fadeIn second" name="name" placeholder="Ad">
            <input type="text" id="password" class="fadeIn third"  name="password" placeholder="Şifre">
            <br>
            <input type="submit" class="fadeIn fourth" value="GİRİŞ YAP" >
        </form>

        <!-- Remind Passowrd
        <div id="formFooter">
            <a class="underlineHover" href="#">Şifremi unuttum</a>
        </div>
 -->
        <div id="formRegister">
            <a class="underlineHover" href="register.php">Kayıt ol</a>
        </div>


        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = strtoupper($_POST["name"]);
            $password = strtoupper($_POST["password"]);


            if (!empty($password) && !empty($name)) {

                $sorgu = "Select  COUNT(*) AS count from users where name='" . $name . "' AND password='" . $password . "'";

                $sorgu2 = mysqli_query($db, $sorgu);

                $sorgu3 = mysqli_fetch_assoc($sorgu2);

                if ($sorgu3['count'] == 1) {
                    $_SESSION['password'] = $password;
                    $_SESSION['name'] = $name;


                    header("Location: index.php");
                } else {

                    echo "Başarısız...";
                }
            }
        }
        ?>





        </body>

</html>
