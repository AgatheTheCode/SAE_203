<?php

function connexion()
{
  $pdo = new PDO('mysql:host=tp2.iha.unistra.fr;dbname=dufourj_meganerd;charset=utf8', 'dufourj', 'Joseph23');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

  if ($pdo) {
    return $pdo;
  } 
  else {
    echo '<p>Erreur de connexion</p>';
    exit;
  }
}