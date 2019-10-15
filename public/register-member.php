<?php
    include('../private/initialize.php');

    $fname = h($_POST['fname']);
    $lname = h($_POST['lname']);
    $email = h($_POST['email']);
    $phone = h($_POST['phone']);
    $pass = h($_POST['pass']);
    $salt = random_bytes(32);
    $newPass = $salt . $pass;
    $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

    addMember($conn, $fname, $lname, $email, $phone, $hashedPass, $salt);
    header('Location: ' . url_for('/members/index.php'));
?>