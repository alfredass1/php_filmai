<?php
If (isset($_GET['page'])){
    switch (htmlspecialchars($_GET['page'])){
        case 'visi':
            include ('pages/all-movies-page.php');
            break;
        case 'zanrai':
            include ('pages/genres.page.php');
            break;
        case 'paieska':
            include ('pages/search.page.php');
            break;
        case 'filmu-valdymas':
            include ('pages/add_films.page.php');
            break;


        default:
    }
}else{
    include ('pages/main-page.php');
}