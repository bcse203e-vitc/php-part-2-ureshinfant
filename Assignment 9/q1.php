<?php
$students = ["Rahul" => 85, "Priya" => 92, "Arun" => 78, "Sneha" => 95, "Vikram" => 88];
arsort($students);
echo "<table border='1'><tr><th>Name</th><th>Marks</th></tr>";
$top = array_slice($students, 0, 3, true);
foreach ($top as $name => $marks) {
    echo "<tr><td>$name</td><td>$marks</td></tr>";
}
echo "</table>";
?>

