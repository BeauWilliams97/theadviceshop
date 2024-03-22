<?php
/*Error checking to ensure name is entered when signing up.*/
if (empty($_POST["name"])) {
    die("Name is required");
}
/*Error checking to ensure a valid email is entered when singing up.*/
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}
/*Error checking to ensure password is at least 8 characters long.*/
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}
/*Error checking to ensure password contains at least 1 letter.*/
if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}
/*Error checking to ensure password contains at least 1 number.*/
if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
/*Error checking to ensure both passwords fields match.*/
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}






print_r($_POST);
var_dump($password_hash);
