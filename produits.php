<?php


     //traitement formulaire

var_dump($_POST);
$filtre = [];

if(isset($_POST['trier'])) 
{
  if(isset ($_POST['T-shirt'])){
    $filtre[0]= array ('name'=> $_POST['T-shrit'], 'value' => 1);
  }
  else{
    $filtre[0]= array ('value' => 0);
  }

  if(isset ($_POST['Pins'])){
    $filtre[1]= array ('name'=> $_POST['Pins'], 'value' => 1);
  }
  else{
    $filtre[1]= array ('value' => 0);
  }

  if(isset ($_POST['Sweat'])){
    $filtre[2]= array ('name'=> $_POST['Sweat'], 'value' => 1);
  }
  else{
    $filtre[2]= array ('value' => 0);
  }
  
  if(isset ($_POST['Tasse'])){
    $filtre[2]= array ('name'=> $_POST['Tasse'], 'value' => 1);
  }
  else{
    $filtre[2]= array ('value' => 0);
  }
  
  if(isset ($_POST['Lunettes'])){
    $filtre[2]= array ('name'=> $_POST['Lunettes'], 'value' => 1);
  }
  else{
    $filtre[2]= array ('value' => 0);
  }
  
  if(isset ($_POST['Console Rétro'])){
    $filtre[2]= array ('name'=> $_POST['Console Rétro'], 'value' => 1);
  }
  else{
    $filtre[2]= array ('value' => 0);
  }
  
  if(isset ($_POST['Stickers'])){
    $filtre[2]= array ('name'=> $_POST['Stickers'], 'value' => 1);
  }
  else{
    $filtre[2]= array ('value' => 0);
  }

}

//Include config file
include('include/twig.php');
$twig = init_twig();

include('include/config.php');
$pdo = connexion();
include('include/produits_data.php');
include_once('include/function.php');
$produit=filtre($pdo);


echo $twig->render('produits_template.twig', [
    'categorie' => $categorie,
    'genre' => $genre,
    'titre' =>$titre,
    'produit' =>$produit
]);
