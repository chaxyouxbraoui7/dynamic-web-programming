<?php

require 'db_.php';

$attacker_id = $_GET['attacker'] ?? null;

if (!is_numeric($attacker_id)) {

    header("Location: arena.php?error=" . urlencode("Invalid ID"));
    exit;

}

$attacker_id = (int)$attacker_id;

$statement = $db->prepare("SELECT id FROM warriors WHERE id <> ? AND damage < 100 ORDER BY RAND() LIMIT 1");

$statement->execute([$attacker_id]);
$target = $statement->fetch();

if (!$target) {

    header("Location: arena.php?error=" . urlencode("No targets!"));
    exit;

}

$db->prepare("UPDATE warriors SET damage = damage + 5 WHERE id = ?")->execute([$target['id']]);

$statement = $db->prepare("SELECT name, damage FROM warriors WHERE id = ?");
$statement->execute([$target['id']]);
$target = $statement->fetch();

if ($target['damage'] >= 100) {

    $message = "KILLED " . htmlspecialchars($target['name']) . "!";

} else {

    $message = "Attacked " . htmlspecialchars($target['name']);
}

header("Location: arena.php?success=" . urlencode($message));
exit;

?>
