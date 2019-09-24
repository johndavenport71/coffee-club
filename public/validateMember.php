<?php
    include('../private/initialize.php');

    $_SESSION['match'] = false;
    $_SESSION['loginAttempt'] = true;
    $email = h($_POST['email']);
    $pass = h($_POST['pass']);

    $sql = "SELECT email, pass_hash FROM members";
    $results = $conn->query($sql);

    while($row = $results->fetch()) {
        if($row['email'] == $email) {
            if(password_verify($pass, $row['pass_hash'])) {
                $_SESSION['match'] = true;
                $_SESSION['loggedIn'] = true;
                break;
            }           
        }
    }
    
    if($_SESSION['match']) {
        header('Location: ' .  url_for('/members/index.php'));
    } else {
        header('Location: ' . url_for('/login.php'));
    }

?>