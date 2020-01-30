<?php
prisijungti();
$filmuZanrai = visiZanrai();
?>


<?php
if (isset($_POST['submit'])){
    header('Location:/php_basics/php_filmai/?page=prideti-zanra');
}
?>


<form method="post">
    <button type="submit" class="btn btn-primary" name="submit">Pridėti žanrą</button>
</form>
<table class="table table-bordered">
    <?php foreach ($filmuZanrai as $pglzanra): ?>
        <td><?= $pglzanra['zanro_pavadinimas']; ?></td>
        <td><a href="?page=zanro-salinimas&id=<?= $pglzanra['id']; ?>">Salinti</a></td>
        </tr>
    <?php endforeach; ?>
    </tr>
</table>
