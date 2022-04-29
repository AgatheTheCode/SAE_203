<?php
$cat =[
    ['titre' =>'Ajouter une catégorie','phpaction' => '"<?php dump(htmlspecialchars($_SERVER["PHP_SELF"])); ?>"', 'form' =>[

        
        ['nom' => 'Nom de la catégorie', 'phpspan' => '<?php dump($nom_categorie_err); ?>',
        'phpinput' => 'type="text" name="description_categorie" type="text" name="nom_categorie" class="form-control "<?php dump((!empty($nom_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php dump($nom_categorie; ?>"',
        'phpspan' => '<?php dump($nom_categorie_err); ?>'],

        ['nom' => 'Description de la catégorie', 'phpspan' => '<?php dump($description_categorie_err); ?>',
        'phpinput' => '<?php dump((!empty($description_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php dump($description_categorie; ?>." ',
        'phpspan' => '<?php dump($description_categorie_err); ?>'],

        ['nom' => 'Lien de l\'image de la catégorie', 'phpspan' => '<?php dump($description_categorie_err); ?>',
        'phpinput' => '<?php dump((!empty($image_categorie_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php dump($image_categorie; ?>"',
        'phpspan' => '<?php dump($image_categorie_err); ?>'] ] ],

    ['titre' =>'Ajouter un genre','phpaction' => '"<?php dump(htmlspecialchars($_SERVER["PHP_SELF"]); ?>"', 'form' =>[

        ['nom' => 'Nom du genre', 'phpspan' => '<?php dump($nom_genre_err); ?>',
        'phpinput' => 'type="text" name="description_genre" type="text" name="nom_genre" class="form-control "<?php dump((!empty($nom_genre_err)) ? \'is-invalid\' : \'\'; ?>" value= <?php dump($nom_genre; ?>.',
        'phpspan' => '<?php dump($nom_genre_err); ?>' ],

        ['nom' => 'Description du genre', 'phpspan' => '<?php dump($description_genre_err); ?>',
        'phpinput' => '<?php dump((!empty($description_genre_err)) ? \'is-invalid\' : \'\'; ?>" value=".<?php dump($description_genre; ?>." ',
        'phpspan' => '<?php dump($description_genre_err); ?>'],

        ['nom' => 'Lien de l\'image du genre', 'phpspan' => '<?php dump($description_genre_err); ?>',
        'phpinput' => '<?php dump((!empty($image_genre_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php dump($image_genre; ?>"',
        'phpspan' => '<?php dump($image_genre_err); ?>'], ], 
        
    ]  
    
    
     ];
