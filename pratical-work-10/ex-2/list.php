<?php

$status = $_GET['status'] ?? '';
$mssg = '';
$alert = '';

switch ($status) {

    case 'created':
        $mssg = "Successfully created: " . htmlspecialchars($_GET['title'] ?? '');
        $alert = 'success';
        break;

    case 'updated':
        $mssg = "Successfully updated #" . intval($_GET['id'] ?? '');
        $alert = 'success';
        break;

    case 'deleted':
        $mssg = "Successfully deleted #" . intval($_GET['id'] ?? '');
        $alert = 'warning';
        break;

    case 'error':
        $mssg = "Error: " . htmlspecialchars($_GET['mssg'] ?? 'Unknown error');
        $alert = 'error';
        break;
    
    default:
        break;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exercise List</title>
    <style>

        body {
            font-family: sans-serif;
            background-color: #161616;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 1100px;
            margin: 0;
            padding: 0;
            overflow: hidden;
            color: white;
        }
        h1 {
            color: white;
            text-align: center;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border-top: 1px solid white;;
            border-right: 1px solid white;;
            border-left: 1px solid white;;
            border-bottom: 1px solid white;;
        }
        th {
            background-color: darkblue;
            color: wheat;
        }
        a {
            text-decoration: none;
            
        }
        .a-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 25px;
            text-decoration: none;
        }

        .a-edit {
            text-decoration: none;
            color: lightgreen;
        }
        .a-delete {
            text-decoration: none;
            color: red;
        }
        .a-more {
            margin-top: 11px;
            color: wheat;
            background: darkblue;
            border: 1px solid wheat;
            width: 45%;
            border-radius: 2.5em;
            font-weight: bolder;
            padding: 7px;
            text-align: center;
        }
        .alert {
            padding: 15px; 
            margin: 11px;
            border-radius: 5px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .alert.success {
            background-color: green;
            color: white;
        }
        .alert.warning {
            background-color: orange;
            color: white;
        }
        .alert.error {
            background-color: red;
            color: white;
        }

    </style>

</head>
<body>

    <div>

        <h1>Exercise List</h1>

        <?php if ($mssg): ?>

            <div class="alert <?= htmlspecialchars($alert) ?>">
                <?= htmlspecialchars($mssg) ?>
            </div>

        <?php endif; ?>
        
            <table>
        
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
        
                <?php

                    require 'db.php';
                    $statement = $db->query("SELECT * FROM exercice");
                    while ($row = $statement->fetch()):
            
                ?>

                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['autor']) ?></td>
                    <td><?= $row['creation_date'] ?></td>
        
                    <td>
                        <a class="a-edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a> | <a class="a-delete" href="delete.php?id=<?= $row['id'] ?>" 
                        onclick="return confirm('You sure want to delete?')">Delete</a>
                    </td>
        
                </tr>
        
                    <?php endwhile; ?>
        
            </table>
        
        <div class="a-container">
            <a class="a-more" href="crud.html">Add More Exercises</a>
        </div>

    </div>

</body>
</html>