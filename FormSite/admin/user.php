<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
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
</style>

<body>
    <?php
include 'sidebar.php';

?>
<input type="text" style="margin-left:500px;margin-top:50px;" id="searchInput" placeholder="Konu Ara...">

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="container mt-5">
                    <h2>Kullanıcılar</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kulanıcı Adı</th>
                                <th>img</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr>
                                <?php
include 'tablesDB/user.php';




foreach ($query2 as $q) {
    echo '
                                    <tr class="topic-row">
                                        <td>1</td>
                                        <td>' . $q["name"] . '</td>
                                        <td><img style="width:75px; height:75px;" src="img/' . $q["img"] . '"></img></td>
                                        <td>

                                        <form method="get" action="user_profile.php">
                                        <input type="hidden" name="id" id="id" value="' . $q['id'] . '">
                                            <button class="btn btn-primary btn-sm editBtn" name="editBtn" >Profili gör</button>
                                        
                                        </form>

                                      <form method="POST" action="delete_user.php?id="' . $q['id'] . '" >
                                        <input type="hidden" name="id" id="id" value="' . $q['id'] . '">
                                            <button class="btn btn-danger btn-sm deleteBtn " name="deleteBtn" id="deleteBtn">Sil</button>
                                        
                                        </form>
                                            </td>
                                    </tr>';



}



?>
                            </tr>
                        </tbody>
                    </table>
                    <br><br><br><br>
                </div>
            </div>
        </div>
    </div>
    <?php




?>

    <!-- ... -->




</html>

</body>


<script>
    // Arama kutusu
    var searchInput = document.getElementById('searchInput');

    // Tablo satırları
    var rows = document.querySelectorAll('.topic-row');

    // Arama işlemi
    searchInput.addEventListener('input', function () {
        var searchText = searchInput.value.toLowerCase();

        rows.forEach(function (row) {
            var title = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            var subtitle = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

            // Konu veya alt başlıkta arama yapma
            if (title.includes(searchText) || subtitle.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
