<?php

require 'db_.php';

try {

    $name = $_POST['name'];
    
    $statement = $db->prepare("SELECT name FROM warriors WHERE name = ?");
    $statement->execute([$name]);
    
    if ($statement->fetch()) {
        header("Location: arena.php?error=" . urlencode("Name already exists!"));
        exit;

    }
    
    $statement = $db->prepare("INSERT INTO warriors (name) VALUES (?)");
    $statement->execute([$name]);
    
    header("Location: arena.php?success=" . urlencode("Warrior created successfully!"));
    
} catch (PDOException $e) {
    header("Location: arena.php?error=" . urlencode($e->getMessage()));
    exit;
}

?>