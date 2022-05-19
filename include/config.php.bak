<?php

function connexion()
{
  $pdo = new PDO('mysql:host=localhost;dbname=meganerd_bdd;charset=utf8', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

  if ($pdo) {
    return $pdo;
  } 
  else {
    echo '<p>Erreur de connexion</p>';
    exit;
  }
}