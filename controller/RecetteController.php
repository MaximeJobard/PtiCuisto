<?php
    require_once('modele/RecetteManager.php'); //Récupération du modèle

    /**
     * Fonction pour la page "Nos recettes"
     * le paramère $depart indique où on en est de la liste (utilisation du bouton "Plus" pour avancer de 10 en 10)
     */
    function afficher_liste($depart){
        $recettes = liste();
        echo '<table>';
        for($i = $depart; $i < $depart + 10 && $i < count($recettes); $i++){ 
            echo '<tr> <td>' . $recettes[$i]['titre'] . '<td/><td>' . $recettes[$i]['categorie'] . '<td/><td>' . $recettes[$i]['rec_resume']  . '<td/>' . '<td>' . '<img src=' . $recettes[$i]['rec_image'] . 'alt="image de la recette">' . '<td/><tr/>';
            echo '<br>';
        }
        echo '<table/>';
        echo '<a href="index.php?plus=' . $depart . '">Plus</a>';
    }
?>