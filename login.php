<?php

//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle
//plus fonctionnelle

//Include config file
include('include/twig.php');
$twig = init_twig();

include('include/config.php');
include('include/login_data.php');
include_once('include/function.php');
login_client();


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" name="pseudo_client" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php var_dump($username_err); ?></span>
            </div>    
            <div class="form-group">
                <label>Mot de Passe</label>
                <input type="mdp_client" name="mdp" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php var_dump($password_err); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Vous n'avez pas de compte client? <a href="connexion.php">Enregistrez vous maintenant !</a>.</p>
        </form>
    </div>
</body>
</html>