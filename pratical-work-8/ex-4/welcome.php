<?php
session_start();

if (!isset($_SESSION['username'])) {

    header("Location: login.html");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>

    <style>

        body {
            font-family: sans-serif;
            background-color: #161616;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: white;
        }
        .container {
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        h1 {
            color: white;
            margin-bottom: 30px;
        }
        hr {
            width: 100%;
            border: 1px dashed #444;
            margin: 20px 0;
        }
        .logout-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            border-radius: 1.5rem;
            padding: 15px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
            display: inline-block;
            margin-top: 11px;
        }

    </style>

</head>
<body>

    <div class="container">

        <hr>

            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <a href="logout.php" class="logout-btn">Logout</a>

        <hr>

    </div>

</body>
</html>