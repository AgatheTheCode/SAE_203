<?php




//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle

//Include config file
include('include/twig.php');
$twig = init_twig();
//plus fonctionnelle
include('include/config.php');
connexion();
include('include/page-admin-data.php');
include_once('include/function.php');
admin_insert_categorie();


echo $twig->render('page-admin.twig', [
    'cat' => $cat,
 
]);
