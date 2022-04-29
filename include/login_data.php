<?php

$Login =[
    
    'h2' => 'Login',

    'info' => 'Entrez vos information de connextion',

    'input' => 'type="text" name="pseudo_client" <?php dump(!empty($username_err)) ? \'is-invalid\' : \'\'; ?>" value="<?php dump($username); ?>"',

    'input_mdp' => 'type="password" name="mdp"  <?php dump(!empty($password_err)) ? \'is-invalid\' : \'\'; ?>"',

    'form' => 'form methode ="POST" action="<?php dump htmlspecialchars($_SERVER["PHP_SELF"]); ?>"',

    'phperr' =>'<?php if(!empty($login_err)){ dump( \'<div class="alert alert-danger">\') . $login_err . \'</div>\';}?>',

    'username_err' => '<?php dump($username_err);. ?>',

    'mdp_err' => '<?php dump($password_err); ?>',

];
?>