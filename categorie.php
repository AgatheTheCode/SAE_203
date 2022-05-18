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
$genre = afficher_genre_tous($pdo);

include('include/index_data.php');


echo $twig->render('categorie_template.twig', [
  'index' => $index,
  'nav' => $nav,
  'footer' => $footer,
  'categorie' => $categorie,
  'genre' => $genre,
]);
