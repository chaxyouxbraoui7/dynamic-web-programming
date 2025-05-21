<?php

require 'db_.php';

try {
    
    $warrior_id = $_GET['warrior'] ?? null;

    if (!$warrior_id) {
        header("Location: arena.php?error=" . urlencode("Invalid ID!"));
        exit;

    }
    
    $statement = $db->prepare("DELETE FROM warriors WHERE id = ?");
    $statement->execute([$warrior_id]);
    
    header("Location: arena.php?success=" . urlencode("Warrior rejected successfully!"));

} catch (PDOException $e) {
    
    header("Location: arena.php?error=" . urlencode($e->getMessage()));
    exit;
    
}

?>