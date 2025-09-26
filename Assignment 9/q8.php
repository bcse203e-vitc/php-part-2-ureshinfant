<?php
$inputFile = "data.txt";
$outputFile = "numbers.txt";

if (file_exists($inputFile)) {
    $content = file_get_contents($inputFile);

   
    preg_match_all("/\b\d{10}\b/", $content, $matches);

    if (!empty($matches[0])) {
        $numbers = implode(PHP_EOL, $matches[0]);
        file_put_contents($outputFile, $numbers);
        echo "Mobile numbers extracted and saved to '$outputFile'.<br>";
        echo "<pre>" . $numbers . "</pre>";
    } else {
        echo "No valid 10-digit mobile numbers found.";
    }
} else {
    echo "Input file '$inputFile' not found.";
}
?>
