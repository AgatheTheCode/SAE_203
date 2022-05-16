<?php
//Include config file
include('include/twig.php');
$twig = init_twig();

include('include/config.php');
$pdo = connexion();

include('include/index_data.php');

echo $twig->render('index.twig', [
  'index' => $index,
  'nav' => $nav,
  'footer' => $footer,
]);
