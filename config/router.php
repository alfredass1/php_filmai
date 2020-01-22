<?php
If (isset($_GET['page'])){
    switch (htmlspecialchars($_GET['page'])){
        case 'visi':
            include ('templates/pages/all-movies-page.php');
            break;
        case 'nauja-kategorija':
            include ('templates/pages/add-genre-page.php');
            break;
        case 'paieška':
            include ('templates/pages/search.page.php');
            break;
        case 'prideti-filma':
            include ('templates/add_movie.page.php');
            break;


        default:
    }
}else{
    include ('templates/pages/main-page.php');
}