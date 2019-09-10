<?php
  if(!isset($page_title)) { $page_title = 'Coffee Club'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo h($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/coffee-club.css'); ?>" />
  </head>

  <body>      
    <header class="member-header">
      <h1><a href="<?php echo url_for('index.php'); ?>">Coffee Club</a></h1>
      <nav>
        <a href="index.php">Home</a>
        <div class="login">
          <a href="<?php echo url_for('/sign-up.php'); ?>">Sign Up</a>
          <a href="<?php echo url_for('/members/index.php'); ?>">Login</a>
        </div>
      </nav>
    </header>