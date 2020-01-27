<?php
$dns= "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dns, $username, $password, $options);
    if($conn){
        $stmt = $conn->query("SELECT * FROM zanrai");
        $filmuZanrai = $stmt->fetchAll();

        }

    }
catch (PDOException $e) {
    echo $e->getMessage();
} ?>
<table class="table table-bordered">
    <?php foreach ($filmuZanrai as $pglzanra):?>

            <td><?=$pglzanra['id']; ?></td>
            <td><?=$pglzanra['pavadinimas']; ?></td>
            <td><a href="?page=filmo-redagavimas&id=<?=$pglzanra['id'];?>">Redaguoti</a></td>
            <td><a href="?page=filmo-salinimas&id=<?=$pglzanra['id'];?>">Salinti</a></td>
        </tr>
        <?php endforeach; ?>
        </tr>
    </table>
