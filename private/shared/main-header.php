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
    <link rel="preload" href="/public/stylesheets/coffee-club.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto|Satisfy&display=swap">
    <link rel="preload" href="/public/images/hero-img.jpg">
    <link rel="preload" href="/public/images/tile-1.jpg">
    <link rel="preload" href="/public/images/tile-2.jpg">
    <link rel="preload" href="/public/images/tile-3.jpg">
    <link rel="preload" href="private/shared/initialize.php">
    <link rel="preload" href="private/shared/functions.php">
    <link rel="stylesheet" href="<?= url_for('/stylesheets/coffee-club.css'); ?>">
  </head>

  <body>
    <header class="main-header">
        <nav>
            <a href="index.php">Home</a>
            <div class="login">
                <?php
                  if($_SESSION['loggedIn']){
                    echo '<a href="' . url_for('/members/index.php') . '">Dashboard</a>';
                    echo '<a href="' . url_for('/log-out.php') . '">Log Out</a>';
                  } else {
                    echo '<a href="' . url_for('/sign-up.php') . '">Sign Up</a>';
                    echo '<a href="' . url_for('/login.php') . '">Login</a>';
                  }
                ?>
            </div>
        </nav>
        <h1>Coffee Club</h1>
        <p>Your neighborhood coffee supplier</p>
        <a href="<?= url_for('/sign-up.php'); ?>" class="cta">Sign Up!</a>
    </header>