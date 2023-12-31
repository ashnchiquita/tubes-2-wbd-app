<!DOCTYPE html>

<?php
    require_once __DIR__ . '/../imports/pageSetup.php';

    require_once __DIR__ . '/../templates/navbar.php';
    require_once __DIR__ . '/../templates/card.php';
    require_once __DIR__ . '/../templates/pagination.php';


?>

<head>
    <title>Cooklyst!</title>
    <?php pageSetup("Playlist page containing recipe videos you saved to this playlist.") ?>

    <link rel="stylesheet" type="text/css" href="/public/styles/styles.css">
    <link rel="stylesheet" type="text/css" href="/public/styles/templates/navbar.css">
    <link rel="stylesheet" type="text/css" href="/public/styles/templates/card.css">
    <link rel="stylesheet" type="text/css" href="/public/styles/templates/pagination.css">

    <link rel="stylesheet" type="text/css" href="/public/styles/playlist/playlist.css">

    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/templates/navbar.js" defer></script>
</head>

<body>
    <?php navbar(false) ?>
    <div id="wrapper">
        <div id="playlist-details-wrapper">
            <?php playlistCard($this->data) ?>
        </div>
        <div id="card-container">
            <?php
                if (isset($this->data)) {
                    // recipes and pages
                    foreach($this->data["recipes"] as $cardItem) {
                        recipeCard($cardItem, false);
                    }
                }
            ?>
        </div>

    </div>
</body>
