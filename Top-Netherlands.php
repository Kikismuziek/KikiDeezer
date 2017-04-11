<?php
/**
 * Created by PhpStorm.
 * User: Plaisir
 * Date: 11-4-2017
 * Time: 11:26
 */
session_start();
$tracks = 'http://api.deezer.com/playlist/1266971851/tracks';
$decoded = json_decode(file_get_contents($tracks));

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

<div class="container">
    <a href="index.php">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </a>
</div>
<div class="container">
    <?php
    $limit = 0;
    $wrapperCount = 0;
    $array1 = array();
    foreach ($decoded->data as $aItem){
        array_push($array1, $aItem->id);
    }
    ?>

    <div class="wrapper wrapper0" data-wrapperid="0" id="wrapper0">
        <a href="nummer.php?id=<?php echo $array1[array_rand($array1)]; ?>">
            <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
        </a>
    </div>

    <?php
    foreach(array_chunk($decoded->data, 4, true) as $array){
        $wrapperCount++;
        echo "<div class='wrapper wrapper$wrapperCount' data-wrapperid='$wrapperCount' id='wrapper$wrapperCount'>";
        foreach ($array as $track) {
            //$number++;
            $limit++;
            ?>
            <div class="col-md-3">
                <a href="nummer.php?id=<?php echo $track->id ?>">
                    <div class="options option optionsSmall" href="nummer.php?id=<?php echo $track->id ?>" id="option<?php //echo $number; ?>" data-text="<?php echo $track->title_short; ?>">
                        <p id="optionSmall"><?php echo mb_strimwidth($track->title_short, 0, 15, '...'); ?></p>
                    </div>
                </a>
            </div>

            <?php
            if($limit == 14){
                break;
            }
        }
        echo "</div>";
        if($wrapperCount == 4){
            break;
        }
    }
//    echo '<pre>';
//    print_r($array1);
//    echo '</pre>';
    $_SESSION['songs'] = $array1;
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
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
