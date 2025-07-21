
<?php
$includePath = __DIR__ . '/connect.php';
include $includePath;
$conn = connectDb();

if (!isset($_GET['id'])) {
    echo 'No user ID specified.';
    $conn->close();
    exit();
}
$id = intval($_GET['id']);
$result = $conn->query("SELECT username, email FROM users WHERE id = $id");
if (!$result || $result->num_rows === 0) {
    echo 'User not found.';
    $conn->close();
    exit();
}
$user = $result->fetch_assoc();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $error = 'Error: ' . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <h1 class="mb-4">Update User</h1>
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="username" id="username" required class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" id="email" type="email" required class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password (leave blank to keep current)</label>
                        <input name="password" id="password" type="password" class="form-control" />
                    </div>
                    <div>
                        <input type="submit" value="Update" class="btn btn-primary" />
                        <a href="viewUsers.php" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
