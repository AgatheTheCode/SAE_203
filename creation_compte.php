<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <?php
    //Include config
include_once('include/config.php');
connexion();
//include fuction.php
include_once('include/function.php');
create_account();
    ?>

</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Pseudo</label>
            <input type="text" name="username" class="form-control <?php //var_dump(!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php //var_dump($username); ?>">
                <!-- <span class="invalid-feedback"><?php // echo $username_err; ?></span>   -->
        </div>    
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="mdp_client" class="form-control <?php //var_dump(!empty($password_err)) ? 'is-invalid' : '';?>" value="<?php //var_dump($password); ?>">
                <!-- <span class="invalid-feedback"><?php // var_dump($password_err); ?></span> -->
        </div>
        <div class="form-group">
            <label>Confirmer le mot de passe</label>
            <input type="password" name="confirm_mdp_client" class="form-control <?php //var_dump(!empty($confirm_password_err)) ? 'is-invalid' : '' ;?>" value="<?php //var_dump($confirm_password); ?>">
                <!-- <span class="invalid-feedback"><?php //var_dump($confirm_password_err); ?></span> -->
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p> Vous avez déjà un compte? <a href="login.php"> Connectez-vous ! </a>.</p>
    </form>
</div>    

</body>
</html>