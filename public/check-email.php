<?php
    header('Content-Type: application/json');
    include_once('../private/initialize.php');
    $email = h($_POST['email']);
    $result = memberEmailExists($conn, $email);
    echo json_encode($result);
?>