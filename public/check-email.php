<?php
    header('Content-Type: application/json');
    include_once('../private/initialize.php');
    
    $members = getMembers($conn);
    $arrEmails = [];
    while($row = $members->fetch()){
        $arrEmails[] = $row['email'];
    }
    echo json_encode($arrEmails);
?>