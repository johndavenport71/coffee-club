<?php

include_once('../private/initialize.php');

$page_title = 'Reset Password - Coffee Club'; 

include(SHARED_PATH . '/header.php');

?>

<main role="main" class="sign-up">
    <?php 
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($selector) || empty($validator)) {
            echo 'Unable to validate request.';
        } else {
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>

                <form action="../../private/reset-password.php" method="post">
                    <input type="hidden" name="selector" value="<?= $selector; ?>">
                    <input type="hidden" name="validator" value="<?= $validator; ?>">
                    <label for="pwd">New Password:</label>
                    <input type="password" name="pwd" id="pwd"><br>
                    <label for="pwd-repeat">Confirm New Password:</label>
                    <input type="password" name="pwd-repeat" id="pwd-repeat"><br>
                    <input type="submit" value="Reset Password">
                </form>

                <?php
            }
        }

    ?>
</main>

<?php

include(SHARED_PATH . '/footer.php');

?> 
