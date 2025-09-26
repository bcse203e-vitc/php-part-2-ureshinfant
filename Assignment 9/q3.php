<?php
$emails = ["john@example.com", "wrong-email@", "me@site", "user123@gmail.com"];
foreach ($emails as $email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "$email<br>";
    }
}
?>

