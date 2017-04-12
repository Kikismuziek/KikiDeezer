<?php

$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);

    $tracks_url = "http://api.deezer.com/album/$id/tracks&limit=13";
    $name_url = "http://api.deezer.com/album/$id";

    $tracks = json_decode(file_get_contents($tracks_url));
    $name = json_decode(file_get_contents($name_url));
};

$count = 0;

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
<div class="container" style="margin-top: 20px">
    <div class="wrapper wrapper1" id="wrapper1">
    </div>
    <div class="wrapper wrapper2" id="wrapper2">
    </div>
    <div class="wrapper wrapper3" id="wrapper3">
    </div>
    <div class="wrapper wrapper4" id="wrapper4">
    </div>
    <?php
    foreach ($tracks->data as $t) {
        $count++;
        ?>
        <div class="col-md-3" id="<?php echo $count ?>">
            <a href="nummer.php?id=<?php echo $t->id ?>">
                <div class="options optionsSmall" id="option<?php echo $count?>">
                    <p id="optionSmall"><?php echo mb_strimwidth($t->title, 0, 15, '...'); ?></p>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
    <div class="backBtn col-md-3" id="<?php echo $count+1 ?>">
        <a href="nummer.php?id=<?php echo $array1[array_rand($array1)]; ?>">
            <div class="options optionBackHome optionsSmall" id="option<?php echo $count+1?>">
                <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
                <p id="optionSmall">Shuffle</p>
            </div>
        </a>
    </div>
    <div class="backBtn col-md-3" id="<?php echo $count+2 ?>">
        <a href="index.php">
            <div class="options optionBackHome optionsSmall" id="option<?php echo $count+2?>">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                <p id="optionSmall">Terug</p>
            </div>
        </a>
    </div>
    <div class="homeBtn col-md-3" id="<?php echo $count+3 ?>">
        <a href="index.php">
            <div class="options optionBackHome optionsSmall" id="option<?php echo $count+3?>">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <p id="optionSmall">Home</p>
            </div>
        </a>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="js/scriptPlaylist.js"></script>
</body>
</html>