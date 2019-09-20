<?php
    include('../private/initialize.php');

    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    echo sizeof($members);

    array_push($members, array(
        'id' => sizeof($members),
        'firstName' => $fname,
        'lastName' => $lname,
        'email' => $email,
        'hash' => password_hash($pass, PASSWORD_DEFAULT)
    ));


    header('Location: ' . url_for('/members/index.php'));
?>