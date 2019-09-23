<?php
    include('../private/initialize.php');

    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO members (first_name, last_name, email, pass_hash)
        VALUES ('".$fname."', '".$lname."', '".$email."', '".$hashedPass."');";

    $prepped = $conn->prepare($sql);
    try {
        $prepped->execute();
    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    header('Location: ' . url_for('/members/index.php'));
?>