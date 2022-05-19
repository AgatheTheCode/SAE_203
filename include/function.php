
<?php
//////////////////////////////////////////////////////////////////

function admin_insert_categorie()
{
    require_once('include/config.php');
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
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', ($_POST['description_categorie']))){
            $description_categorie_err="Une description de categorie ne peut-être composer que de lettres, chiffres et underscores";
        }
        else{
            //requête ajout de la description
            $sql = "SELECT nom_categorie FROM categorie WHERE nom_categorie = :nom_categorie";
    
            if($stmt = $pdo->prepare($sql)){
                $stmt->bindParam(":nom_categorie", $param_nom_categorie, PDO::PARAM_STR);
    
                $param_nom_categorie = $_POST["nom_categorie"];
    
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
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', ($_POST['description_categorie']))){
            $description_categorie_err="Une description de categorie ne peut-être composer que de lettres, chiffres et underscores";
        }
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

//////////////////////////////////////////////////////////////////

function login_client(){
    // Initialize the session
session_start();
 
// Verification que le client n'est pas déja logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once('include/config.php');
$pdo = connexion();
 
// initialisation des variable vides
$username = $password = "";
$username_err = $password_err = $login_err =""; 


// Process des donneés du form
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // pseudo vide?
    if(empty(trim($_POST["pseudo_client"]))){
        $username_err = "Entrez votre pseudo.";
    } else{
        $username = trim($_POST["pseudo_client"]);
    }
    
    // mdp vide?
    if(empty(trim($_POST["mdp"]))){
        $password_err = "Entrez votre mot de passe.";
    } else{
        $password = trim($_POST["mdp"]);
    }
    
    // VERIFICATION DES INFOS FORMULAIRES
    if(empty($username_err) && empty($password_err)){
        // Requête
        $sql = "SELECT id_client, pseudo_client, mdp_client FROM client WHERE pseudo_client = :pseudo_client";
        
        if($stmt = $pdo->prepare($sql)){
            // Liaison des variables
            $stmt->bindParam(":pseudo_client", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["pseudo_client"]);
            
            // execution de $stmt (statement  = déclaration en français)
            if($stmt->execute()){
                // Verifie client, si oui verify mdp
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id_client"];
                        $username = $row["pseudo_client"];
                        $hashed_password = $row["mdp_client"];
                        if(password_verify($password, $hashed_password)){
                            // mdp correct
                            session_start();
                            
                            // stock des donneées dans les varaibles
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id_client"] = $id;
                            $_SESSION["pseudo_client"] = $username;                            
                            
                            // Redirection de l'utilisateur si connexion OK
                            header("location: index.php");
                        } else{
                            // mot de passe n'est pas valide
                            $password_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Nom d'utilisateur n'existe pas
                    $password_err = "Invalid username or password.";
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
//////////////////////////////////////////////////////////////////

function create_account(){
    // Include config file
require_once('include/config.php');
$pdo = connexion();
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "test";
$username_err = $password_err = $confirm_password_err = "test";
 
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
                //header("location: login.php");
                echo "done";
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

////////////////////////////////////////////////////////////

function afficher_produit_tous($pdo){
        // construction de la requête
        $sql = 'select * from produit';

        // exécution de la requête
        $query = $pdo->prepare($sql);
    
        $query->execute();
    
        if ($query->errorCode() == '00000') {
            // récupération des données dans un tableau
            $tableau = $query->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
            $tableau = null;
        }
    
        return $tableau;
}
function focus_produit($pdo, $id)
{
    // construction de la requête
    $sql = 'SELECT * ,categorie.nom_categorie,categorie.id_categorie,genre.nom_genre,genre.id_genre from produit inner join categorie on produit.id_categorie=categorie.id_categorie inner join genre on produit.id_genre=genre.id_genre where id_produit = :id ORDER BY nom_produit;';

    // exécution de la requête
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function focus_categorie($pdo, $id)
{
    // construction de la requête
    $sql = 'SELECT *,produit.nom_produit,produit.prix_produit,produit.note_produit,produit.id_categorie from categorie INNER JOIN produit on categorie.id_categorie=produit.id_categorie WHERE categorie.id_categorie = :id ORDER BY nom_categorie;';

    // exécution de la requête
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
var_dump($tableau);

}

function focus_genre($pdo, $id)
{
    // construction de la requête
    $sql = 'SELECT *,produit.nom_produit,produit.prix_produit,produit.note_produit,produit.id_genre from genre INNER JOIN produit on genre.id_genre=produit.id_genre having genre.id_genre = :id Order BY nom_genre;';

    // exécution de la requête
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;

}

function afficher_categorie_tous($pdo){
    // construction de la requête
    //$sql = ' SELECT *, SUM(produit.qte_produit) from categorie INNER JOIN produit ON produit.id_categorie=categorie.id_categorie GROUP BY nom_categorie';
    $sql = 'SELECT COUNT(nom_produit) AS total_produit, categorie.image_categorie, categorie.nom_categorie, categorie.id_categorie FROM produit INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie GROUP BY nom_categorie;'; 
    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }
    return $tableau;

    function count_item_categorie($pdo,$sum,$id){

    $stmt ='SELECT SUM(qte_produit)  FROM produit where id_categorie =:id';
    
    $query = $pdo->prepare($stmt);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->bindValue(':sum',$sum,PDO::PARAM_INT);
    
    
    $query->execute();
    
    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } 
    else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }
    
    return $tableau;
    var_dump($tableau);
    }
    
}

function afficher_genre_tous($pdo){
    // construction de la requête
    //$sql = ' SELECT *, SUM(produit.qte_produit) from categorie INNER JOIN produit ON produit.id_categorie=categorie.id_categorie GROUP BY nom_categorie';
    $sql = 'SELECT COUNT(nom_produit) AS total_produit, genre.image_genre ,genre.nom_genre, genre.id_genre FROM produit INNER JOIN genre ON produit.id_genre = genre.id_genre GROUP BY nom_genre;'; 
    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }
    return $tableau;

    function count_item_genre($pdo,$sum,$id){

    $stmt ='SELECT SUM(qte_produit)  FROM produit where id_genre =:id order by nom_produit ';
    
    $query = $pdo->prepare($stmt);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->bindValue(':sum',$sum,PDO::PARAM_INT);
    
    
    $query->execute();
    
    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } 
    else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }
    
    return $tableau;
    var_dump($tableau);
    }
    
}

function random_produits($pdo)
{
    $sql ='SELECT * FROM `produit` ORDER BY RAND() LIMIT 9';
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }
    return $tableau;    
}

function select_genre($pdo,$id)
{
    
    $sql ='SELECT * FROM genre WHERE id_genre =:id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }
    return $tableau;    
}
function select_categorie($pdo,$id)
{
    $sql ='SELECT * FROM categorie WHERE id_categorie =:id';
    //$sql ='SELECT *,produit.id_categorie, produit.id_genre, produit.prix_produit, produit.nom_produit,produit.desc_produit,produit.qte_produit FROM categorie INNER JOIN produit on produit.id_categorie = categorie.id_categorie WHERE categorie.id_categorie =:id';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }
    return $tableau;    
}
