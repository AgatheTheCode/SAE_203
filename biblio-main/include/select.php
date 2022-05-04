<?php

// Sélectionne toutes les lignes d'une table
function select_table($pdo)
{
  // construction de la requête
  $sql = 'select colonne1, colonne2 from table';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}

// Sélectionne des lignes dans une table avec une clé étrangère
function select_lignes($pdo, $id)
{
  // construction de la requête
  $sql = 'select colonne1, colonne2 from table where cle_etrangere = :id';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}

// Sélectionne un ligne dans une table avec sa clé primaire
function select_ligne_unique($pdo, $id)
{
  // construction de la requête
  $sql = 'select * from table where id = :id';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération de la première ligne
    $ligne = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie la première (et unique) ligne
  return $ligne;
}