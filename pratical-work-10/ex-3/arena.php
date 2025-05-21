<?php

require 'db_.php';

$error = $_GET['error'] ?? '';
$success = $_GET['success'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Arena</title>

    <style>

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #0a101a;
            color: #dcedff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 4rem;
            color: #004ea7;
            font-weight: bolder;
            margin-bottom: 25px;
        }

        .container {
            width: 50%;
            height: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .messages {
            text-align: center;
            margin-bottom: 25px;
        }

        .error {
            color: red;
            font-size: 1.25rem;
        }

        .success {
            color: lightgreen;
            font-size: 1.25rem;
        }

        .neon-table {
            width: 100%;
            border-collapse: collapse;
            animation: glow 1.5s infinite alternate;
            box-shadow: 0 0 22px #58a6ff, 0 0 44px #1f6feb;
        }

        th {
            background: #16191d;
            color: #58a6ff;
            text-shadow: 0 0 5px #58a6ff;
            border: 1px solid white;
            padding: 15px;
            text-align: center;
        }

        td {
            background: #0a101a;
            border: 1px solid #16191d;
            border: 1px solid white;
            padding: 15px;
            text-align: center;
        }

        .dead {
            color: red;
            text-decoration: line-through;
        }

        a {
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            transition: color 0.5s ease;
        }

        .attack {
            color: whitesmoke;
            background: rgba(4, 0, 255, 0.82);
            padding: 5px 12px;
            border: none;
            border-radius: 1rem;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            margin: 4.5px;
            transition: all 0.25s ease;
            box-shadow: 0 0 11px rgb(54, 135, 255), 0 0 22px rgb(81, 151, 255);
            animation: glow 1.25s infinite alternate;
        }
        
        .attack:hover {
            transform: scale(1.1);
            background: rgba(0, 0, 200, 0.95);
        }
        
        .reject {
            color: black;
            background: #ff2222;
            padding: 5px 12px;
            border: none;
            border-radius: 1rem;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            margin: 4.5px;
        }
        
        .reject:hover {
            background: black;
            color: white;
            transform: scale(1.1);
        }

        p {
            margin-top: 50px;
        }

        .create {
            color: #58a6ff;
            font-size: 1.2rem;
            padding: 11px;
            border-radius: 7px;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .create:hover {
            background: #58a6ff;
            color: black;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 11px #58a6ff, 0 0 22px #58a6ff;
            }
            to {
                box-shadow: 0 0 22px #1f6feb, 0 0 33px #1f6feb;
            }
        }

    </style>

</head>
<body>

    <div class="container">

        <h1>The Combat Arena</h1>
        
        <div class="messages">
            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <p class="success"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>
        </div>
        
        <table class="neon-table">
            <tr>
                <th>ID</th><th>Warrior</th><th>Damage</th><th>Status</th><th>Actions</th>
            </tr>
    
            <?php
                $warriors = $db->query("SELECT * FROM warriors ORDER BY damage DESC");
                while ($warrior = $warriors->fetch()):
                    $isDead = ($warrior['damage'] >= 100);
                ?>
        
                <tr class="<?= $isDead ? 'dead' : '' ?>">
                    <td><?= $warrior['id'] ?></td>
                    <td><?= htmlspecialchars($warrior['name']) ?></td>
                    <td><?= $warrior['damage'] ?>%</td>
                    <td><?= $isDead ? 'DEAD' : 'ALIVE' ?></td>
                    <td><?php if (!$isDead): ?><a href="attack.php?attacker=<?= $warrior['id'] ?>" class="attack">ATTACK</a> | <?php endif; ?><a href="reject.php?warrior=<?= $warrior['id'] ?>" class="reject">Reject</a></td>
                </tr>
    
            <?php endwhile; ?>
    
        </table>
        
        <p><a href="_game.html" class="create">+ Create New Warrior</a></p>

    </div>

</body>
</html>