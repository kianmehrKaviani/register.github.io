<?php
include_once "database/connection.php";

$error = "";
$success = false;

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $username = isset($_GET['username']) ? trim($_GET['username']) : "";
    $password = isset($_GET['password']) ? trim($_GET['password']) : "";

    if ($username === "" || $password === "") {
        $error = "empty";
    } else {

        try {
            $query = "INSERT INTO user (username, password)
                      VALUES ('$username', '$password')";

            $db->exec($query);

            $success = true;

        } catch (PDOException $e) {
            $error = "duplicate";
        }
    }
}
?>
