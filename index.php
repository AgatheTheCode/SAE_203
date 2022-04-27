<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

include('include/dataindex.php');


echo $twig->render('index.twig',[

    'index' => $index,  
]);