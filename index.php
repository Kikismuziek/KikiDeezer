<?php

include('api.php');

$_SESSION['token'] = $params['access_token'];

if(!isset($_SESSION['token'])){
    header('Location: api.php');
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Music</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin-top: 20px">
    <h1 class="bigTitle" style="float: left">Welkom!</h1>
    <a href="index.php">
        <img class="logo" src="img/Logo.png" style="float: right;" alt="">
    </a>
</div>
<div class="container" style="margin-top: 20px">
    <div class="col-md-6">
        <a href="laatst-afgespeeld.php">
            <div class="options" id="option1">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                <!--                    <img class="icon" src="img/002-replay.png" alt="">-->
                <p id="options">Onlangs afgespeeld</p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="favorieten.php">
            <div class="options" id="option2">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <!--                    <img class="icon" src="img/005-star.png" alt="">-->
                <p id="options">Favorietenlijst</p>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="artiesten.php">
            <div class="options" id="option3">
                <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                <!--                    <img id="elvis" class="icon" src="img/Poppetje.png" alt="">-->
                <p id="options">Artiesten</p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="nieuwe-muziek.php">
            <div class="options" id="option4">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <!--                    <img class="icon" src="img/Zoek.png" alt="">-->
                <p id="options">Nieuwe muziek</p>
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
