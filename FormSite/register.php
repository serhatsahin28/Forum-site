<?PHP
include 'db.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

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
    <h1>Kaydol</h1>

        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="#" id="icon" alt="" />
        </div>

        <!-- Login Form -->
        <form method="post">
            <!--name özelliğine göre post özelliklerini kullanabiliyorsun -->
            <input type="text" id="name" class="fadeIn second" name="name" placeholder="name">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" id="submit" class="fadeIn fourth" name="submit" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="login.php">Hesabınız var mı?</a>
        </div>
        <?php



        if (!empty($_POST["password"])) {
            $name = $_POST["name"];
            $password = $_POST['password'];


            $kontrol = "SELECT COUNT(*) AS count FROM users WHERE name ='" . $name . "'";

            $kontrol2 = mysqli_query($db, $kontrol);
            $kontrol3 = mysqli_fetch_assoc($kontrol2);
            $userKayıt = "INSERT INTO users (name,password) VALUES ('$name','$password')";


            if ($kontrol3['count'] <= 0) {

                $userKayıt2 = mysqli_query($db, $userKayıt);

                if ($userKayıt2) {
                    header("Location: login.php");
                } else {
                    echo 'Kayıt oluşturulurken başarısız olundu.';
                }
            } else {

                echo "Kullanıcı zaten var.";
            }
        }


        ?>





        </body>

</html>