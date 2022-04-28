<?php
$categorie =[
    'titre' =>'Ajouter une catégorie', 'formulaire' =>[
    ['action' =>'<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">', 
    'nom' =>'Nom Catégorie',
    'input' =>'type="text" name="nom_categorie" class="form-control <?php echo (!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $nom_categorie; ?>"',
    'invalid_feeback' =>'$nom_categorie_err; ?>',],
    ['action' =>'<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">', 
    'nom' =>'Description Catégorie',
    'input' =>'type="text" name="description_categorie" class="form-control <?php echo (!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $description_categorie; ?>"',
    'invalid_feeback' =>'$description_categorie_err; ?>',],
    ['action' =>'<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">', 
    'nom' =>'Image Catégorie',
    'input' =>'type="text" name="image_categorie" class="form-control <?php echo (!empty($image_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $image_categorie; ?>"',
    'invalid_feeback' =>'$image_categorie_err; ?>',]],

    'titre' =>'Ajouter un genre', 'formulaire' =>[
        ['action' =>'<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">', 
        'nom' =>'Nom Catégorie',
        'input' =>'type="text" name="nom_categorie" class="form-control <?php echo (!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $nom_categorie; ?>"',
        'invalid_feeback' =>'$nom_categorie_err; ?>',],
        ['action' =>'<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">', 
        'nom' =>'Description Catégorie',
        'input' =>'type="text" name="description_categorie" class="form-control <?php echo (!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $description_categorie; ?>"',
        'invalid_feeback' =>'$description_categorie_err; ?>',],
        ['action' =>'<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">', 
        'nom' =>'Image Catégorie',
        'input' =>'type="text" name="image_categorie" class="form-control <?php echo (!empty($image_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $image_categorie; ?>"',
        'invalid_feeback' =>'$image_categorie_err; ?>',]],
];
