<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?=base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <form action="<?=base_url("login/ceklogin")?>" method="POST">
                        <div class="card-header">
                            <h3>Silahkan Login</h3>
                            <?=@$_SESSION["pesan"]?>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <input type="submit" value="Login" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url("assets/js/bootstrap.bundle.min.js");?>" crossorigin="anonymous">
    </script>
</body>

</html>