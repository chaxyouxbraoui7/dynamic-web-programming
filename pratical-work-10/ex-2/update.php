<?php

require 'db.php';

try {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $autor = $_POST['autor'];
    
    $statement = $db->prepare("UPDATE exercice SET title=?, autor=? WHERE id=?");
    $statement->execute([$title, $autor, $id]);
    
    header("Location: list.php?status=updated&id=" . $_POST['id']);
    exit;

} catch (PDOException $e) {
    
    header("Location: list.php?status=error&message=" . urlencode("Update failed!"));
    exit;

}

?>