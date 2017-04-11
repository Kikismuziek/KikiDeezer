<?php

$playlist1 = 'http://api.deezer.com/playlist/1266971851';
$playlist2 = 'http://api.deezer.com/playlist/1125553721';
$playlist3 = 'http://api.deezer.com/playlist/1352999805';


$decoded1 = json_decode(file_get_contents($playlist1));
$decoded2 = json_decode(file_get_contents($playlist2));
$decoded3 = json_decode(file_get_contents($playlist3));
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nieuwe Muziek</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <a href="index.php">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </a>
</div>
<div class="container">
    <h1 class="bigTitle">Nieuwe Muziek</h1>
    <div class="col-md-6">
        <a href="Top-Netherlands.php">
            <div class="options" id="option1">
                <p id="optionsNoIcon"><?php echo $decoded1->title;?></p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="Top-40-Hits.php">
            <div class="options" id="option2">
                <p id="optionsNoIcon"><?php echo $decoded2->title;?></p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="100-Mooie-Liedjes.php">
            <div class="options" id="option3">
                <p id="optionsNoIcon"><?php echo $decoded3->title;?></p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="index.php">
            <div class="options optionBackHome" id="option4">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                <p id="options">Terug</p>
            </div>
        </a>
    </div>
</div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
