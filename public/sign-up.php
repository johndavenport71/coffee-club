<?php 
    require_once('../private/initialize.php'); 
    $page_title = 'Member Sign Up - Coffee Club'; 
    include(SHARED_PATH . '/header.php'); 
?>

<main class="sign-up">
    <h2>New Member Sign Up</h2>
    <form action="" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Register">
    </form>

</main>

<?php include(SHARED_PATH . '/footer.php');