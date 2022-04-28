<?php
$categorie =[
    'titre' =>'Ajouter une catégorie', 
    'action' =>'<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">',
    'nom' =>'Nom Catégorie',
    'input' =>'type="text" name="nom_categorie" class="form-control <?php echo (!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $nom_categorie; ?>"',
    'invalid_feeback' =>'<?php echo $nom_categorie_err; ?>',
];
