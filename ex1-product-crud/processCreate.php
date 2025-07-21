
<?php
include 'connectDb.php';
$conn = connectDb();

$name = $_POST['name'];
$price = $_POST['price'];
$stock_quantity = $_POST['stock_quantity'];
$image = $_POST['image'];

$sql = "INSERT INTO products (name, price, stock_quantity, image) VALUES 
('$name', '$price', '$stock_quantity', '$image')";

if ($conn->query($sql) === TRUE) {
    header("Location: viewProducts.php");
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>