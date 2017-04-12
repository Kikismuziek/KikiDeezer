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

$arraySongs = $_SESSION['songs'];

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
<div class="container">
    <a href="index.php">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </a>
</div>
<div class="container">
    <h1 class="bigTitle" id="bigT">
        <?php echo $decoded->artist->name; ?>
    </h1>
    <h2 class="songTitle" id="songT">
        Gekozen nummer: <?php echo mb_strimwidth($decoded->title, 0, 25, '...'); ?>
    </h2>
    <div class="col-md-6">
        <div id="dz-root"></div>
        <div id="player" style="width:100%;" align="center"></div>
<!--        <iframe scrolling="no" frameborder="0" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=false&playlist=false&width=600&height=600&color=007FEB&layout=dark&size=medium&type=tracks&id=--><?php //echo $id; ?><!--&app_id=230982" width="500" height="500"></iframe>-->
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
            <a href="nummer.php?id=<?php echo $id ?>">
                <div class="options optionsSong option" onclick="DZ.player.pause(); return false;" id="option2">
                    <span class="glyphicon glyphicon-pause" onclick="DZ.player.pause(); return false;" aria-hidden="true"></span>
                    <p id="options">Pauze</p>
                </div>
            </a>
        </div>

        <div class="col-md-6 theButton">
            <a href="nummer.php?id=<?php if(isset($_SESSION['songs'])){
                echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionPrev" onclick="DZ.player.prev(); return false;" id="option3">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <p id="options">Vorig nummer</p>
                </div>
            </a>

        </div>
        <div class="col-md-6 theButton">
            <a href="nummer.php?id=<?php if(isset($_SESSION['songs'])){
                echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionNext" onclick="DZ.player.next(); return false;" id="option4">
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
<script type="text/javascript" src="http://cdn-files.deezer.com/js/min/dz.js"></script>
<script>
    $(document).ready(function(){

        var pausecontent = [];

        <?php foreach($arraySongs as $val){ ?>

        pausecontent.push('<?php echo $val; ?>');

        <?php } ?>

        $(window).load(function(){
            DZ.player.playTracks(pausecontent); return false;
        });

        $(".col-md-6 .optionsSong").attr('disabled', true);
    });
    function onPlayerLoaded() {
        $(".col-md-6 .optionsSong").attr('disabled', false);
        //DZ.Event.subscribe('current_track', function(arg){
            //event_listener_append('current_track', arg.index, arg.track.title, arg.track.album.title);
            //console.log('current track', arg.track.title);
        //});
        var newTrack;
        DZ.Event.subscribe('current_track', function(track, evt_name){
            console.log(track.track.artist.name);
            window.history.pushState('nummer', track.track.title, 'nummer.php?id=' + track.track.id);
            var bigTitle = $('#bigT');
            bigTitle.textContent = track.track.artist.name;

            newTrack = track.track.id;

        });

        console.log(<?php echo $_GET['id']; ?>);
        //DZ.api('user/me/tracks', 'POST', {songs: 3135556}, function(response){ console.log(response); });
    }
    DZ.init({
        appId  : '230982',
        channelUrl : 'http://localhost/KikiDeezer/channel.php',
        player : {
            container : 'player',
            playlist : true,
            width : 400,
            height : 400,
            format: 'square',
            onload : onPlayerLoaded
        }
    });
</script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="js/scriptNummer.js"></script>
</body>
</html>
