<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=coffee-club", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

//database functions

function getMember(PDO $conn, int $id) {
    $sql = $conn->prepare("SELECT memberID, first_name, last_name, email FROM members WHERE memberID = :id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    return $sql->fetch();
}

?> 