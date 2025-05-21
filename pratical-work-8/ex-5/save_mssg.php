<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    
    if (empty($name) || empty($message)) {

        header("Location: guestbook.php?error=404=no_message_or_no_name");

        exit();
    }
    
    $entry = htmlspecialchars($name) . ' | ' . htmlspecialchars($message) . ' | ' . date('Y-m-d H:i:s') . PHP_EOL;
    
    file_put_contents('mssg.txt', $entry, FILE_APPEND);
}

header("Location: guestbook.php");

?>