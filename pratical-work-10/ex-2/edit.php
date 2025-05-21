<!DOCTYPE html>
<html>
<head>
    <title>Edit Exercise</title>

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
        }
        form {
            background: rgb(33, 33, 33);
            padding: 45px;
            border-radius: 11px;
            width: 100%;
            max-width: 450px;
        }
        h1 {
            color: white;
            text-align: center;
            margin-top: 0;
        }
        input {
            width: 100%;
            padding: 15px;
            margin-bottom: 11px;
            border: 1px dashed blue;
            border-radius: 1px;
            background-color: #000000;
            color: white;
            font-size: 15px;
            box-sizing: border-box;
            resize: none;
        }
        input:focus {
            border-color: cyan;
            background-color: black;
            outline: none;
        }
        button {
            color: whitesmoke;
            font-weight: bolder;
            background-color: green;
            text-decoration: none;
            padding: 15px;
            border: none;
            border-radius: 1.5em;
            cursor: pointer;
            width: 25%;
            font-size: 15px;
            margin-top: 11px ;
        }
        a {
            color: whitesmoke;
            font-weight: bolder;
            background-color: red;
            text-decoration: none;
            padding: 11px;
            border: none;
            border-radius: 1.5em;
            cursor: pointer;
            text-align: center;
            font-size: 15px;
            margin-top: 11px ;
        }
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .a-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>

</head>
<body>

    
    <?php

        require 'db.php';

        $id = $_GET['id'];
        $statement = $db->prepare("SELECT * FROM exercice WHERE id = ?");
        $statement->execute([$id]);
        $row = $statement->fetch();
        ?>

    <form action="update.php" method="POST">

        <h1>Edit Your Exercises</h1>
    
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
        <input type="text" name="autor" value="<?= htmlspecialchars($row['autor']) ?>" required>

        <div class="button-container">
            <button type="submit">Save</button>
        </div>

        <div class="a-container">
            <a class="cancel" href="list.php">Cancel</a>
        </div>

    </form>


</body>
</html>