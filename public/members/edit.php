<?php 
  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $id = h($_POST['memberID']);
    $fname = h($_POST['fname']);
    $lname = h($_POST['lname']);
    $email = h($_POST['email']);

    editMember($conn, $id, $fname, $lname, $email);
    header('Location: ' . url_for('/members/index.php'));
    
  } else {
    $id = h($_GET['id']) ?? '1'; // PHP > 7.0

    $member = getMember($conn, $id);

    $id = $member['member_ID'];
    $fname = $member['first_name'];
    $lname = $member['last_name'];
    $email = $member['email'];

    $page_title = 'Edit Member'; 

  }

  include(SHARED_PATH . '/header.php');
?>
  <main class="sign-up" role="main">
    <a class="add" href="<?= url_for('/members/index.php'); ?>">&laquo; Back to List</a>
    <h2>Edit Member</h2>
    <form action="edit.php" method="POST">
        <label for="memberID">Member ID</label>
        <input type="text" id="memberID" name="memberID" readonly value="<?= $id ?>"><br>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?= $fname ?>"><br>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?= $lname ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $email ?>"><br>

        <input type="submit" value="Confirm">
    </form>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>