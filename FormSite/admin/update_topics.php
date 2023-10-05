
<style>

.update-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 12px 20px;
    cursor: pointer;
    font-size: 18px;
}

.btn-primary:hover {
    background-color: #0056b3;
}


</style>


<?php


include 'db.php';
$query = "SELECT * FROM topics WHERE id=" . $_GET['id'];
$query2 = mysqli_query($db, $query);
$query3 = mysqli_fetch_assoc($query2);




if (isset($_GET['editBtn'])) {

    echo '<form method="POST" class="update-form">
    <div class="form-group">
        <label for="ustBaslik">Üst Başlık:</label>
        <input type="text" class="form-control" name="ustBaslik" id="ustBaslik" value="'.$query3['title'].'" required>
    </div>

    <div class="form-group">
        <label for="altBaslik">Alt Başlık:</label>
        <input type="text" class="form-control" name="altBaslik" id="altBaslik" value="'.$query3['subtitle'].'" required>
    </div>

    <button type="submit" class="btn btn-primary">Geri Dön</button>
    <button type="submit" name="geri" class="btn btn-primary">Güncelle</button>

</form>
';
    //Guncelleme
    if (isset($_POST['geri'])) {
     
        header("location:index.php");
    }

    if (isset($_POST['ustBaslik'])) {
     
        $guncel1 = "UPDATE topics SET title='" . $_POST['ustBaslik'] . "', subtitle='" . $_POST['altBaslik'] . "'WHERE id=".$_GET['id']."";
        $guncel2 = mysqli_query($db, $guncel1);
        header("location:index.php");
    }
}
