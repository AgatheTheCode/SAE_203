<?php

function connexion()
{
  $pdo = new PDO('mysql:host=localhost;dbname=meganerd_bdd;charset=utf8', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

  if ($pdo) {
    return $pdo;
  } 
  else {
    echo '<p>Erreur de connexion</p>';
    exit;
  }
}
function admin_insert_categorie ($pdo, $categorie)
{
      // construction et préparation de la requête
  $sql = 'insert into categorie (nom_categorie, description_categorie, image_categorie) values (:nom_categorie, :description_categorie, :image_categorie)';
  echo '<p>Requête : ' . $sql . '</p>';
 
  $query = $pdo->prepare($sql);
 
  // assignation des valeurs à partir du tableau $auteur
  $query->bindValue(':nom_categorie', $categorie ['nom_categorie'], PDO::PARAM_STR);
  $query->bindValue(':prenom', $categorie ['description_categorie'], PDO::PARAM_STR);
  $query->bindValue(':nom', $categorie ['image_categorie'], PDO::PARAM_STR);

  // exécution de la requête
  $query->execute();
}
