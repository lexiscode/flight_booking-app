<?php

// initializes the session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (htmlspecialchars($_POST['username']) == 'backend' && htmlspecialchars($_POST['password']) == 'group4') {

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
    <link rel="stylesheet" href="stylings/loginStyle.css">
</head>

<body>

    <h1 id="h1">Airline Booking Form</h1>
    <h2 align="center">LOGIN</h2>

    <?php if (!empty($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <div class="container">
        <form method="POST" action="">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <br> <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br> <br>

            <center><button type="submit">Sign in</button></center>
        </form>
    </div>
</body>

</html>
