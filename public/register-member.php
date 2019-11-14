<?php
    include('../private/initialize.php');

    if(is_post_request()) {

        $captcha = $_POST['g-recaptcha-response'] ?? '';
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6Le2xsIUAAAAABRnUylzN_X15UwAs1Fe6jogV_rx";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        
        // should return JSON with success as true
        if($responseKeys["success"]) {
            $fname = h($_POST['fname']) ?? '';
            $lname = h($_POST['lname']) ?? '';
            $email = h($_POST['email']) ?? '';
            $phone = h($_POST['phone']) ?? '';
            //remove any dashes from the phone number
            $phone = str_replace('-', '', $phone);
            $pass = h($_POST['pass']) ?? '';
            $salt = bin2hex(random_bytes(32));
            $newPass = $salt . $pass;
            $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
        
            addMember($conn, $fname, $lname, $email, $phone, $hashedPass, $salt);
            header('Location: ' . url_for('/members/login.php'));
        } else {
            header('Location: ' . url_for('/sign-up.php'));
        }
        
    } else {
        header('Location: ' . url_for('/login.php'));
    }
   
?>