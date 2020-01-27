<h2>Visi filmai</h2>
<?php
$dsn= "mysql:host=$host; dbname=$db";
try{
    $conn = new PDO ($dsn, $username, $password,$options);
    if ($conn){

        $stmt = $conn->query("SELECT filmai.pavadinimas, filmai.aprasymas, filmai.id,
        filmai.metai, filmai.imdb, filmai.zanrai_id, filmai.rezisierius, zanrai.pavadinimas As zanro_Pavadinimas
        FROM filmai
        INNER JOIN zanrai ON filmai.zanrai_id=zanrai.id");
    $filmai = $stmt->fetchAll();
    }
}catch (PDOException $e){

    echo $e->getMessage();
}?>
<table class="table table-bordered">
    <tr>
        <?php
        foreach($filmai as $filmas):?>
    </tr>

     <tr>
        <td><?=$filmas['pavadinimas'];?></td>
        <td><?=$filmas['aprasymas'];?></td>
        <td><?=$filmas['metai'];?></td>
        <td><?=$filmas['rezisierius'];?></td>
        <td><?=$filmas['zanro_Pavadinimas'];?></td>
        <td><?=$filmas['imdb'];?></td>

    </tr>
    <?php endforeach;;?>

</table>
