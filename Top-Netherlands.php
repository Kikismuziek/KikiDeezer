<?php
/**
 * Created by PhpStorm.
 * User: Plaisir
 * Date: 11-4-2017
 * Time: 11:26
 */

$tracks = 'http://api.deezer.com/playlist/1266971851/tracks';
$decoded = json_decode(file_get_contents($tracks));


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top Netherlands</title>
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
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
