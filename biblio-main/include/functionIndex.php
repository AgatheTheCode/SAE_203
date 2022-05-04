<?php
//la base et l'index repose sur la même database pour simplifier le code des pages suivante qui ne call pas tout l'index
function select_livres($pdo)
{
    // construction de la requête
    $sql = 'select titre, isbn from livres';

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

//la base et l'index repose sur la même database pour simplifier le code des pages suivante qui ne call pas tout l'index
function select_detlivres($pdo, $id)
{
    // construction de la requête
    $sql = 'select * ,editeurs.nom from livres inner join editeurs on livres.id_editeur=editeurs.id where isbn = :id;';

    // exécution de la requête
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function insert_auteurs ($pdo, $auteurs)
{
      // construction et préparation de la requête
  $sql = 'insert into auteurs (nom, prenom) values (:nom, :prenom)';
  echo '<p>Requête : ' . $sql . '</p>';
 
  $query = $pdo->prepare($sql);
 
  // assignation des valeurs à partir du tableau $auteur
  $query->bindValue(':nom', $auteurs['nom'], PDO::PARAM_STR);
  $query->bindValue(':prenom', $auteurs['prenom'], PDO::PARAM_STR);
 
  // exécution de la requête
  $query->execute();
}
/*function select_titreslivres($pdo)
{
    // construction de la requête
    $sql = 'select titre form livres;';

    // exécution de la requête
    $query = $pdo->prepare($sql);
    //$query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}*/

