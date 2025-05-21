<?php

require 'db.php';

try {
    
    $id = $_GET['id'];
    $statement = $db->prepare("DELETE FROM exercice WHERE id = ?");
    $statement->execute([$id]);
    
    header("Location: list.php?status=deleted&id=" . $id);
    exit;

} catch (PDOException $e) {
    
    header("Location: list.php?status=error&message=" . urlencode("Delete failed!"));
    exit;
}

?>