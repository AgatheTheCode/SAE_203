<?php
//Include config file
include('include/twig.php');
$twig = init_twig();

include('include/config.php');
include('include/login_data.php');
include_once('include/function.php');
login_client();

echo $twig->render('page-login.twig', [

    $Login = 'Login'

]);
