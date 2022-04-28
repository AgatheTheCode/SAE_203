
<?php
function admin_insert_categorie ($pdo, $categorie)
{

    // Define variables and initialize with empty values
$image_categorie = $nom_categorie = $image_categorie = $description_categorie ="";
$param_image_categorie = $param_description_categorie = $param_nom_categorie = "";
      // construction et préparation de la requête
  $sql = 'insert into categorie (nom_categorie, description_categorie, image_categorie) values (:nom_categorie, :description_categorie, :image_categorie)';
  echo '<p>Requête : ' . $sql . '</p>';
  
  if($stmt = $pdo->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":nom_categorie", $param_nom_categorie, PDO::PARAM_STR);
    $stmt->bindParam(":description_categorie", $param_description_categorie, PDO::PARAM_STR);
    $stmt->bindParam(":image_categorie", $param_image_categorie, PDO::PARAM_STR);
    
    // Set parameters
    $param_nom_categorie = $nom_categorie;
    $param_description_categorie = $description_categorie;
    $param_image_categorie = $image_categorie;
}
}