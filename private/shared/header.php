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
    <link rel="preload" href="<?= url_for('/public/stylesheets/main.css'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="preload">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= url_for('/stylesheets/main.css'); ?>">
    <script src="<?= url_for('/js/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= url_for('/js/scripts.js'); ?>"></script>
  </head>
  <body>      
    <header class="member-header" role="banner">
      <?php
        if(isset($_SESSION['user']) && isset($_SESSION['match'])) {
          $msg = '<div class="hello">Hi there, ';
          $msg .= $_SESSION['user'];
          $msg .= '!</div>';
          echo $msg;
        }
      ?>
      <nav role="navigation">
        <div class="menu">
          <a href="<?= url_for('/index.php') ?>" title="Home">Home</a>
          <a href="<?= url_for('/products.php') ?>">Products</a>
          <?php
            if($_SESSION['loggedIn']){
              echo '<a href="' . url_for('/members/index.php') . '" title="Dashboard">Dashboard</a>';
              echo '<a href="' . url_for('/log-out.php') . '" title="Log Out">Log Out</a>';
            } else {
              echo '<a href="' . url_for('/sign-up.php') . '" title="Sign Up">Sign Up</a>';
              echo '<a href="' . url_for('/login.php') . '" title="Login">Login</a>';
            }
          ?>
        </div>
        <i class="material-icons" id="nav-toggle">menu</i>
      </nav>
    </header>