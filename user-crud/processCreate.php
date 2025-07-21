
<?php
$includePath = __DIR__ . '/connect.php';
include $includePath;
$conn = connectDb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if ($username && $email && $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed')";
        if ($conn->query($sql) === TRUE) {
            header('Location: viewUsers.php');
            $conn->close();
            exit();
        } else {
            echo 'Error: ' . $conn->error;
        }
    } else {
        echo 'Please fill in all fields.';
    }
} else {
    echo 'Invalid request.';
}
$conn->close();
?>
