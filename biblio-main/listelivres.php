<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;

// Convertit l'identifiant en entier
$id = intval($id);

// Connexion à la base de données
include('include/connexion.php');
$pdo = connexion();

// Récupération des données : exemples
include('include/select.php');
//$table = select_table($pdo);
//$ligne = select_ligne_unique($pdo, $id);
include('include/functionIndex.php');

include_once('include/functionIndex.php');
$livres = select_livres($pdo);

// Lancement du moteur Twig avec les données
echo $twig->render('liste-livres.twig',[
	//  'table' => $table,
	//  'ligne' => $ligne,
		'livres'=>$livres,
	]);
