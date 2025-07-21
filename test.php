<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account List</title>
    <!-- Thêm Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h4><a href="createAcc.php" class="btn btn-primary mb-3">Create New Account</a></h4>
        
        <h1 class="mb-4">Account List</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Full name</th>
                    <th>Phone</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'connectDb.php';
                    $conn = connectDb();
                    $sql = "SELECT id, email, fullname, phone FROM account";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_array(MYSQLI_NUM)) {
                ?>
                            <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                <td><?php echo $row[3]; ?></td>
                                <td><a href="updateAcc.php?id=<?php echo $row[0]; ?>" class="btn btn-warning btn-sm">Update</a></td>
                                <td><a href="deleteAcc.php?id=<?php echo $row[0]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>
                            </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
