<?php 
    require_once('../private/initialize.php'); 
    $page_title = 'Member Sign Up - Coffee Club'; 
    include(SHARED_PATH . '/header.php'); 

    $fname = '';
    $lname = '';
    $email = '';
?>

<main class="sign-up new">
    <h2>New Member Sign Up</h2>
    <form action="register-member.php" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><i class="material-icons icon"></i>
        <br>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><i class="material-icons icon"></i>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><i class="material-icons icon"></i>
        <br>

        <label for="phone">Phone: xxx-xxx-xxxx</label>
        <input type="tel" id="phone" name="phone" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"><i class="material-icons icon"></i>
        <br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><i class="material-icons icon"></i>
        <br>

        <input type="submit" value="Register">
    </form>

</main>

<?php include(SHARED_PATH . '/footer.php');