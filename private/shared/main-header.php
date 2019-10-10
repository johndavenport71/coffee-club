<?php
  if(!isset($page_title)) { $page_title = 'Home - Coffee Club'; }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= h($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto|Satisfy&display=swap">
    <link rel="preload" href="<?= url_for('/stylesheets/coffee-club.css'); ?>">
    <link rel="preload" href="<?= url_for('/public/images/hero-img.jpg'); ?>">
    <link rel="preload" href="<?= url_for('/public/images/tile-1.jpg'); ?>">
    <link rel="preload" href="<?= url_for('/public/images/tile-2.jpg'); ?>">
    <link rel="preload" href="<?= url_for('/public/images/tile-3.jpg'); ?>">
    <link rel="preload" href="<?= url_for('/public/images/spilled-coffee.png'); ?>">
    <link rel="preload" href="<?= url_for('private/shared/functions.php'); ?>">
    <link rel="preload" href="<?= url_for('/public/images/bars-solid.svg'); ?>">
    <link rel="preload" href="<?= url_for('/js/jquery-3.4.1.min.js'); ?>">
    <link rel="preload" href="<?= url_for('/js/scripts.js'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="preload">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="<?= url_for('/js/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= url_for('/js/scripts.js'); ?>"></script>
    <link rel="stylesheet" href="<?= url_for('/stylesheets/coffee-club.css'); ?>">
  </head>

  <body>
    <header class="main-header" role="banner">
        <nav role="navigation">
            <a href="index.php" title="Home">Home</a>
            <div class="login">
                <?php
                    echo '<a href="' . url_for('/members/index.php') . '" title="Dashboard">Dashboard</a>';
                  if($_SESSION['loggedIn']){
                    echo '<a href="' . url_for('/log-out.php') . '" title="Log Out">Log Out</a>';
                  } else {
                    echo '<a href="' . url_for('/sign-up.php') . '" title="Sign Up">Sign Up</a>';
                    echo '<a href="' . url_for('/login.php') . '" title="Login">Login</a>';
                  }
                ?>
            </div>
            <i class="material-icons" id="nav-toggle">menu</i>
        </nav>
        <h1>Coffee Club</h1>
        <p>Your neighborhood coffee supplier</p>
        <a href="<?= url_for('/sign-up.php'); ?>" class="cta">Sign Up!</a>
    </header>