<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<?php  

session_start();

include 'sidebar.php';

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit;
}


if (!empty($_POST["submit"])) {
    header("Location: logout.php");
}




include 'tablesDB/topics.php';

?>
<br><br>
<h1 class="col" style="margin-left:400px;">Hoşgeldiniz Yönetici<?php echo " ".$_SESSION['name'];?></h1>
<input type="text" style="margin-left:500px;margin-top:50px;" id="searchInput" placeholder="Konu Ara...">

<div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="container mt-5">
                    <h2>Konular</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Üst başlık</th>
                                <th>Alt Başlık</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr>
                                <?php




                                foreach ($query2 as $q) {
                                    echo '
                                    <tr class="topic-row">
                                        <td>1</td>
                                        <td>' . $q["title"] . '</td>
                                        <td>' . $q["subtitle"] . '</td>
                                        <td>

                                        <form method="GET" action="update_topics.php">
                                        <input type="hidden" name="id" id="id" value="' . $q['id'] . '">
                                            <button class="btn btn-primary btn-sm editBtn" name="editBtn" >Düzenle</button>
                                        
                                        </form>

                                      <form method="POST" action="delete_topics.php">
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


    <!-- ... -->




</html>

</body>