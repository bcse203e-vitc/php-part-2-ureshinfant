<?php
$inputFile = "students.txt";
$errorFile = "errors.log";

if (file_exists($inputFile)) {
    $lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $validStudents = [];
    $invalidEntries = [];

    foreach ($lines as $line) {
        $parts = explode(",", $line);

        if (count($parts) != 3) {
            $invalidEntries[] = $line;
            continue;
        }

        list($name, $email, $dob) = $parts;
        $name = trim($name);
        $email = trim($email);
        $dob = trim($dob);

       
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/", $email)) {
            $invalidEntries[] = $line;
            continue;
        }

       
        try {
            $birthDate = new DateTime($dob);
            $today = new DateTime();
            $age = $today->diff($birthDate)->y;
        } catch (Exception $e) {
            $invalidEntries[] = $line;
            continue;
        }

        $validStudents[] = ["name" => $name, "email" => $email, "age" => $age];
    }

   
    if (!empty($validStudents)) {
        echo "<h3>Valid Student Records</h3>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Name</th><th>Email</th><th>Age</th></tr>";
        foreach ($validStudents as $student) {
            echo "<tr>";
            echo "<td>{$student['name']}</td>";
            echo "<td>{$student['email']}</td>";
            echo "<td>{$student['age']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No valid student records found.<br>";
    }

 
    if (!empty($invalidEntries)) {
        file_put_contents($errorFile, implode(PHP_EOL, $invalidEntries));
        echo "<br>Invalid entries saved to '$errorFile'.";
    }
} else {
    echo "Input file '$inputFile' not found.";
}
?>

