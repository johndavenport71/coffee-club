<?php 
  require_once('../../private/initialize.php'); 
  $id = $_GET['id'] ?? '1'; // PHP > 7.0
  $fname = $_GET['fname'] ?? ''; // PHP > 7.0
  $lname = $_GET['lname'] ?? ''; // PHP > 7.0
  $email = $_GET['email'] ?? ''; // PHP > 7.0
  $page_title = 'Show Subject'; 
  include(SHARED_PATH . '/header.php');
?>

<main>
  <a class="back-link" href="<?= url_for('/members/index.php'); ?>">&laquo; Back to List</a>
  
</main>

<?php include(SHARED_PATH . '/footer.php');