<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['username'] == 'backend' && $_POST['password'] == 'group4'){

        // this helps prevent session fixation attacks
        session_regenerate_id(true);

        $_SESSION['is_logged_in'] = true;
        
        // redirect to the admin page
        header('Location: admin_page.php');
        exit;

    } else {

        $error = "Login incorrect";
    }
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br> <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br> <br>

        <button type="submit">Sign in</button>
    </form>
</body>
</html>
