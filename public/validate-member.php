<?php
    include('../private/initialize.php');

    $_SESSION['match'] = false;
    $_SESSION['loginAttempt'] = true;
    $email = h($_POST['email']);
    $pass = h($_POST['pass']);

    $results = getMemberByEmail($conn, $email);
    $checkMe = $results['pass_salt'] . $pass;
    if(password_verify($checkMe, $results['pass_hash'])) {
        $_SESSION['member_level'] = $results['member_level'] ?? 'm';
        $_SESSION['user'] = $results['first_name'] ?? '';
        $_SESSION['match'] = true;
        $_SESSION['loggedIn'] = true;
    }           
    
    if($_SESSION['match']) {
        header('Location: ' .  url_for('/members/index.php'));
    } else {
        header('Location: ' . url_for('/login.php'));
    }

?>