<?php
    require_once('../private/initialize.php');

    session_unset();
    session_destroy();

    header('Location: ' . url_for('/index.php'));
?>