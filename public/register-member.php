<?php
    include('../private/initialize.php');

    $fname = h($_POST['fname']);
    $lname = h($_POST['lname']);
    $email = h($_POST['email']);
    $pass = h($_POST['pass']);
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    addMember($conn, $fname, $lname, $email, $hashedPass);
    header('Location: ' . url_for('/members/index.php'));
?>