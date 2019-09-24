<?php
    include('../private/initialize.php');

    $fname = h($_POST['fname']);
    $lname = h($_POST['lname']);
    $email = h($_POST['email']);
    $pass = h($_POST['pass']);
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $sql = $conn->prepare("INSERT INTO members (first_name, last_name, email, pass_hash)
        VALUES (:fname, :lname, :email, :pass_hash);");
    $sql->bindParam(':fname', $fname);
    $sql->bindParam(':lname', $lname);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':pass_hash', $hashedPass);
    try {
        $sql->execute();
    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    header('Location: ' . url_for('/members/index.php'));
?>