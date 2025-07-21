<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-LN+7f+dv2j6us2u30kP6M/trlBMCkTyK8332pDb+pxDcCLuTusPj697FHWAR/5mcr" 
          crossorigin="anonymous">
    <title>Create Account</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-4">
                <h1 class="mb-4">Create Account</h1>
                <form action="processCreate.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" id="email" required type="email" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" id="password" type="password" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Confirm</label>
                        <input name="confirm" id="confirm" type="password" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full name</label>
                        <input name="fullname" id="fullname" required class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="phone" id="phone" required class="form-control"/>
                    </div>
                    <div>
                        <input type="submit" value="Create" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ndqDUQ6zau9qJ1lfwAPnLlhNTkcfHzAVBErH9d1LvGRem5+R9zE/rAZBzGN9S40FQ" 
            crossorigin="anonymous">
    </script>
</body>
</html>
