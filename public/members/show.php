<?php 
  require_once('../../private/initialize.php'); 
  is_user_logged_in();
  $id = $_GET['id'] ?? '1'; // PHP > 7.0
  
  $member = getMember($conn, $id);

  $id = $member['member_ID'];
  $fname = $member['first_name'];
  $lname = $member['last_name'];
  $email = $member['email'];
  $phone = $member['phone'];

  $page_title = 'Show Member'; 
  include(SHARED_PATH . '/header.php');
?>

<main class="members" role="main">
  <a class="add" href="<?= url_for('/members/index.php'); ?>">&laquo; Back to List</a>
  <ul class="show">
    <li>Member ID: <?= h($id); ?></li>
    <li>First Name: <?= h($fname); ?></li>
    <li>Last Name: <?= h($lname); ?></li>
    <li>Email: <?= h($email); ?></li>
    <li>Phone: <?= h($phone); ?></li>
  </ul>
</main>

<?php include(SHARED_PATH . '/footer.php');