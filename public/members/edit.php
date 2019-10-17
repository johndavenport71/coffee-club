<?php 
  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $id = (int)h($_POST['memberID']);
    $fname = h($_POST['fname']);
    $lname = h($_POST['lname']);
    $email = h($_POST['email']);
    $phone = h($_POST['phone']);

    editMember($conn, $id, $fname, $lname, $email, $phone);
    header('Location: ' . url_for('/members/index.php'));
    
  } else {
    $id = (int)h($_GET['id']) ?? '1';

    $member = getMember($conn, $id);

    $id = $member['member_ID'];
    $fname = $member['first_name'];
    $lname = $member['last_name'];
    $email = $member['email'];
    $phone = $member['phone'];

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

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required value="<?= $phone ?>"><br>

        <input type="submit" value="Confirm">
    </form>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>