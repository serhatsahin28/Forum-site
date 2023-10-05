

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Örnek Tablo</title>
    <link rel="stylesheet" href="styles.css">
    <style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-align: center;
}

h1 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
}

thead {
    background-color: #333;
    color: #fff;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #ddd;
}
</style>
</head>

<?php


//include 'sidebar.php';
include 'tablesDB/topics_user_join.php';
include 'sidebar.php';




?>



<body>
    <div class="container">
        <h1>Kullanıcıya ait konular </h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Üst Başlık</th>
                    <th>Alt Başlık</th>
                    <th>Edit</th>

                </tr>
            </thead>
<input type="text" id="searchInput" placeholder="Konu Ara...">

            <tbody>
                <?php



foreach ($t_u_j2 as $t) {

    if ($t_count3 != 0& $t != "") {
        echo '
                <tr class="topic-row">
                    <td>1</td>
                    <td>' . $t["subtitle"] . '</td>
                    <td>' . $t["title"] . '</td>
                    <td><form method="POST" action="topics_comments.php?id='. $t["id"] . "&t_id=" . $t['t_id'] . '">
                    <input type="hidden" name="id" id="id">
                        <button class="btn btn-primary btn-sm editBtn" name="editBtn" id="editBtn">Edit</button>
                    
                    </form></td>
                </tr>
                ';


    }

    else {

        $uyarı = 'Kullanıcı henüz konu oluşturmadı';
        echo '  <tr>
            <td>1</td>
            <td>' . $uyarı . '</td>
            <td></td>
            
            
        </tr>';
    }
}


?>
             
            </tbody>
        </table>
    </div>
</body>

</html>


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