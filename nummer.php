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

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <title>Nummer</title>
</head>
<body>
<div class="container">
    <a href="index.php">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </a>
</div>
<div class="container">
    <h1 class="bigTitle">
        <?php echo $decoded->artist->name; ?>
    </h1>
    <h2 class="songTitle">
        Gekozen nummer: <?php echo mb_strimwidth($decoded->title, 0, 25, '...'); ?>
    </h2>
    <div class="col-md-6">
        <iframe scrolling="no" frameborder="0" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=false&playlist=false&width=600&height=600&color=007FEB&layout=dark&size=medium&type=tracks&id=<?php echo $id; ?>&app_id=230982" width="500" height="500"></iframe>
    </div>
    <div class="col-md-6">
        <div class="col-md-6">
            <a href="javascript:history.back()">
                <div class="options optionsSong optionBackHome">
                    <span class="glyphicon glyphicon-arrow-left test123" aria-hidden="true"></span>
                    <p id="options">Terug</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="nummer.php?id=<?php echo $id ?>">
                <div class="options optionsSong option">
                    <span class="glyphicon glyphicon-pause" onclick="DZ.player.pause(); return false;" aria-hidden="true"></span>
                    <p id="options">Pauze</p>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="nummer.php?id=<?php if(isset($_SESSION['songs'])){
                echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionPrev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <p id="options">Vorig nummer</p>
                </div>
            </a>

        </div>
        <div class="col-md-6">
            <a href="nummer.php?id=<?php if(isset($_SESSION['songs'])){
                echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionNext">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <p id="options">Volgend nummer</p>
                </div>
            </a>
        </div>

        <div class="col-md-12">
            <a href="Voeg-Toe-Favorieten.php?id=<?php echo $id; ?>">
                <div class="options optionsSong option optionFavorite" data-id="<?php echo $id;?>">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <p id="options">Toevoegen favoriet</p>
                </div>
            </a>
        </div>

    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://cdn-files.deezer.com/js/min/dz.js"></script>
<script>
    $(document).ready(function(){
        $(".col-md-6 .test123").attr('disabled', true);
        $("#slider_seek").click(function(evt,arg){
            var left = evt.offsetX;
            console.log(evt.offsetX, $(this).width(), evt.offsetX/$(this).width());
            DZ.player.seek((evt.offsetX/$(this).width()) * 100);
        });
    });
    function event_listener_append() {
        var pre = document.getElementById('event_listener');
        var line = [];
        for (var i = 0; i < arguments.length; i++) {
            line.push(arguments[i]);
        }
        pre.innerHTML += line.join(' ') + "\n";
    }
    function onPlayerLoaded() {
        $(".col-md-6 .test123").attr('disabled', false);
        event_listener_append('player_loaded');
        DZ.Event.subscribe('current_track', function(arg){
            event_listener_append('current_track', arg.index, arg.track.title, arg.track.album.title);
        });
        DZ.Event.subscribe('player_position', function(arg){
            event_listener_append('position', arg[0], arg[1]);
            $("#slider_seek").find('.bar').css('width', (100*arg[0]/arg[1]) + '%');
        });
    }
    DZ.init({
        appId  : '230982',
        channelUrl : 'http://developers.deezer.com/examples/channel.php',
        player : {
            onload : onPlayerLoaded
        }
    });
</script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
