<h2>Filmo paieškos laukelis </h2>

<?php
$dsn= "mysql:host=$host; dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password);
    if($conn){
        $stmt = $conn->query("SELECT * FROM filmai");
        $filmai = $stmt->fetchAll();

    }
}catch (PDOException $e){

    echo $e->getMessage();
}?>


<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="text" class="form-control" id="title" list="pavadinimai"  placeholder="Filmo pavadinimas" name="title">
        <datalist id="pavadinimai">
            <?php foreach ($filmai as $filmas):?>
            <option value="<?=$filmas['pavadinimas'];?>">
            <?php endforeach;?>
        </datalist>
    </div>

    <button type="submit" class="btn btn-primary" name="search">Submit</button>
</form>


<?php
if (isset($_POST['search'])) :?>

    <?php
    $searchIT = $_POST['title'];
    $uzklausa = $conn->query ("SELECT id, pavadinimas, metai, rezisierius, imdb,
                                        aprasymas FROM filmai
                                        WHERE pavadinimas like '%$searchIT%'");
    $filmams = $uzklausa->fetchAll();
    $uzklausa->bindValue(1, "%$searchIT%", PDO::PARAM_STR); // Ką reiškia ši eilutė?
    ?>

    <table class="table table-bordered">
            <?php
            foreach ($filmams as $filmas):?>

        <tr>
            <td><?=$filmas['id'];?></td>
            <td><?=$filmas['pavadinimas'];?></td>
            <td><?=$filmas['metai'];?></td>
            <td><?=$filmas['rezisierius'];?></td>
            <td><?=$filmas['imdb'];?></td>
            <td><?=$filmas['aprasymas'];?></td>
        </tr>
        <?php endforeach;?>
    </table>


<?php endif;?>