<?php
session_start();
include 'auth.php';
include 'config.php';
$r_id=$_GET['r_id'];
$_SESSION['r_id']=$r_id;

$users=new App();
$user=$users->getUserOne($r_id)->fetch(PDO::FETCH_ASSOC);
?>
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
<?php // include 'nav.php'?>

<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Chat with <b><?php echo $user['name'] ?></b> <a href="home.php" class="pull-right" style="color: #fff">Home</a></div>
                <div class="panel-body" style="max-height: 500px;overflow-y: auto;">

                    <ul class="list-group" id="myMsg">

                    </ul>

                </div>
                <div class="panel-footer navbar-fixed-bottom">
                    <div class="form-group">
                         <input type="text" autofocus id="msgText" class="form-control" placeholder="Enter Your Message & Press Enter">


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<script src="jQuery.js"></script>
<script src="bootstrap.js"></script>
<script src="app.js"></script>
</body>
</html>