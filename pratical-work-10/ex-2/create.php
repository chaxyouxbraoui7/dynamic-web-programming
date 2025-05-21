<?php

require 'db.php';

try {

    $statement = $db->prepare("INSERT INTO exercice (title, autor, creation_date) VALUES (?, ?, ?)");
    $statement->execute([$_POST['title'], $_POST['autor'], date('Y-m-d')]);
    
    header("Location: list.php?status=created&title=" . urlencode($_POST['title']));
    exit;

} catch (PDOException $e) {
    
    header("Location: list.php?status=error&message=" . urlencode("Creation failed!"));
    exit;

}

?>