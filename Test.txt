Initial commit
SAVE ADMIN 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Configuration Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>

    
</head>
<body>
    <div class="wrapper">
        <h2>Ajouter une catégorie</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nom Catégorie</label>
                <input type="text" name="nom_categorie" class="form-control <?php echo (!empty($nom_categorie_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom_categorie; ?>">
                <span class="invalid-feedback"><?php echo $nom_categorie_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Description categorie</label>
                <input type="text" name="description_categorie" class="form-control <?php echo (!empty($description_categorie_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description_categorie; ?>">
                <span class="invalid-feedback"><?php echo $description_categorie_err; ?></span>
            </div>
            <div class="form-group">
                <label>Image categorie</label>
                <input type="text" name="image_categorie" class="form-control <?php echo (!empty($image_categorie_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image_categorie; ?>">
                <span class="invalid-feedback"><?php echo $image_categorie_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>

        <h2>Ajouter une Genre</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nom Genre</label>
                <input type="text" name="nom_genre" class="form-control <?php echo (!empty($nom_genre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom_genre; ?>">
                <span class="invalid-feedback"><?php echo $nom_genre_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Description genre</label>
                <input type="text" name="description_genre" class="form-control <?php echo (!empty($description_genre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $description_genre; ?>">
                <span class="invalid-feedback"><?php echo $description_genre_err; ?></span>
            </div>
            <div class="form-group">
                <label>Image Genre</label>
                <input type="text" name="image_genre" class="form-control <?php echo (!empty($image_genre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image_genre; ?>">
                <span class="invalid-feedback"><?php echo $image_genre_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>

FIN SAVE