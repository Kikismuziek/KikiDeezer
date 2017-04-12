<?php
session_start();

$favorites_url = "http://api.deezer.com/user/me/tracks?access_token="
    .$_SESSION['token']."&limit=14";

$favorites = json_decode(file_get_contents($favorites_url));
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <a href="index.php">
            <img class="logo pull-right" src="img/Logo.png" alt="">
        </a>
    </div>
    <div class="container">
        <h1 class="bigTitle">
            Mijn Favorietenlijst
        </h1>
        <?php
        $array1 = array();
        foreach ($favorites->data as $f) {
            ?>
            <div class="col-md-3">
                <a href="nummer.php?id=<?php echo $f->id ?>">
                    <div class="options option optionsSmall">
                        <p id="optionSmall"><?php echo mb_strimwidth($f->title, 0, 15, '...'); ?></p>
                    </div>
                </a>
            </div>
            <?php
            array_push($array1, $f->id);
        }
        ?>
        <div class="backBtn col-md-3">
            <a href="index.php">
                <div class="options optionBackHome optionsSmall">
                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    <p id="optionSmall">Terug</p>
                </div>
            </a>
        </div>
        <div class="homeBtn col-md-3">
            <a href="index.php">
                <div class="options optionBackHome optionsSmall">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <p id="optionSmall">Home</p>
                </div>
            </a>
        </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="responsivevoice.js"></script>
    <script type="text/javascript" src="action.js"></script>
    </body>
    </html>