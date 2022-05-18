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
$genre = focus_genre($pdo,$id);
var_dump($genre);

include('include/index_data.php');


echo $twig->render('genre_detail_template.twig', [
  'genre'=>$genre,
  'index' => $index,
  'nav' => $nav,
  'footer' => $footer,
]);
