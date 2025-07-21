
<?php
$includePath = __DIR__ . '/connect.php';
include $includePath;
$conn = connectDb();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: viewUsers.php');
        $conn->close();
        exit();
    } else {
        echo 'Error deleting record: ' . $conn->error;
    }
} else {
    echo 'No user ID specified.';
}
$conn->close();
?>
