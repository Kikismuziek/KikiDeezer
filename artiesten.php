<?php
session_start();

$artists_url = "http://api.deezer.com/user/me/artists?access_token="
    .$_SESSION['token']."&limit=5";

$artists = json_decode(file_get_contents($artists_url));

$number = 0;
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container" style="margin-top: 20px">
        <h1 class="bigTitle" style="float: left;">
            Artiesten
        </h1>
        <a href="index.php">
            <img class="logo" src="img/Logo.png" style="float: right" alt="">
        </a>
    </div>
    <div class="container" style="margin-top: 20px">
        <?php
        foreach ($artists->data as $a) {
            $number++;
            ?>
            <div class="col-md-4">
                <a href="artiest.php?id=<?php echo $a->id; ?>">
                    <div class="options optionMiddel" id="option<?php echo $number ?>">
                        <p id="options"><?php echo $a->name; ?></p>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
        <div class="col-md-4">
            <a href="index.php">
                <div class="options optionMiddel optionBackHome" id="option6">
                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    <p id="options">Terug</p>
                </div>
            </a>
        </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="responsivevoice.js"></script>
    <script type="text/javascript" src="js/scriptArtiesten.js"></script>
    </body>
    </html>