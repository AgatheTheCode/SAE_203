<?php
include('include/connexion.php');
include('include/functionIndex.php');
 
$pdo = connexion();
 
$auteur = [
  'auid' => null,
  'prenom' => '',
  'nom' => ''
]; 
insert_auteurs($pdo, $auteurs);
