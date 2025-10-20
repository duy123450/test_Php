<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sp {
            width: 500px;
            height: 400px;
            background-color: green;
            border-style: solid;
            margin: 10px;
            float: left;
        }

        .sp img {
            width: 500px;
        }
    </style>
</head>

<body>
    <?php
    for ($i = 1; $i <= 20; $i++) {
        $s = $i % 2 ? './img/img1.png' : './img/img2.png';
    ?>
        <div class="sp">
            <h1>Sn pham <?php echo $i; ?></h1>
            <img src=<?php echo $s; ?> alt="">
        </div>
    <?php
    }
    ?>
</body>

</html>