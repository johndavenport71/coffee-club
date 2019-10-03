<?php
    header('Content-Type: application/json');
    include_once('../private/initialize.php');
    //$email = h($_POST['email']);
    // $result = memberEmailExists($conn, $email);
    // $send = ['result' => $result];

    $members = getMembers($conn);
    $arrEmails = [];
    while($row = $members->fetch()){
        $arrEmails[] = $row['email'];
    }
    echo json_encode($arrEmails);
?>