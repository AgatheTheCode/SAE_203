<?php
$cat =
[
    ['titre' =>'Ajouter une catégorie','phpaction' => '"<?php dump(htmlspecialchars($_SERVER["PHP_SELF"])); ?>"', 'form' =>[

        
        ['nom' => 'Nom de la catégorie', 'phpspan' => '<?php dump($nom_categorie_err); ?>'],
        ['phpinput' => ' type="text" name="nom_categorie" class="form-control "<?php dump((!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value= <?php dump($nom_categorie; ?>.'],
        ['phpspan' => '<?php dump($description_categorie_err); ?>'],

        ['nom' => 'Description de la catégorie', 'phpspan' => '<?php dump($description_categorie_err); ?>'],
        ['phpinput' => '<?php dump((!empty($description_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value=".<?php dump($description_categorie; ?>." '],

        ['nom' => 'Lien de l\'image de la catégorie', 'phpspan' => '<?php dump($description_categorie_err); ?>'],
        ['phpinput' => '<?php dump((!empty($image_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php dump($image_categorie; ?>"'],
]
] ,
    ['titre' =>'Ajouter un genre','phpaction' => '"<?php dump(htmlspecialchars($_SERVER["PHP_SELF"]); ?>"', 'form' =>[

        
        ['nom' => 'Nom de la catégorie', 'phpspan' => '<?php dump($nom_categorie_err; ?>'],
        ['phpinput' => ' type="text" name="nom_categorie" class="form-control "<?php dump((!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value= <?php dump($nom_categorie; ?>.'],

        ['nom' => 'Description de la catégorie', 'phpspan' => '<?php dump($description_categorie_err); ?>'],
        ['phpinput' => '<?php dump((!empty($description_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value=".<?php dump($description_categorie; ?>." '],
        

        ['nom' => 'Lien de l\'image de la catégorie', 'phpspan' => '<?php dump($description_categorie_err); ?>'],
        ['phpinput' => '<?php dump((!empty($image_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php dump($image_categorie; ?>"'],
        ] 
    ]
    
];
