<?php
include 'connectDb.php';

$conn = connectDb();
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "DELETE FROM account WHERE id=$id";
if ($conn->query($sql) === TRUE) {
header("Location: test.php");
} else {
header("Location: test.php?error=1");
}
$conn->close();
}