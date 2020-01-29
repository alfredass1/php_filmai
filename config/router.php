<?php
If (isset($_GET['page'])){
    switch (htmlspecialchars($_GET['page'])){
        case 'visi':
            include ('pages/all-movies-page.php');
            break;
        case 'zanrai':
            include ('pages/genres.page.php');
            break;
        case 'prideti-zanra':
            include ('pages/add-genre-page.php');
            break;
        case 'paieska':
            include ('pages/search.page.php');
            break;
        case 'filmu-valdymas':
            include ('pages/visi_filmai.php');
            break;
       case 'filmo-salinimas':
            include ('pages/delete_film.page.php');
          break;
        case 'filmo-pridejimas':
            include ('pages/add_films.page.php');
            break;
        case 'filmo-redagavimas':
            include ('pages/update_film.page.php');
            break;
        case 'zanru-valdymas':
            include ('pages/visi_zanrai.php');
            break;
        case'zanro-salinimas':
            include ('pages/delete_genre.page.php');

    }
}else{
    include ('pages/main-page.php');
}