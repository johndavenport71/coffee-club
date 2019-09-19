<?php
    include('../private/initialize.php');

    $_SESSION['match'] = false;
    $_SESSION['loginAttempt'] = true;
    $email = htmlspecialchars($_POST['email']);

    $members = [
        ['id' => '1', 'firstName' => 'Sarah', 'lastName' => 'Perkins', 'email' => 'sarahn@email.com'],
        ['id' => '2', 'firstName' => 'Bill', 'lastName' => 'Perkins', 'email' => 'billn@email.com'],
        ['id' => '3', 'firstName' => 'Daphne', 'lastName' => 'Cooper', 'email' => 'daphnec@email.com'],
        ['id' => '4', 'firstName' => 'Sean', 'lastName' => 'Bean', 'email' => 'boromir@email.com'],
        ['id' => '5', 'firstName' => 'Francis', 'lastName' => 'Moore', 'email' => 'francism@email.com']
    ];

    foreach($members as $member) {
        if($member['email'] == $email) {
           $_SESSION['match'] = true;
           $_SESSION['loggedIn'] = true;
        } 
    }

    if($_SESSION['match']) {
        header('Location: ' .  url_for('/members/index.php'));
    } else {
        header('Location: ' . url_for('/login.php'));
    }

?>