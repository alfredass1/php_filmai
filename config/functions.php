<?php

function prisijungti()
{
    global $host, $db, $username, $password, $options;
    $dns = "mysql:host=$host;dbname=$db";
    try {
        $conn = new PDO($dns, $username, $password, $options);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    return $conn;
}


//filmai bei ju zanras

function visiFilmai()
{
    $conn = prisijungti();
    try {
        if ($conn) {
            $stmt = $conn->query("SELECT filmai.pavadinimas, filmai.aprasymas, filmai.id,
        filmai.metai, filmai.imdb, filmai.zanrai_id, filmai.rezisierius, zanrai.zanro_pavadinimas
        FROM filmai
        INNER JOIN zanrai ON filmai.zanrai_id=zanrai.id");
            $filmai = $stmt->fetchAll();
            $conn = null;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    return $filmai;
}

// filmas pagal id

function gautiFilma()
{
    $conn = prisijungti();
    try {
        if ($conn) {
            $thisId = $_GET['id'];
            $stmt = $conn->query("SELECT filmai.id as movies_id, filmai.pavadinimas, filmai.metai, filmai.rezisierius, filmai.imdb,
                                        filmai.aprasymas, filmai.zanrai_id, zanrai.id, zanrai.zanro_pavadinimas FROM filmai
                                        INNER JOIN  zanrai ON filmai.zanrai_id=zanrai.id
                                        WHERE filmai.id=$thisId");
            $filmas = $stmt->fetch();
            $conn = null;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $filmas;
}

//filmo redagavimas

function atnaujintiFilma()
{
    $conn = prisijungti();
    $thisId = $_GET['id'];
    try {
        if ($conn) {
            $stmt = $conn->prepare("UPDATE filmai SET pavadinimas = :pavadinimas,
            aprasymas = :aprasymas,
            metai = :metai,
            rezisierius = :rezisierius,
            imdb = :imdb,
            pavadinimas = :pavadinimas
           WHERE filmai.id=$thisId");


            $stmt->bindParam(':pavadinimas', $pavadinimas, PDO::PARAM_STR);
            $stmt->bindParam(':aprasymas', $aprasymas, PDO::PARAM_STR);
            $stmt->bindParam(':metai', $metai, PDO::PARAM_STR);
            $stmt->bindParam(':rezisierius', $rezisierius, PDO::PARAM_STR);
            $stmt->bindParam(':imdb', $ivertinimai, PDO::PARAM_STR);
            $stmt->bindParam(':zanrai_id', $zanrasId, PDO::PARAM_STR);
            $stmt->execute();

        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

//visi zanrai
function visiZanrai()
{
    $conn = prisijungti();
    try {
        if ($conn) {
            $stmt = $conn->query("SELECT * FROM zanrai");
            $filmuZanrai = $stmt->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    return $filmuZanrai;

}

//zanras pagal id
function gautiZanra()
{
    $conn = prisijungti();
    try {
        if ($conn) {
            $thisId = $_GET['id'];
            $stmt = $conn->query("SELECT * FROM zanrai
                              WHERE id = $thisId");
            $zanras = $stmt->fetch();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $zanras;

}

// filmai pagal zanra
function pagalZanra()
{

    $conn = prisijungti();
    try {
        if ($conn) {
            if (isset($_GET['id'])) {
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
        exit;
    }
    return $pagalzanra;
}


//filmu paieska
function paieska($input)
{
    $conn = prisijungti();
    try {
        if ($conn) {
            $uzklausa = $conn->prepare('SELECT zanrai.pavadinimas AS kategorija, filmai.pavadinimas, 
                        filmai.rezisierius, filmai.metai, filmai.imdb, filmai.aprasymas FROM filmai
                        INNER JOIN zanrai
                        ON filmai.zanrai_id = zanrai.id
                        WHERE filmai.pavadinimas LIKE ?');

            $uzklausa->bindValue(1, "%$input%", PDO::PARAM_STR);
            $uzklausa->execute();
            $rezultatai = $uzklausa->fetchAll();

        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }

    return $rezultatai;
}


function trintiZanra($thisId){
    $conn = prisijungti();
    try {
        if ($conn) {
            if ($conn) {
                $stmt = $conn->query("DELETE FROM zanrai WHERE id=$thisId");
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}