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
    <style>

#formContent {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 100px;
}

.fadeIn {
    animation: fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

input[type="submit"] {
    width: 100%;
    background-color: red ;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

#errorMessages {
    color: red;
    margin-top: 20px;
    font-size: 16px;
}


    </style>

</head>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h1>Admin Paneline hoşgeldiniz</h1>
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

    </div>
    

      

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            $name = $_POST['name'];


            if (!empty($password) && !empty($name)) {

                $sorgu = "Select  COUNT(*) AS count from admin where username='" . $name . "' AND password='" . $password . "'";

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