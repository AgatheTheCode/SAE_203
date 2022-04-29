<?php
//Include config file
include('include/twig.php');
$twig = init_twig();

include('include/config.php');
include('include/page-admin-data.php');
include_once('include/function.php');
admin_insert_categorie();

echo $twig->render('page-admin.twig', [
    'cat' => $cat,
    'item' =>$cat
]);
