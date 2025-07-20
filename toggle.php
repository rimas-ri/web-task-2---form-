<?php
$conn = new mysqli("localhost", "root", "root", "task2", 8889);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$statusResult = $conn->query("SELECT Status FROM user WHERE ID=$id");
$row = $statusResult->fetch_assoc();
$currentStatus = $row['Status'];
$newStatus = $currentStatus == 1 ? 0 : 1;

$conn->query("UPDATE user SET Status=$newStatus WHERE ID=$id");
header("Location: index.php");
?>
