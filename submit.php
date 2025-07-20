<?php
$conn = new mysqli("localhost", "root", "root", "task2", 8889);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];

$conn->query("INSERT INTO user (Name, Age) VALUES ('$name', $age)");
header("Location: index.php");
?>

