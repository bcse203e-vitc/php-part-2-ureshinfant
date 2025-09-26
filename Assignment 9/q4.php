<?php
class PasswordException extends Exception {}
function validatePassword($password) {
    if (strlen($password) < 8) throw new PasswordException("Password must be at least 8 characters");
    if (!preg_match('/[A-Z]/', $password)) throw new PasswordException("Password must contain an uppercase letter");
    if (!preg_match('/\d/', $password)) throw new PasswordException("Password must contain a digit");
    if (!preg_match('/[@#$%]/', $password)) throw new PasswordException("Password must contain a special character");
    return true;
}
try {
    validatePassword("Test123");
    echo "Password is valid";
} catch (PasswordException $e) {
    echo "Error: " . $e->getMessage();
}
?>

