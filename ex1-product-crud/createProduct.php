<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Product</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <h1 class="mb-4">Create Product</h1>
                <form action="processCreate.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input name="name" id="name" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" id="price" type="number" step="0.01" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Stock Quantity</label>
                        <input name="stock_quantity" id="stock_quantity" type="number" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL</label>
                        <input name="image" id="image" class="form-control"/>
                    </div>
                    <div>
                        <input type="submit" value="Create" class="btn btn-primary"/>
                        <a href="viewProducts.php" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
