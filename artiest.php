<?php

$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);

    $album_url = "http://api.deezer.com/artist/$id/albums&limit=4";
    $name_url = "http://api.deezer.com/artist/$id";

    $album = json_decode(file_get_contents($album_url));
    $name = json_decode(file_get_contents($name_url));
};

$number = 0;

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
<div class="container" style="margin-top: 20px">
    <div class="titles" style="float: left;">
        <h1 class="bigTitle"">
        <?php echo $name->name ?>
        </h1>
        <h2 class="songTitle">
            Albums
        </h2>
    </div>
    <a href="index.php">
        <img class="logo" src="img/Logo.png" style="float: right" alt="">
    </a>
</div>

<div class="container" style="margin-top: 20px">
    <?php
    foreach ($album->data as $a) {
        $number++;
        ?>
        <div class="col-md-4">
            <a href="album.php?id=<?php echo $a->id; ?>">
                <div class="options optionMiddel" id="option<?php echo $number ?>">
                    <p id="options"><?php echo $a->title; ?></p>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
    <div class="col-md-4">
        <a href="index.php">
            <div class="options optionMiddel optionBackHome" id="option6">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                <p id="options">Terug</p>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="index.php">
            <div class="options optionMiddel optionBackHome" id="option6">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <p id="options">Home</p>
            </div>
        </a>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="js/scriptArtiesten.js"></script>
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
