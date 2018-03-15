<?php
include 'config.php';
session_start();
$id=$_SESSION['user_id'];

$users=new App();
$user=$users->getUserOne($id);
foreach ($user as $row):
    ?>
    <img src="img/<?php echo $row['image'] ?>" style="width: 100px; height: 100px" class="img-thumbnail">
    <?php
    endforeach;