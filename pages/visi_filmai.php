<?php
prisijungti();
$filmai = visiFilmai();
?>

<?php
if (isset($_POST['submit'])){
    header('Location:/php_basics/php_filmai/?page=filmo-pridejimas');
}
?>
<form method="post">
<button type="submit" class="btn btn-primary" name="submit">Prideti filma</button>
</form>
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
        <td><?=$filmas['zanro_pavadinimas'];?></td>
        <td><?=$filmas['imdb'];?></td>
        <td><a href="?page=filmo-redagavimas&id=<?=$filmas['id'];?>">Redaguoti</a></td>
        <td><a href="?page=filmo-salinimas&id=<?=$filmas['id'];?>">Salinti</a></td>
    </tr>
    <?php endforeach;;?>
</table>
