<?php
session_start();

if ($_SESSION['connect'] !== 'ok') {

    header('Location: login_.html?error=3=404=unauthorized+access');
    exit;
}

if (isset($_GET['doit']) && $_GET['doit'] === 'logout') {

    session_destroy();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>

    <style>

        body {
            font-family: sans-serif;
            background-color: #161616;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            overflow: hidden;
        }
        .container {
            text-align: center;
            max-width: 500px;
            width: 100%;
            padding: 25px;
        }
        h1 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            word-wrap: break-word;
        }
        hr {
            border: 0;
            height: 1px;
            background: white;
            margin: 25px 0;
            width: 100%;
        }
        a {
            background-color: red;
            color: whitesmoke;
            font-weight: bolder;
            padding: 15px;
            border: none;
            border-radius: 3em;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 22px;
            display: inline-block;
        }
        a:hover {
            background-color: #cc0000;
            transition: background-color 0.25s ease;
        }
        .a-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 25px;
        }

    </style>

</head>
<body>

    
    <div class="container">
        
        <hr>

        <h1>Hello and Welcome <?= htmlspecialchars($_SESSION['login'] ?? '') ?></h1>

        <div class="a-container">
            <a href="?doit=logout">Logout</a>
        </div>
        
        <hr>
        
    </div>


</body>
</html>