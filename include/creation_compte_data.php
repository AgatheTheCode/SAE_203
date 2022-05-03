<?php

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