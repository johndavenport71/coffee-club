<?php 
  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $id = h($_POST['memberID']);

    deleteMember($conn, $id);
    header('Location: ' . url_for('/members/index.php'));
    
  } else {
    $id = h($_GET['id']) ?? '1'; // PHP > 7.0

    $member = getMember($conn, $id);

    $id = $member['member_ID'];
    $fname = $member['first_name'];
    $lname = $member['last_name'];
    $email = $member['email'];

    $page_title = 'Delete Member'; 

  }

  include(SHARED_PATH . '/header.php');
?>
  <main class="sign-up">
    <a class="add" href="<?= url_for('/members/index.php'); ?>">&laquo; Back to List</a>
    <h2>Delete Member</h2>
    <p>Are you sure you want to delete this member?</p>
    <form action="delete.php" method="POST">
        <label for="memberID">Member ID</label>
        <input type="text" id="memberID" name="memberID" readonly value="<?= $id ?>"><br>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" readonly value="<?= $fname ?>"><br>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" readonly value="<?= $lname ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" readonly value="<?= $email ?>"><br>

        <input type="submit" value="Delete">
    </form>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>