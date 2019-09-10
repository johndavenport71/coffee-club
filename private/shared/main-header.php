<?php
  if(!isset($page_title)) { $page_title = 'Coffee Club'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo h($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/coffee-club.css'); ?>">
    <link rel="prefetch" href="private/shared/initialize.php">
    <link rel="prefetch" href="private/shared/functions.php">
  </head>

  <body>
    <header class="main-header">
        <nav>
            <a href="index.php">Home</a>
            <div class="login">
                <a href="<?php echo url_for('/sign-up.php'); ?>">Sign Up</a>
                <a href="<?php echo url_for('/members/index.php'); ?>">Login</a>
            </div>
        </nav>
        <h1>Coffee Club</h1>
        <p>Your neighborhood coffee supplier</p>
        <a href="<?php echo url_for('/sign-up.php'); ?>" class="cta">Sign Up!</a>
    </header>
