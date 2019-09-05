<?php
  if(!isset($page_title)) { $page_title = 'Coffee Club'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title><?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/coffee-club.css'); ?>" />
  </head>

  <body>      
    <header class="member-header">
      <h1><a href="<?php echo url_for('index.php'); ?>">Coffee Club</a></h1>
      <nav>
        <a href="index.php">Home</a>
        <div class="login">
          <a href="">Sign Up</a>
          <a href="<?php echo url_for('/members/index.php'); ?>">Login</a>
        </div>
      </nav>
    </header>