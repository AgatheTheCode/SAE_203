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
$categorie = afficher_categorie_tous($pdo);
//count_item_categorie($pdo, $id,$sum);
//$produit = focus_produit($pdo,$id);


echo $twig->render('categorie_template.twig', [
  'categorie' => $categorie,
]);
