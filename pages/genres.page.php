<?php
$dns= "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dns, $username, $password, $options);
    if($conn){
        $stmt = $conn->query("SELECT * FROM zanrai");
        $filmuZanrai = $stmt->fetchAll();

        if (isset($_GET['id'])){
            $zid = $_GET['id'];
            $stmt = $conn->query("SELECT filmai.pavadinimas, filmai.aprasymas, 
                              filmai.metai, filmai.rezisierius, zanrai.zanro_pavadinimas
                              FROM filmai 
                              INNER JOIN zanrai ON filmai.zanrai_id=zanrai.id
                              WHERE $zid=zanrai.id");
            $pagalzanra = $stmt->fetchAll();
        }

    }
} catch (PDOException $e) {
    echo $e->getMessage();
} ?>


    <h2>Filmai pagal zanra</h2>

<?php
foreach ($filmuZanrai as $zanras): ?>

    <ul class="list-group">
        <li class="list-group-item"><a href="?page=zanrai&id=<?=$zanras['id']; ?>"><?=$zanras['zanro_pavadinimas']; ?></a></li>
    </ul>
<?php endforeach; ?>
<?php if (isset($_GET['id'])): ?>
    <table class="table table-bordered">
        <thead>
        </thead>
        <tr>
            <?php
            foreach ($pagalzanra as $pglzanra): ?>
        <tr>
            <td><?=$pglzanra['zanro_pavadinimas']; ?></td>
            <td><?=$pglzanra['pavadinimas']; ?></td>
            <td><?=$pglzanra['aprasymas']; ?></td>
            <td><?=$pglzanra['rezisierius']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tr>
    </table>
<?php endif;?>