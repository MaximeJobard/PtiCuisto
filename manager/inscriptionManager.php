<?php
function compteIsSet(){
    require_once("connexion.php");

    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE (NOM = \'' . $nom . '\' and PRENOM = \'' . $prenom . '\') or PSEUDO = \'' . $pseudo . '\' or ADRESSE_MAIL = \'' . $email . '\'');
    $query->execute();
    if ($query->rowCount() === 0) {
        return false;
    }else{
        return true;
    }


    return $nbUser;
}

function addUser($nom, $prenom, $pseudo, $email, $password){
    require("connexion.php");

    $query = $bdd->prepare('SELECT COUNT(*) FROM UTILISATEUR');
    $query->execute();

    $nbUser = 0;
    while ($row = $query->fetch()) {
        $nbUser = $row['COUNT(*)'];
    }
    $nbUser = $nbUser + 1;

    $sql = 'INSERT INTO UTILISATEUR (uti_id, pseudo, adresse_mail, prenom, nom, mdp) VALUES (' . $nbUser . ', \'' . $pseudo . '\',\'' . $email . '\',\'' . $prenom . '\',\'' . $nom . '\', \'' . $password . '\');';
    echo $sql;
    $insert = $bdd->prepare($sql);
    $insert->execute();
}
?>