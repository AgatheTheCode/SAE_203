<?php
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
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" name="pseudo_client" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="mdp_client" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_mdp_client" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>