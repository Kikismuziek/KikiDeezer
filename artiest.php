<?php

$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);

    $artist_url = "http://api.deezer.com/artist/$id/radio&limit=14";

    $artist = json_decode(file_get_contents($artist_url));
};

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Artiest</title>
</head>
<body>
<div class="container">
    <a href="index.php">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </a>
</div>
<div class="container">


    <h1 class="bigTitle"><?php echo $artist->data[0]->artist->name ?></h1>

    <?php
    $array1 = array();
    foreach ($artist->data as $a) {
        ?>
        <div class="col-md-3">
            <a href="nummer.php?id=<?php echo $a->id ?>">
                <div class="options option optionsSmall">
                    <p id="optionSmall"><?php echo mb_strimwidth($a->title, 0, 15, '...'); ?></p>
                </div>
            </a>
        </div>
        <?php
        array_push($array1, $a->id);
    }
    ?>
    <div class="backBtn col-md-3">
        <a href="artiesten.php">
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
<script type="text/javascript">
    var back = $(".backBtn");
    var home = $(".homeBtn");

    var wrapper = $(".wrapper");
    var wrapper3 = $(".wrapper3");

    back.appendTo(wrapper3);
    home.appendTo(wrapper3);
</script>
</body>
</html>
