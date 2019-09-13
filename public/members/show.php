<?php 
  require_once('../../private/initialize.php'); 
  $id = $_GET['id'] ?? '1'; // PHP > 7.0
  $page_title = 'Show Subject'; 
  include(SHARED_PATH . '/header.php'); 
?>

<main>

  <a class="back-link" href="<?= url_for('/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject show">

    Subject ID: <?= h($id); ?>

  </div>

</main>
