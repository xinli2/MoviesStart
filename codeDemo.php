<?php

$array = glob('./princessbride/*.txt');
// print_r($array);
for($i = 0; $i < count($array); $i++)  {
    $str = file_get_contents($array[$i]);
    print($str . "\n\n");
}

?>