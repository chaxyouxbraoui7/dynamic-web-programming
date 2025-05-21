<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $valid_username = "Ayoub";
    $valid_password = "ayoubx7";

    if (isset($_POST['username']) && isset($_POST['password'])) {

        if ($_POST['username'] === $valid_username && $_POST['password'] === $valid_password) {

            $_SESSION['username'] = $valid_username;
            header("Location: welcome.php");
            exit();

        } else {

            header("Location: login.html?error=404=invalid_username_or_password");
            exit();
        }
    } else {
        
        header("Location: login.html?error=404=missing_username_or_password");
        exit();
    }

}
?>