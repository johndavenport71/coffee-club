<?php
    include('../private/initialize.php');

    if(is_post_request()) {

        $fname = h($_POST['fname']) ?? '';
        $lname = h($_POST['lname']) ?? '';
        $email = h($_POST['email']) ?? '';
        $phone = h($_POST['phone']) ?? '';
        //remove any dashes from the phone number
        $phone = str_replace('-', '', $phone);

        $captcha = $_POST['g-recaptcha-response'] ?? '';
        if(!$captcha){
            $url = url_for('/sign-up.php');
            $url .= '?fname=' . $fname;
            $url .= '&lname=' . $lname;
            $url .= '&email=' . $email;
            $url .= '&phone=' . $phone;
            header('Location: ' . $url );
        }
        // $secretKey = "6Le2xsIUAAAAABRnUylzN_X15UwAs1Fe6jogV_rx";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode(SECRET_KEY) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        
        // Captcha Success
        if($responseKeys["success"]) {
            
            $pass = h($_POST['pass']) ?? '';
            $salt = bin2hex(random_bytes(32));
            $newPass = $salt . $pass;
            $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
        
            addMember($conn, $fname, $lname, $email, $phone, $hashedPass, $salt);
            header('Location: ' . url_for('/members/index.php'));
        } else {
            $url = url_for('/sign-up.php');
            $url .= '?fname=' . $fname;
            $url .= '&lname=' . $lname;
            $url .= '&email=' . $email;
            $url .= '&phone=' . $phone;
            $url .= '&error=captcha failed please try again';
            header('Location: ' . $url );
        }
        
    } else {
        header('Location: ' . url_for('/login.php'));
    }
   
?>