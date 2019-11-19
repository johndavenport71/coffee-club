<?php 
    require_once('../private/initialize.php'); 
    $page_title = 'Member Sign Up - Coffee Club'; 
    include(SHARED_PATH . '/header.php'); 

    $fname = $_GET['fname'] ?? '';
    $lname = $_GET['lname'] ?? '';
    $email = $_GET['email'] ?? '';
    $phone = $_GET['phone'] ?? '';
    $error = $_GET['error'] ?? '';
?>

<script type="text/javascript">
    function getResponse() {
        console.log('message?')
    }
</script>

<main class="sign-up new" role="main">
    <h2>New Member Sign Up</h2>
    <form action="register-member.php" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="<?= $fname; ?>" required><i class="material-icons icon"></i>
        <br>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="<?= $lname; ?>" required><i class="material-icons icon"></i>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $email; ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><i class="material-icons icon"></i>
        <br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?= $phone; ?>" onchange="this.value=phoneMask(this.value);" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"><i class="material-icons icon"></i>
        <br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"><i class="material-icons icon"></i>
        <br>
        <p class="tip">Your password should be at least 8 characters long and contain and least one of each of the following: Uppercase letter, Lowercase letter, Number, Symbol</p>
        
        <div class="g-recaptcha" data-sitekey="<?= SITE_KEY; ?>"></div>
        <?php if($error) {echo $error . '<br>';} ?>
        <input type="submit" value="Register">
    </form>

</main>

<?php include(SHARED_PATH . '/footer.php');