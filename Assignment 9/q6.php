<?php
date_default_timezone_set("Asia/Kolkata");

echo "<h3>Current Date and Time</h3>";
echo date("d-m-Y H:i:s") . "<br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST["dob"];
    $today = new DateTime();
    $birthDate = new DateTime($dob);

    $nextBirthday = new DateTime(date("Y") . "-" . $birthDate->format("m-d"));

    if ($nextBirthday < $today) {
        $nextBirthday->modify("+1 year");
    }

    $daysLeft = $today->diff($nextBirthday)->days;

    echo "<h3>Days Left Until Next Birthday</h3>";
    echo "Your next birthday is on " . $nextBirthday->format("d-m-Y") . ".<br>";
    echo "Days left: $daysLeft";
}
?>

