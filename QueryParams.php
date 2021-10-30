<!DOCTYPE html>  <!-- File: QueryParams.php -->

<html>

<head>

<title>Movies</title>

<link href="movies.css" type="text/css" rel="stylesheet">

</head>

<body> 

<div class="container">

<?php

$folder = $_GET ['movie'];
$movieDir = $folder . '/';
$titleDir = $movieDir . 'info.txt';
$info = file($titleDir);
echo "<h1>" . $info[0] . "(" . $info[1] . ")</h1>" . PHP_EOL;
$imgDir = $movieDir . 'overview.png';
echo "<img src='" . $imgDir . "'>";
$overviewDir = $movieDir . 'overview.txt';
$overview  = file($overviewDir);
echo "<div class='overview'><dl>";
$index = 0;
for ($i = 0; $i < count($overview); $i++) {
    echo "<dt>";
    for ($j = 0; $j < strlen($overview[$i]); $j++) {
        if ($overview[$i][$j] == ":") {
            echo($overview[$i][$j]);
            echo("</dt><dd>");
        }
        else if ($j % 60 <= 10 && $overview[$i][$j] == " "
            && $j > $index + 10){
                echo("<br>");
                $index = $j;
        }
        else {
            echo($overview[$i][$j]);
        }
    }
    echo("</dd>");
    $index = 0;
}
echo "</dl></div>";

?> 
</div>

</body>

</html>