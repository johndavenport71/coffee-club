<?php 
    require_once('../private/initialize.php');
    include(SHARED_PATH . '/header.php');

    $_SESSION['loginAttempt'] = $_SESSION['loginAttempt'] ?? false;

    //figure out if there was a failed login and display error message if it was.
    if($_SESSION['loginAttempt']) {
        if(!$_SESSION['match']) {
            echo '<script>alert("Invalid Email or Password. Please try again.");</script>';
            $_SESSION['loginAttempt'] = false;
        }
    }
?>

<main>
    <form action="validateMember.php" method="POST">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br>
        <input type="submit" value="login">
    </form>
</main>

<?php include(SHARED_PATH . '/footer.php'); ?>