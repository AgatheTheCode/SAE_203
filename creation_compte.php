<?php
    //Include config file
include('include/twig.php');
$twig = init_twig();

include('include/config.php');
//include('include/creation_compte_data.php');
include_once('include/function.php');
create_account();

echo $twig->render('creation_compte.twig', [

]);