<?php

include_once('initialize.php');

if(isset($_POST["email"])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = 'www.jdavenportoti.com/web250/coffee-club/public/members/create-new-password.php?selector=';
    $url .= $selector . '&validator=' . bin2hex($token);

    $expires = date("U") + 900;

    $userEmail = $_POST["email"];

    $sql = $conn->prepare('DELETE FROM pwd_reset WHERE reset_email=:email');
    $sql->bindParam(':email', $userEmail);

    try {
        $sql->execute();
    } catch(PDOException $e) {
        header('Location: ' . url_for('errors/500-error.php'));
    }

    $hashedToken = password_hash($token, PASSWORD_DEFAULT);

    $sql = $conn->prepare(
        'INSERT INTO pwd_reset (reset_email, reset_selector, reset_token, reset_expires) 
        VALUES (:email, :selector, :token, :expires);'
    );
    $sql->bindParam(':email', $userEmail);
    $sql->bindParam(':selector', $selector);
    $sql->bindParam(':token', $hashedToken);
    $sql->bindParam(':expires', $expires);

    try {
        $sql->execute();
    } catch(PDOException $e) {
        header('Location: ' . url_for('errors/500-error.php'));
    }

    //destroy database connection
    $conn = null;
    $sql = null;

    $to = $userEmail;
    $subject = 'Reset your password for Coffee Club';

    $message = '<p>We recieved your password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
    $message .= '<p>Reset your password: <br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: Coffee Club <cc.accounts250@gmail.com>\r\n";
    $headers .= "Reply-To: cc.accounts250@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../public/reset-password.php?reset=success");

} else {
    header("Location: ../index.php");
}
