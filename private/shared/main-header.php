<?php
  if(!isset($page_title)) { $page_title = 'Coffee Club'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title><?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/coffee-club.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>Coffee Club</h1>
      <img src="<?php echo url_for('/images/hero-img.jpg'); ?>" width=1200px height=500px alt="Coffee beans">
    </header>

    <nav>
      <ul>
        <li><a href="<?php echo url_for('/members/index.php'); ?>">Home</a></li>
      </ul>
    </nav>
