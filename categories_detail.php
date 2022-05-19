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
$categorie = focus_categorie($pdo,$id);
$categorie_det = select_categorie($pdo,$id);

include('include/index_data.php');
//var_dump($categorie);



echo $twig->render('categories_detail_template.twig', [
  'categorie_det' => $categorie_det,
  'categorie' => $categorie,
  'index' => $index,
  'nav' => $nav,
  'footer' => $footer,
]);