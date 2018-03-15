<?php
session_start();
include 'auth.php';
include 'config.php';
$id=$_SESSION['user_id'];

$users=new App();
$row=$users->getUserOne($id)->fetch(PDO::FETCH_ASSOC);
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
<?php include 'nav.php'?>

<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <div class="text-center"><div id="user_image"></div>
                        <form method="post" enctype="multipart/form-data">
                            <label for="user_img" class="control-label text-primary">Select Photo</label>
                            <input type="file" name="user_img" id="user_img" class="hide">
                        </form>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Name : <?php echo $row['name'] ?></li>
                        <li class="list-group-item">Email : <?php echo $row['email'] ?></li>
                        <li class="list-group-item">Created Date : <?php echo date('d-m-Y | h:i:s A', strtotime($row['created_at'])) ?></li>
                    </ul>
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