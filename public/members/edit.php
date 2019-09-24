<?php 
  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $id = htmlspecialchars($_POST['memberID']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);

    $sql = $conn->prepare("UPDATE members SET first_name = :fname, last_name = :lname,
     email = :email WHERE memberID = :id;");
    $sql->bindParam(':fname', $fname);
    $sql->bindParam(':lname', $lname);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':id', $id);
    $sql->execute();
    header('Location: ' . url_for('/members/index.php'));
    
  } else {
    $id = $_GET['id'] ?? '1'; // PHP > 7.0
    $fname = $_GET['fname'] ?? ''; // PHP > 7.0
    $lname = $_GET['lname'] ?? ''; // PHP > 7.0
    $email = $_GET['email'] ?? ''; // PHP > 7.0
    $page_title = 'Edit Member'; 

  }

  include(SHARED_PATH . '/header.php');
?>
  <main class="sign-up">
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