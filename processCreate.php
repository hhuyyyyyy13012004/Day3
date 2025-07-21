<?php
include 'connectDb.php';

$conn = connectDb();

$email = $_POST['email'];
$pwd = $_POST['password'];
$confirm = $_POST['confirm'];
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];

$sql = "INSERT INTO account (email, password, fullname, phone) VALUES 
('$email', '$pwd', '$fullname', '$phone')";

if ($conn->query($sql) === TRUE) {
    header("Location: test.php");
}else{
    header("Location: createAcc.php");
}
$conn->close();