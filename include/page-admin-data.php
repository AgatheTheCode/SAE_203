<?php
$cat =
[
    ['titre' =>'Ajouter une catégorie','phpaction' => '"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"', 'form' =>[

        
        ['nom' => 'Nom de la catégorie', 'phpspan' => '<?php echo $nom_categorie_err; ?>'],
        ['phpinput' => ' type="text" name="nom_categorie" class="form-control "<?php echo (!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value= <?php echo $nom_categorie; ?>.'],
        ['phpspan' => '<?php echo $description_categorie_err; ?>'],

        /*['nom' => 'Description de la catégorie', 'phpspan' => '<?php echo $description_categorie_err; ?>'],
        ['phpinput' => '<?php echo (!empty($description_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value=".<?php echo $description_categorie; ?>." '],

        ['nom' => 'Lien de l\'image de la catégorie', 'phpspan' => '<?php echo $description_categorie_err; ?>'],
        ['phpinput' => '<?php echo (!empty($image_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $image_categorie; ?>"'],*/
]
] ,
    ['titre' =>'Ajouter un genre','phpaction' => '"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"', 'form' =>[

        
        ['nom' => 'Nom de la catégorie', 'phpspan' => '<?php echo $nom_categorie_err; ?>'],
        ['phpinput' => ' type="text" name="nom_categorie" class="form-control "<?php echo (!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value= <?php echo $nom_categorie; ?>.'],

        /*['nom' => 'Description de la catégorie', 'phpspan' => '<?php echo $description_categorie_err; ?>'],
        ['phpinput' => '<?php echo (!empty($description_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value=".<?php echo $description_categorie; ?>." '],
        */

        /*['nom' => 'Lien de l\'image de la catégorie', 'phpspan' => '<?php echo $description_categorie_err; ?>'],
        ['phpinput' => '<?php echo (!empty($image_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php echo $image_categorie; ?>"'],
          */
        ] 
    ]
    
];
