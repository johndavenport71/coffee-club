<?php
    include_once('../private/initialize.php');
    $email = h($_POST['email']);
    print(memberEmailExists($conn, $email));
?>