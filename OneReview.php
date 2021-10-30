<!DOCTYPE html> 

<html>

<head>

<title>Movies</title>

<link href="movies.css" type="text/css" rel="stylesheet">

</head>

<body> 

	<div class="imgBanner">
		<img src="images/rancidbanner.png" alt="Rancid Tomatoes">
	</div>

<?php
$folder = $_GET ['movie'];
$movieDir = $folder . '/';
$titleDir = $movieDir . 'info.txt';
$info = file($titleDir);
echo "<h1>" . $info[0] . "(" . $info[1] . ")</h1>" . PHP_EOL;
echo '<div class="grid-container"><div class="grid-header">';
if ($info[2] >= 50) {
    echo '<img src="images/freshlarge.png"/><span>' . $info[2] . '%</span>';
}
else {
    echo '<img src="images/rottenlarge.png"/><span>' . $info[2] . '%</span>';
}
echo '</div><div class="grid-overview">
	  <img src="' . $movieDir . 'overview.png"/></div>';
echo '<div class="grid-left">';
$array = glob('./' . $folder . '/*.txt');
$left = count($array) / 2 + 1;
for ($i = 2; $i < $left; $i++)  {
    $reviews = file($array[$i]);
    echo '<p class="review">';
    if ($reviews[1][0] === 'F') {
        echo '<img src="images/fresh.gif"/><q>';
    }
    else {
        echo '<img src="images/rotten.gif"/><q>';
    }
    echo $reviews[0] . '</q><p>';
    echo '<p class="author"><img src="images/critic.gif"/>' . $reviews[2] . '<br>' . $reviews[3] . '</p>';
}
echo '</div><div class="grid-right">';
for ($i = $left; $i < count($array); $i++) {
    $reviews = file($array[$i]);
    echo '<p class="review">';
    if ($reviews[1][0] === 'F') {
        echo '<img src="images/fresh.gif"/><q>';
    }
    else {
        echo '<img src="images/rotten.gif"/><q>';
    }
    echo $reviews[0] . '</q><p>';
    echo '<p class="author"><img src="images/critic.gif"/>' . $reviews[2] . '<br>' . $reviews[3] . '</p>';
}
echo '</div><div class="grid-data"><dl>';
$overviewDir = $movieDir . 'overview.txt';
$overview  = file($overviewDir);
for ($i = 0; $i < count($overview); $i++) {
    echo "<dt>";
    for ($j = 0; $j < strlen($overview[$i]); $j++) {
        if ($overview[$i][$j] === ":") {
            echo($overview[$i][$j]);
            echo("</dt><dd>");
        }
        else {
            echo($overview[$i][$j]);
        }
    }
    echo("</dd>");
}
echo "</dl></div></div>";
?>

</body>

</html>