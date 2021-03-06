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
$produit = focus_produit($pdo,$id);
include('include/index_data.php');


echo $twig->render('produits_detail_template.twig', [
  'produit' => $produit,
  'index' => $index,
  'nav' => $nav,
  'footer' => $footer,
]);
