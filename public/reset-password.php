<?php

include_once('../private/initialize.php');

$page_title = 'Reset Password - Coffee Club'; 

include(SHARED_PATH . '/header.php');

?>

<main role="main" class="sign-up">
    <h2>Reset your password</h2>
    <p>An email will be sent to you with instructions on setting a new password.</p>
    <form action="../private/reset-request.php" method="post">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email"><i class="material-icons icon"></i>
        <input type="submit" value="Receive new password">
    </form>
    <?php
        if(isset($_GET["reset"])) {
            if($_GET["reset"] == "success") {
                echo '<p>Check your email for a link to reset your password.</p>';
            }
        }
    ?>
</main>

<?php

include(SHARED_PATH . '/footer.php');

?> 
