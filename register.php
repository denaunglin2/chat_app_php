<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap.css" rel="stylesheet">
    <title>My Chat App</title>
</head>
<body>
<?php include 'nav.php'?>

<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div id="info"></div>
            <h1 class="text-center text-primary">Register</h1>
            <form method="post" id="regForm">
                <div class="form-group">
                    <label for="name" class="control-label">User Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_again" class="control-label">Password Again</label>
                    <input type="password" name="password_again" id="password_again" class="form-control">
                </div>
                <div class="form-group">
                    <button type="button" id="btnReg" class="btn btn-primary btn-block">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="jQuery.js"></script>
<script src="bootstrap.js"></script>
<script src="app.js"></script>
</body>
</html>