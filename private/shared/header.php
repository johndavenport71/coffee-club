<?php
  if(!isset($page_title)) { $page_title = 'Coffee Club'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= h($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="/public/stylesheets/coffee-club.css">
    <link rel="stylesheet" href="<?= url_for('/stylesheets/coffee-club.css'); ?>">
  </head>

  <body>      
    <header class="member-header">
      <h1><a href="<?= url_for('index.php'); ?>">Coffee Club</a></h1>
      <nav>
        <a href="<?= url_for('index.php') ?>">Home</a>
        <div class="login">
          <a href="<?= url_for('/sign-up.php'); ?>">Sign Up</a>
          <a href="<?= url_for('/members/index.php'); ?>">Login</a>
        </div>
      </nav>
    </header>