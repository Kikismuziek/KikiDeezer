<?php

$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);

    $tracks_url = "http://api.deezer.com/album/$id/tracks&limit=14";
    $name_url = "http://api.deezer.com/album/$id";

    $tracks = json_decode(file_get_contents($tracks_url));
    $name = json_decode(file_get_contents($name_url));
};

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
    <div class="titles" style="float: left;">
    <h1 class="bigTitle">
        <?php echo $tracks->data[0]->artist->name ?>
    </h1>
    <h2 class="songTitle">
        Gekozen album: <?php echo $name->title?>
    </h2>
    </div>
    <a href="index.php">
        <img class="logo" src="img/Logo.png" style="float: right" alt="">
    </a>
</div>
<div class="container" style="margin-top: 20px"><?php
    $array1 = array();
    foreach ($tracks->data as $t) {
        ?>
        <div class="col-md-3">
            <a href="nummer.php?id=<?php echo $t->id ?>">
                <div class="options option optionsSmall">
                    <p id="optionSmall"><?php echo mb_strimwidth($t->title, 0, 25, '...'); ?></p>
                </div>
            </a>
        </div>
        <?php
        array_push($array1, $t->id);
    }
    ?>
    <div class="backBtn col-md-3">
        <a href="javascript:history.back()">
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
<script type="text/javascript" src="js/scriptArtiesten.js"></script>
</body>
</html>