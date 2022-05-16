<?php


// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;

// Convertit l'identifiant en entier
$id = intval($id);
//Include config file
include('include/twig.php');
$twig = init_twig();

include('include/config.php');
$pdo = connexion();

include('include/function.php');
//$produit = afficher_produit_tous($pdo);
$categorie = focus_categorie($pdo,$id);
$genre = focus_genre($pdo,$id);
//var_dump($categorie);




echo $twig->render('categories_detail_template.twig', [
  'categorie' => $categorie,
]);
//var_dump($categorie);