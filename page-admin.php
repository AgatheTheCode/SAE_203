<?php


//Include config file
include('include/twig.php');
$twig = init_twig();
//plus fonctionnelle
include('include/config.php');
connexion();
include('include/page-admin-data.php');
include_once('include/function.php');
admin_insert_categorie();


include('include/index_data.php');


echo $twig->render('page-admin.twig', [
    'cat' => $cat,
    'index' => $index,
    'nav' => $nav,
    'footer' => $footer,
]);
