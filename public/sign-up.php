<?php 
    require_once('../private/initialize.php'); 
    $page_title = 'Member Sign Up - Coffee Club'; 
    include(SHARED_PATH . '/header.php'); 

    $fname = '';
    $lname = '';
    $email = '';

    if(isset($_GET['fname'])) {
        $fname = h($_GET['fname']);
        $lname = h($_GET['lname']);
        $email = h($_GET['email']);
        echo '<p class="error">A user with that email already exists!</p>';
    }
?>

<main class="sign-up">
    <h2>New Member Sign Up</h2>
    <form action="register-member.php" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required value="<?= $fname ?>"><br>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required value="<?= $lname ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?= $email ?>"><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br>

        <input type="submit" value="Register">
    </form>

</main>

<?php include(SHARED_PATH . '/footer.php');