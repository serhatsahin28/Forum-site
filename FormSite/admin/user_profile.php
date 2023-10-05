<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Bilgileri</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .user-info {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        span {
            font-weight: normal;
            font-size: 18px;
            color: #333;
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br><br><br><br><br>
    <form action="user.php">
    <input type="submit" style="width:100px; height:35px; margin-top:50px;" value="Geri">
</form>


        <h1>Kullanıcı Bilgileri</h1>
        <div class="user-info">

            <?PHP

            include 'db.php';

            include 'tablesDB/topics_user_join.php';
            $query = "SELECT * FROM users WHERE id=".$_GET['id'];
            $query2 = mysqli_query($db, $query);



            while ($query3 = mysqli_fetch_assoc($query2)) {


                echo '
        
            <label for="username">Kullanıcı Adı:</label>
            <span id="username">' . $query3['name'] . '</span>

            <label for="email">Katılım Tarihi</label>
            <span id="email">'.$query3['Register_date'].'</span>
            <label for="baslik">Açtığı başlık sayısı</label>
            <a href="topics_view.php?id='.$query3['id'].'">'.$topic_count.'</a>

            <label for="age">Resim</label>
            <img src="../img/'.$query3['img'].'"></img>
            
        </div>

       ';
            } ?>

<br>

        </div>
</body>

</html>