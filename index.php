<?php

$app_id     = "230982";
$app_secret = "b73116acd60c5b4ab8f549f53eb81ea3";
$my_url     = "http://localhost/KikiDeezer/index.php";

session_start();
$code = $_REQUEST["code"];

if(empty($code)){
    $_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection

    $dialog_url = "https://connect.deezer.com/oauth/auth.php?app_id=".$app_id
        ."&redirect_uri=".urlencode($my_url)."&perms=email,offline_access"
        ."&state=". $_SESSION['state'];

    header("Location: ".$dialog_url);
    exit;

}

if($_REQUEST['state'] == $_SESSION['state']) {
    $token_url = "https://connect.deezer.com/oauth/access_token.php?app_id="
        .$app_id."&secret="
        .$app_secret."&code=".$code;

    $response  = file_get_contents($token_url);
    $params    = null;
    parse_str($response, $params);
    $api_url   = "https://api.deezer.com/user/me?access_token="
        .$params['access_token'];

    $user = json_decode(file_get_contents($api_url));
}else{
    echo("The state does not match. You may be a victim of CSRF.");
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

<div class="container">
    <a href="index.php">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </a>
</div>
<div class="container">
    <h1 class="bigTitle">Welkom!</h1>
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
        <a href="nieuwe-muziek.php">
            <div class="options" id="option2">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <!--                    <img class="icon" src="img/Zoek.png" alt="">-->
                <p id="options">Nieuwe muziek</p>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="favorieten.php">
            <div class="options" id="option3">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <!--                    <img class="icon" src="img/005-star.png" alt="">-->
                <p id="options">Favorietenlijst</p>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="artiesten.php">
            <div class="options" id="option4">
                <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                <!--                    <img id="elvis" class="icon" src="img/Poppetje.png" alt="">-->
                <p id="options">Artiesten</p>
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
