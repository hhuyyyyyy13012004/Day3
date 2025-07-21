<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-LN+7f+dv2j6us2u30kP6M/trlBMCkTyK8332pDb+pxDcCLuTusPj697FHWAR/5mcr"
          crossorigin="anonymous">
</head>
<body class="p-4">
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <h1 class="mb-4">Update Account</h1>

            <?php
                include 'connectDb.php';

                $conn = connectDb();

                if (!isset($_GET['id'])) {
                    die("<div class='alert alert-danger'>Missing ID</div>");
                }

                $id = $_GET['id'];
                $sql = "SELECT id, email, fullname, phone FROM account WHERE id=$id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_array(MYSQLI_NUM)) {
            ?>
                        <form action="processUpdate.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" id="email" value="<?php echo $row[1]; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full name</label>
                                <input name="fullname" id="fullname" value="<?php echo $row[2]; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input name="phone" id="phone" value="<?php echo $row[3]; ?>" class="form-control" />
                            </div>
                            <div>
                                <input type="submit" value="Update" class="btn btn-primary" />
                            </div>
                        </form>
            <?php
                    } else {
                        echo "<div class='alert alert-warning'>No record found.</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning'>No record found.</div>";
                }

                $conn->close();
            ?>

        </div>
    </div>
</div>

<!-- Bootstrap JS (optional but recommended for components like modals, alerts, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndqDUQ6zau9qJ1lfwAPnLlhNTkcfHzAVBErH9d1LvGRem5+R9zE/rAZBzGN9S40FQ"
        crossorigin="anonymous">
</script>
</body>
</html>
