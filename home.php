<?php
session_start();
include 'auth.php'; ?>
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
                <div class="panel-heading">User List</div>
                <div class="panel-body">
                    <ul class="list-group">


                    <?php
                    include 'config.php';
                    $users=new App();
                    $row=$users->getAllUser();
                    foreach ($row as $user):
                    ?><?php if($_SESSION['user_id']!=$user['id']): ?>
                        <li class="list-group-item"><a href="chat.php?r_id=<?php echo $user['id'] ?>"><?php echo $user['name'] ?></a></li>
                        <?php endif; ?>
                        <?php
                    endforeach;
                    ?>
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