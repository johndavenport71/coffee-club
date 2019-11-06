<?php 
  require_once('../../private/initialize.php'); 
  is_user_logged_in();
  $results = getMembers($conn);

  $page_title = 'Members Area - Coffee Club';
  include(SHARED_PATH . '/header.php');

?>

<main role="main" class="members">
  
  <h2>Members</h2>

  <?php
    include_once('orders.php');

    if($_SESSION['member_level'] === 'a') {
      include_once('admin-view.php');
    }
  ?>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>