<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Submission</title>
    
    <style>

        body {
            font-family:Helvetica;
            line-height: 1.5;
            max-width: 850px;
            margin: 0 auto;
            padding: 0;
            background-color: rgb(33, 33, 33);
            color: white;
        }
        .profile-show {
            background: rgb(36, 36, 36);
            padding: 30px;
            border-radius: 7px;
        }
        h1 {
            color: whitesmoke;
            text-align: center;
            margin-bottom: 33px;
        }
        h2 {
            color: whitesmoke;
            text-align: center;
            margin-bottom: 33px;
        }
        .info_ {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 0.25px solid;
        }
        .info-label {
            font-weight: 500;
            color: whitesmoke;
            display: inline-block;
            width: 25%;
        }
        .success {
            color: lightgreen;
        }
        .error {
            color: red;
        }
        .favorite-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }
        .favorite-link {
            color: blue;
            text-decoration: none;
            font-weight: 500;
        }
        .favorite-link:hover {
            text-decoration: solid;
        }
        small {
            color: gray;
            font-size: 0.75em;
        }
        .raw-data {
            background: rgb(39, 39, 39);
            margin-top: 45px;
            padding: 0;
            border-radius: 2.5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border-top: 1px solid whitesmoke;
            border-right: 1px solid whitesmoke;
            border-left: 1px solid whitesmoke;
            border-bottom: 1px solid whitesmoke;
        }
        th {
            background-color: darkblue;
            color: white;
        }

    </style>

</head>

<body>

    <div class="profile-show">
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

            <h1>Profile Created Successfully!</h1>
            
            <h2>Welcome, <?= htmlspecialchars($_POST['title'] ?? '') ?> 
                <?= htmlspecialchars($_POST['first_name'] ?? '') ?> 
                <?= htmlspecialchars($_POST['last_name'] ?? '') ?>!
            </h2>
            
            <div class="info_">
                <span class="info-label">Gender :</span>
                <?= htmlspecialchars($_POST['gender'] ?? 'Not specified') ?>
            </div>
            
            <div class="info_">
                <span class="info-label">Birth Date :</span>
                <?= htmlspecialchars($_POST['birth_date'] ?? 'Not specified') ?>
                <?php if (!empty($_POST['birth_date'])): ?>
                    (You are: <?= date_diff(date_create($_POST['birth_date']), date_create('today'))->y ?> years old!)
                <?php endif; ?>
            </div>
            
            <div class="info_">
                <span class="info-label">Email:</span>
                <?php
                $email = $_POST['email'] ?? '';
                $valid = !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
                echo $valid ? htmlspecialchars($email) : 'Invalid email';
                ?>
            </div>
            
            <?php if (!empty($_POST['fav_animal'])): ?>
                <div class="info_">
                    <span class="info-label">Favorite Animal:</span>
                    <span class="favorite-item">
                        <a href="https://animaldiversity.org/search/?q=<?= urlencode(htmlspecialchars($_POST['fav_animal'])) ?>" 
                           target="_blank" class="favorite-link">
                            <?= htmlspecialchars($_POST['fav_animal']) ?>
                        </a>
                        <small>(Animal Diversity Database)</small>
                    </span>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($_POST['fav_anime'])): ?>
                <div class="info_">
                    <span class="info-label">Favorite Anime:</span>
                    <span class="favorite-item">
                        <a href="https://myanimelist.net/search/all?q=<?= urlencode(htmlspecialchars($_POST['fav_anime'])) ?>" 
                           target="_blank" class="favorite-link">
                            <?= htmlspecialchars($_POST['fav_anime']) ?>
                        </a>
                        <small>(MyAnimeList)</small>
                    </span>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($_POST['fav_youtuber'])): ?>
                <div class="info_">
                    <span class="info-label">Favorite YouTuber:</span>
                    <span class="favorite-item">
                        <a href="https://www.youtube.com/results?search_query=<?= urlencode(htmlspecialchars($_POST['fav_youtuber'])) ?>"
                           target="_blank" class="favorite-link">
                            <?= htmlspecialchars($_POST['fav_youtuber']) ?>
                        </a>
                        <small>(YouTube Search)</small>
                    </span>
                </div>
            <?php endif; ?>
            
            <div class="info_">
                <span class="info-label">Terms are </span>
                <?= isset($_POST['terms']) ? '<span class="success">accepted</span>' : '<span class="error">not accepted</span>' ?>
            </div>
            
            <div class="raw-data">

                <!-- echo method -->

                <h2>Your raw data in a table</h2>

                <?php
                    echo "<table>";

                    echo "<tr><th>Field</th><th>Data value</th></tr>";
                    echo "<tr><td>Title</td><td>" . htmlspecialchars($_POST['title'] ?? '') . "</td></tr>";
                    echo "<tr><td>First Name</td><td>" . htmlspecialchars($_POST['frst_name'] ?? '') . "</td></tr>";
                    echo "<tr><td>Last Name</td><td>" . htmlspecialchars($_POST['lst_name'] ?? '') . "</td></tr>";
                    echo "<tr><td>Gender</td><td>" . htmlspecialchars($_POST['gender'] ?? '') . "</td></tr>";
                    echo "<tr><td>Birth Date</td><td>" . htmlspecialchars($_POST['birth_date'] ?? '') . "</td></tr>";
                    echo "<tr><td>Email</td><td>" . htmlspecialchars($_POST['email'] ?? '') . "</td></tr>";
                    echo "<tr><td>Password</td><td>can't show that :)</td></tr>";
                    echo "<tr><td>Favorite Animal</td><td>" . htmlspecialchars($_POST['fav_animal'] ?? 'None') . "</td></tr>";
                    echo "<tr><td>Favorite Anime</td><td>" . htmlspecialchars($_POST['fav_anime'] ?? 'None') . "</td></tr>";
                    echo "<tr><td>Favorite YouTuber</td><td>" . htmlspecialchars($_POST['fav_youtuber'] ?? 'None') . "</td></tr>";
                    echo "<tr><td>Terms Accepted</td><td>" . (isset($_POST['terms']) ? "Yes" : "No") . "</td></tr>";

                    echo "</table>";
                ?>
            </div>

        <?php endif; ?>
    </div>
</body>
</html>