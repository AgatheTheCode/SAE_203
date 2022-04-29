
<?php
function admin_insert_categorie()
{
    $pdo = connexion();

    // initialisation des variables
$image_categorie = $nom_categorie = $description_categorie ="";
$param_image_categorie = $param_description_categorie = $param_nom_categorie = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
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
}
}


function login_client(){
    // Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once('include/config.php');
$pdo = connexion();
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["pseudo_client"]))){
        $username_err = "Entrez votre pseudo.";
    } else{
        $username = trim($_POST["pseudo_client"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["mdp"]))){
        $password_err = "Entrez votre mot de passe.";
    } else{
        $password = trim($_POST["mdp"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_client, pseudo_client, mdp_client FROM client WHERE pseudo_client = :pseudo_client";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":pseudo_client", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["pseudo_client"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id_client"];
                        $username = $row["pseudo_client"];
                        $hashed_password = $row["mdp_client"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_client"] = $id;
                            $_SESSION["pseudo_client"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
}

function create_account(){
    // Include config file
require_once('include/config.php');
$pdo = connexion();
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["pseudo_client"]))){
        $username_err = "Entrez un pseudo.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["pseudo_client"]))){
        $username_err = "Un nom d'utilisateur ne peut-être composer que de lettres, chiffres et underscores";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_client FROM client WHERE pseudo_client = :pseudo_client";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":pseudo_client", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["pseudo_client"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Ce pseudo est déjà utilisé.";
                } else{
                    $username = trim($_POST["pseudo_client"]);
                }
            } else{
                echo "Oops! Promis c'est pas de ma faute !.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["mdp_client"]))){
        $password_err = "Entrez votre mot de passe.";     
    } elseif(strlen(trim($_POST["mdp_client"])) < 6){
        $password_err = "Le mot de passe doit faire 6 charactères.";
    } else{
        $password = trim($_POST["mdp_client"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_mdp_client"]))){
        $confirm_password_err = "Veuillez confirmer votre mot de passe.";     
    } else{
        $confirm_password = trim($_POST["confirm_mdp_client"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Les mots de passes ne correspondent pas.";
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO client (pseudo_client, mdp_client) VALUES (:pseudo_client, :mdp_client)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":pseudo_client", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":mdp_client", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            //password_hash hash et "sale" le mot de passe ce qui permet d'avoir des résultats de hash différent même si deux 
            //clients ont le même mdp
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}}
}