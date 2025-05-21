<!DOCTYPE html>
<head>
    <title>Password Generator | PHP</title>

    <style>

        .password-result {
            margin-top: 25px;
            padding: 15px;
            color: darkgreen;
            font-family: sans-serif;
            font-size: 25px;
            word-break: break-all;
        }
    
    </style>
    
</head>

<body>

    <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $length = isset($_POST['length']) ? (int)$_POST['length'] : 8;
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $psswrd = '';

            if (isset($_POST['symbols'])) {
                $chars .= '!@#$%&*_-=+.?';
            }
            
            for ($i = 0; $i < $length; $i++) {
                $psswrd .= $chars[rand(0, strlen($chars) - 1)];
            }

            echo '<hr>';
            echo '<center>';
            echo '<h1>Your random password</h1>';
            echo '<div class="password-result">' . htmlspecialchars($psswrd) . '</div>';
            echo '</center>';
            echo '<hr>';
            
        }

        ?>

</body>

</html>

