<?php
/**
 * Created by PhpStorm.
 * User: Plaisir
 * Date: 11-4-2017
 * Time: 11:26
 */
session_start();
$tracks_url = 'http://api.deezer.com/playlist/1125553721/tracks&limit=13';
$tracks = json_decode(file_get_contents($tracks_url));
$count = 0;

//echo '<pre>';
//print_r($decoded->data);
//echo '</pre>';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--    <meta name="viewport"-->
    <!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
    <!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <title>Top Netherlands</title>
</head>
<body>

<div class="container" style="margin-top: 20px">
    <h1 class="bigTitle" style="float: left;">
        Top Netherlands
    </h1>
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
    $array1 = array();
    foreach ($tracks->data as $aItem){
        array_push($array1, $aItem->id);
    }
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
    $_SESSION['songs'] = $array1;
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
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="js/scriptPlaylist.js"></script>
</body>
</html>
