<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook | Show Message</title>

    <style>

        body {
            font-family: sans-serif;
            background-color: black;
            color: white;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            width: 100%;
            padding: 25px;
        }
        h1 {
            text-align: center;
            color: cyan;
        }
        p {
            text-align: center;
            font-family: monospace;
            font-weight: bold;
        }
        .message {
            background: rgb(15, 15, 15);
            padding: 25px;
            margin-bottom: 11px;
            border-radius: 2.5px;
            border-left: 5px solid cyan;
        }
        .message strong {
            color: cyan;
        }
        .message small {
            color: lightcyan;
            display: block;
            margin-top: 5px;
        }
        .link {
            display: block;
            text-align: center;
            margin-top: 33px;
        }
        .link a {
            color: cyan;
            text-decoration: solid;
            font-size: 15px;
            border: 1px dashed cyan;
            padding: 5px 5px;
            border-radius: 2.5px;
        }

    </style>

</head>
<body>

    <div class="container">
        <h1>Guestbook Message (in .md style)</h1>
        
        <?php

        if (file_exists('mssg.txt')) {

            $messages = file('mssg.txt', FILE_IGNORE_NEW_LINES);
            if (empty($messages)) {
                echo '<p>No messages yet.</p>';
            } else {
                foreach (array_reverse($messages) as $msg) {
                    list($name, $message, $date) = explode(' | ', $msg);
                    echo '<div class="message">';
                    echo '<strong>' . htmlspecialchars($name) . '</strong><br>';
                    echo nl2br(htmlspecialchars($message));
                    echo '<small>' . htmlspecialchars($date) . '</small>';
                    echo '</div>';
                }
            }
        } else {

            echo '<p>No messages yet.</p>';
        }

        ?>
        
        <div class="link">
            <a href="guestbook.html">Post A New Message</a>
        </div>

    </div>

</body>
</html>