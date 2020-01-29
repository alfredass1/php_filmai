<h2>Visi filmai</h2>
<?php
prisijungti();
$filmai = visiFilmai();
?>
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

    </tr>
    <?php endforeach;;?>

</table>
