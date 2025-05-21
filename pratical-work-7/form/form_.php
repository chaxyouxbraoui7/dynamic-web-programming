<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Affichage | HTML dans PHP</title>
</head>

<body>

    <hr>

    <?php

        if ($_GET) {

            // echo "<pre>"; print_r($_GET); echo "</pre>";

            echo "<h1>Bonjour " . $_GET['title'] . " " . $_GET['nom'] . " " . $_GET['prenom'] . "!</h1><br>";
            echo "<p>Votre email est : " . $_GET['email'] . "</p><br>";
            echo "<p>Votre mot de passe est : " . $_GET['psswrd'] . "</p><br>";
            echo "<p>Vous aimez les chats : " . $_GET['cats'] . "</p><br>";

            $birthDate = $_GET['date_nss'];
            $birthYear = date('Y', strtotime($birthDate));
            echo "<p>Votre année de naissance est : <a href='https://fr.wikipedia.org/wiki/$birthYear' target='_blank'>$birthYear</a></p><br>";

            if (isset($_GET['conditions'])) {
                echo "<p>Merci d'accepter les conditions!</p>";
            }
        }
    ?>

    <hr>

</body>

</html>