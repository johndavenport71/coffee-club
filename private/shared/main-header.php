<?php
  if(!isset($page_title)) { $page_title = 'Coffee Club'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= h($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="prefetch" href="/public/stylesheets/coffee-club.css">
    <link rel="prefetch" href="https://fonts.googleapis.com/css?family=Roboto|Satisfy&display=swap">
    <link rel="prefetch" href="/public/images/hero-img.jpg">
    <link rel="prefetch" href="/public/images/tile-1.jpg">
    <link rel="prefetch" href="/public/images/tile-2.jpg">
    <link rel="prefetch" href="/public/images/tile-3.jpg">
    <link rel="prefetch" href="private/shared/initialize.php">
    <link rel="prefetch" href="private/shared/functions.php">
    <link rel="stylesheet" href="<?= url_for('/stylesheets/coffee-club.css'); ?>">
  </head>

  <body>
    <header class="main-header">
        <nav>
            <a href="index.php">Home</a>
            <div class="login">
                <a href="<?= url_for('/sign-up.php'); ?>">Sign Up</a>
                <a href="<?= url_for('/members/index.php'); ?>">Login</a>
            </div>
        </nav>
        <h1>Coffee Club</h1>
        <p>Your neighborhood coffee supplier</p>
        <a href="<?= url_for('/sign-up.php'); ?>" class="cta">Sign Up!</a>
    </header>
