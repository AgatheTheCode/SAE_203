<?php

$Login =[
    'login' => 'Login',
    'info' => 'Entrez vos information de connextion',
    'form' => 'action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"',
    'phperr' =>'<?php if(!empty($login_err)){ echo \'<div class="alert alert-danger">\' . $login_err . \'</div>\';}?>',
    'username_err' => '<?php echo $username_err;. ?>',
    'mdp_err' => '<?php echo $password_err; ?>'
]

?>