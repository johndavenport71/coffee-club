<?php

include('initialize.php');

if(isset($_POST["password-reset-request"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if($password != $passwordRepeat || empty($password)) {
        $params = 'match=false&selector=' . $selector . '&validator=' . $validator; 
        header("Location: " . url_for('members/create-new-password.php?' . $params));
    }  

    $currentDate = date("U");

    $sql = $conn->prepare("SELECT * FROM pwd_reset WHERE reset_selector=:selector AND reset_expires >= :date");
    $sql->bindParam(':selector', $selector);
    $sql->bindParam(':date', $currentDate);

    try {
        $sql->execute();
        $result = $sql->fetch();
    } catch(PDOException $e) {
        header('Location: ' . url_for('errors/500-error.php'));
        die();
    }

    $tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($tokenBin, $result["reset_token"]);

    if($tokenCheck === false) {
        echo 'Could not validate your request. Please try again.';
        die();
    } elseif ($tokenCheck === true) {
        $userEmail = $result["reset_email"];
        $sql = $conn->prepare("SELECT * FROM members WHERE email = :email;");
        $sql->bindParam(':email', $userEmail);

        try {
            $sql->execute();
            $member = $sql->fetch();
        } catch(PDOException $e) {
            header('Location: ' . url_for('errors/500-error.php'));
            die();
        }

        $salt = bin2hex(random_bytes(32));
        $newPass = $salt . $password;
        $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

        $sql = $conn->prepare("UPDATE members SET pass_hash=:newPass, pass_salt=:salt WHERE email=:email");
        $sql->bindParam(':newPass', $hashedPass);
        $sql->bindParam(':salt', $salt);
        $sql->bindParam(':email', $member['email']);
        try {
            $sql->execute();
          } catch(PDOException $e) {
            header('Location: ' . url_for('errors/500-error.php'));
            die();
        }

        $sql = $conn->prepare("DELETE FROM pwd_reset WHERE reset_email=:email");
        $sql->bindParam(':email', $userEmail);
        try {
            $sql->execute();
          } catch(PDOException $e) {
            header('Location: ' . url_for('errors/500-error.php'));
            die();
        }
        header("Location: " . url_for('/login.php?pwd=reset'));
    }
    
} else {
    header("Location: " . url_for('index.php'));
}

