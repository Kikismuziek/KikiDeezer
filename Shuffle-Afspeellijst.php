<?php
/**
 * Created by PhpStorm.
 * User: Plaisir
 * Date: 11-4-2017
 * Time: 12:04
 */

session_start();
$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);
};

$track = 'http://api.deezer.com/track/'.$id.'';

$decoded = json_decode(file_get_contents($track));


//echo '<pre>';
//print_r($decoded);
//echo '</pre>';

//print_r($_SESSION['songs']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Nummer</title>
</head>
<body>

<div class="container" style="margin-top: 20px">
    <div class="titles" style="float: left;">
        <h1 class="bigTitle">
            <?php echo $decoded->artist->name ?>
        </h1>
        <h2 class="songTitle">
            Gekozen nummer: <?php echo $decoded->title?>
        </h2>
    </div>
    <a href="index.php">
        <img class="logo" src="img/Logo.png" style="float: right" alt="">
    </a>
</div>


<div class="container">
    <div class="col-md-6">
<!--        <div id="dz-root"></div>-->
<!--        <div id="player" style="width:100%;" align="center"></div>-->
                <iframe scrolling="no" frameborder="0" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=false&width=600&height=600&color=007FEB&layout=dark&size=medium&type=tracks&id=<?php echo $id; ?>&app_id=230982" width="500" height="500"></iframe>
    </div>
    <div class="col-md-6 buttonsDiv">
        <div class="col-md-6 theButton">
            <a href="javascript:history.back()">
                <div class="options optionsSong optionBackHome" id="option1">
                    <span class="glyphicon glyphicon-arrow-left test123" aria-hidden="true"></span>
                    <p id="options">Terug</p>
                </div>
            </a>
        </div>
        <div class="col-md-6 theButton">
            <a href="Shuffle-Afspeellijst.php?id=<?php echo $id ?>">
                <div class="options optionsSong option" id="option2">
                    <span class="glyphicon glyphicon-pause" aria-hidden="true"></span>
                    <p id="options">Pauze</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 theButton">
            <a href="Shuffle-Afspeellijst.php?id=<?php if(isset($_SESSION['songs'])){
                echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionPrev" id="option3">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <p id="options">Vorig nummer</p>
                </div>
            </a>

        </div>
        <div class="col-md-6 theButton">
            <a href="Shuffle-Afspeellijst.php?id=<?php if(isset($_SESSION['songs'])){
                echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionNext" id="option4">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <p id="options">Volgend nummer</p>
                </div>
            </a>
        </div>

        <div class="col-md-12 theButton">
            <a href="Voeg-Toe-Favorieten.php?id=<?php echo $id; ?>">
                <div class="options optionsSong option optionFavorite" id="option5" data-id="<?php echo $id;?>">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <p id="options">Toevoegen favoriet</p>
                </div>
            </a>
        </div>


    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="js/scriptNummer.js"></script>
</body>
</html>
