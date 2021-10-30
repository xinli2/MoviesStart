<?php

//
// Rick Mercer
//
// File MovieReport.php
//
// Read in a folder containing 8-20 .txt files holding movie data 
// and generate a report on that movie.
//

print ("Enter movie directory tmnt, tmnt2, mortalkombat, or princessbride: ");
$folder = readline ();

// If you have PHP 5, install XAMPP for Windows version 7 or use this line
//$folder = stream_get_line(STDIN,20 ,PHP_EOL);

// Need $movieDir in a a couple of functions below
$movieDir = $folder . '/';


printTitle ();  // Print the first three lines
printOverview (); // Print all elements in overview.txt
printReviews ();  // Print all reviews from the files review1.txt, review2.txt, review3.txt,  . . . 


function printTitle() {
   global $movieDir; // global provides access to the global variable $movieDir defined above
   $titleDir = $movieDir . 'info.txt';
   $info = file($titleDir);
   print("Title: " . $info[0]);
   print("Year: " . $info[1]);
   print("Rating: " . $info[2]);
   print("\n\n");
}

// Add other functions here
function printOverview() {
    global $movieDir;
    $overviewDir = $movieDir . 'overview.txt';
    $overview  = file($overviewDir);
    $index = 0;
    for ($i = 0; $i < count($overview); $i++) {
        for ($j = 0; $j < strlen($overview[$i]); $j++) {
            if ($overview[$i][$j] == ":") {
                print($overview[$i][$j]);
                print("\n");
            }
            else if ($j % 60 <= 5 && $overview[$i][$j] == " " 
                && $j > $index + 10){
                print("\n");
                $index = $j;
            }
            else {
                print($overview[$i][$j]);
            }
        }
        print("\n");
        $index = 0;
    }
    print("\n");
}

function printReviews() {
    print("REVIEWS:\n\n");
    $array = glob('./princessbride/*.txt');
    $index = 0;
    for($i = 2; $i < count($array); $i++)  {
        $reviews = file($array[$i]);
        print(trim($reviews[2]) . ", " . trim($reviews[3]) . ", "
            . trim($reviews[1]) . "\n");
        print("------------------------------------------------------------\n");
        for ($j = 0; $j < strlen($reviews[0]); $j++) {
            if ($j % 60 <= 10 && $reviews[0][$j] == " "
                && $j > $index + 10) {
                    print("\n");
                    $index = $j;
            }
            else {
                print($reviews[0][$j]);
            }
        }
        print("\n");
        $index = 0;
    }
}
?>