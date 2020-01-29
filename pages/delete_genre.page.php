<?php
prisijungti();
$thisid = $_GET['id'];
$zanrai = pagalZanra($thisid);
if (isset($_POST['submit'])) {
    trintiZanra($thisid);
    header('Location:/php_basics/php_filmai/?page=visi_zanrai');
}
?>


<h3>Ar tikrai ištrinti šį žanrą?</h3>
<table class="table table-bordered">
    <tr>
        <?php
        foreach ($zanrai as $zanras):?>
    </tr>
    <tr>
        <td><?=$zanras['zanro_pavadinimas'];?></td>
        <?php endforeach;?>
</table>
<form method="post">
    <button type="submit" class="btn btn-primary" name="submit">Ištrinti</button>
</form>