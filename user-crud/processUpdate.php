
<?php
$includePath = __DIR__ . '/connect.php';
include $includePath;
$conn = connectDb();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $set = "username='$username', email='$email'";
    if ($password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $set .= ", password='$hashed'";
    }
    $sql = "UPDATE users SET $set WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: viewUsers.php');
        $conn->close();
        exit();
    } else {
        echo 'Error: ' . $conn->error;
    }
} else {
    echo 'Invalid request.';
}
$conn->close();
?>
