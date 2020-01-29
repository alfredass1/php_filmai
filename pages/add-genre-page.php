<h2>Zanro pridejimas</h2>

<?php
$dsn = "mysql:host=$host; dbname=$db";
$conn = new PDO($dsn, $username, $password, $options);
if (isset($_POST['submit'])) {
    try {
        if ($conn) {
            $sql = "INSERT INTO zanrai(zanro_pavadinimas)
            VALUES (:pavadinimas)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':pavadinimas', $_POST['pavadinimas'], PDO::PARAM_STR);
            $stmt->execute();
            header('Location:/php_basics/php_filmai/?page=zanrai');


        }

    } catch (PDOException $e) {

    echo $e->getMessage();
 }
}
?>

<form method="post">
    <div class="form-group">
        <label for="Movie_name">Pavadinimas</label>
        <input type="text" class="form-control" id="pavadinimas" placeholder="pavadinimas" name="pavadinimas">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
