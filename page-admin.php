<?php
// Include config file
include('include/twig.php');
$twig = init_twig();
include('include/config.php');
//include_once('include/function.php');

$pdo = connexion();

    // initialisation des variables
$image_categorie = $nom_categorie = $image_categorie = $description_categorie ="";
$param_image_categorie = $param_description_categorie = $param_nom_categorie = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){



        //validation de la description de la catégorie
        if(empty($_POST["nom_categorie"])){
            $nom_categorie_err = "Nom invalide";
        } 
       /* elseif(!preg_match('/^[a-zA-Z0-9_]+$/', ($_POST['description_categorie']))){
            $description_categorie_err="Une description de categorie ne peut-être composer que de lettres, chiffres et underscores";
        }*/
        else{
            //requête ajout de la description
            $sql = "SELECT nom_categorie FROM categorie WHERE nom_categorie = :nom_categorie";
    
            if($stmt = $pdo->prepare($sql)){
                $stmt->bindParam(":nom_categorie", $param_nom_categorie, PDO::PARAM_STR);
    
                $param_description_categorie = $_POST["nom_categorie"];
    
                //verification que la nouvelle categorie n'existe pas
    
                if($stmt->execute()){
                    if($stmt->rowCount()==1){
                        $nom_categorie_err = "Une catégorie avec le même nom existe déjà !";
                    } 
                    else{
                        $nom_categorie = $_POST["nom_categorie"];
                    }
                }
            }
        }
    

        //validation de la description de la catégorie
        if(empty($_POST["description_categorie"])){
            $description_categorie_err = "Description invalide";
        } 
       /* elseif(!preg_match('/^[a-zA-Z0-9_]+$/', ($_POST['description_categorie']))){
            $description_categorie_err="Une description de categorie ne peut-être composer que de lettres, chiffres et underscores";
        }*/
        else{
            //requête ajout de la description
            $sql = "SELECT description_categorie FROM categorie WHERE description_categorie = :description_categorie";
    
            if($stmt = $pdo->prepare($sql)){
                $stmt->bindParam(":description_categorie", $param_description_categorie, PDO::PARAM_STR);
    
                $param_description_categorie = $_POST["description_categorie"];
    
                //verification que la nouvelle categorie n'existe pas
    
                if($stmt->execute()){
                    if($stmt->rowCount()==1){
                        $description_categorie_err = "Une catégorie avec la même description existe déjà !";
                    } 
                    else{
                        $description_categorie = $_POST["description_categorie"];
                    }
                }
            }
        }


    //validation de la description de l'image de la categorie
    if(empty($_POST["image_categorie"])){
        $image_categorie_err = "Image invalide";
    } 
    /*elseif(!preg_match('/^[a-zA-Z0-9_]+$/', ($_POST['image_categorie']))){
        $image_categorie_err="Une description de categorie ne peut-être composer que de lettres, chiffres et underscores";
    }*/
    else{
        //requête ajout de la description
        $sql = "SELECT image_categorie FROM categorie WHERE image_categorie = :image_categorie";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":image_categorie", $param_image_categorie, PDO::PARAM_STR);

            $param_image_categorie = $_POST["image_categorie"];

            //verification que l'image n'exite pas

            if($stmt->execute()){
                if($stmt->rowCount()==1){
                    $image_categorie = "Une catégorie avec la même description existe déjà !";
                } 
                else{
                    $image_categorie = $_POST["image_categorie"];
                }
            }
        }
    }
    // Verification que les champs ne sont pas vice
    if(empty($description_categorie_err) && empty($nom_categorie_err) && empty($image_categorie_err)){
        //insertion des données dans la bdd

        $sql = "INSERT INTO categorie (nom_categorie, description_categorie, image_categorie) VALUES (:nom_categorie, :description_categorie, :image_categorie)";

        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":nom_categorie", $param_nom_categorie, PDO::PARAM_STR);
            $stmt->bindParam(":description_categorie", $param_description_categorie, PDO::PARAM_STR);
            $stmt->bindParam(":image_categorie", $param_image_categorie, PDO::PARAM_STR);

            $param_nom_categorie = $nom_categorie;
            $param_description_categorie = $description_categorie;
            $param_image_categorie = $image_categorie;

            //execution de $stmt

            if($stmt->execute()){
                echo " Ajout fait";


            } else{
                echo "ERREUR";
            }

            unset($stmt);
        }
        unset($pdo);
    }


echo $twig->render('base.twig', [



]);
?>
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
    </div>    
</body>
</html>