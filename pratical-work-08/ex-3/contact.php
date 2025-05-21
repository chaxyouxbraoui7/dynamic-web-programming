<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | PHP</title>

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
        h2 {
            color: white;
            text-align: center;
            margin-top: 0;
        }
        .result-container {
            background: rgb(41, 41, 41);
            padding: 45px;
            border: 2.5px dashed whitesmoke;
            border-radius: 7px;
            width: 75%;
            max-width: 450px;
        }
        .data-item {
            margin-top: 11px;
            margin-bottom: 11px;
            color: white;
            font-size: medium;
        }
        .data-label {
            color: purple;
            font-weight: bold;
            font-size: large;
        }
        .back-button {
            background-color: purple;
            color: white;
            padding: 15px;
            border: 2.5px dashed whitesmoke;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: solid;
            display: inline-block;
            margin-top: 11px;
        }
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>

</head>
<body>

    <div class="result-container">

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $name = htmlspecialchars($_GET['name'] ?? '');
            $email = htmlspecialchars($_GET['email'] ?? '');
            $message = htmlspecialchars($_GET['message'] ?? '');

            echo '<h2>Thank You For Contacting Us, ' . $name . '!</h2>';
            echo '<div class="data-item"><span class="data-label">Your email:</span> ' . $email . '</div>';
            echo '<div class="data-item"><span class="data-label">Your message:</span> ' . nl2br($message) . '</div>';
            echo '<div class="button-container">';
            echo '<a href="contact.html" class="back-button">Send Another Message</a>';
            echo '</div>';
        }

        ?>

    </div>

</body>
</html>