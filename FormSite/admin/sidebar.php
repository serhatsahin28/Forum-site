<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .sidebar {
        width: 120px;
        height: 100vh;
        background-color: #333;
        position: fixed;
        left: 0;
        top: 0;
        padding-top: 20px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        padding: 10px;
        text-align: center;
    }

    .sidebar ul li a {
        color: white;
        text-decoration: none;
    }

    .content {
        margin-left: 260px;
        padding: 20px;
    }

    .dashboard-wrapper {



        margin-left: 75px;
    }

.baslikk{

font-size: 20px;
color: white;
}

</style>
</head>
<body>
    
<div class="sidebar">
        <ul>
<a href="index.php" class="col bg-danger baslikk">Admin paneli</a>  
        <li class="col bg-danger "> <a href="index.php">Konular</a></li>
            <li class="col bg-danger "> <a href="user.php">Kullanıcılar</a></li>


            <br>
            <form method="GET" action="logout.php">
                                        <input type="hidden" name="id" id="id" value="' . $q['id'] . '">
                                            <button class="btn btn-primary btn-sm editBtn" name="editBtn" >Çıkış yap</button>
                                        
                                        </form>
        </ul>
    </div>

</body>
</html>