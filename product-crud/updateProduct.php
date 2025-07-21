
<?php
include 'connectDb.php';
$conn = connectDb();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Fetch current product data
    $result = $conn->query("SELECT name, price, stock_quantity FROM products WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        $conn->close();
        exit();
    }
} else {
    echo "No product ID specified.";
    $conn->close();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $sql = "UPDATE products SET name='$name', price='$price', stock_quantity='$stock_quantity' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: viewProducts.php");
        $conn->close();
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Update Product</h1>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input name="name" id="name" required class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input name="price" id="price" type="number" step="0.01" required class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" />
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock Quantity</label>
                <input name="stock_quantity" id="stock_quantity" type="number" required class="form-control" value="<?php echo htmlspecialchars($product['stock_quantity']); ?>" />
            </div>
            <div>
                <input type="submit" value="Update" class="btn btn-primary" />
                <a href="viewProducts.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
