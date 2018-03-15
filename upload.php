<?php
include 'config.php';
$image=$_FILES['user_img']['name'];
$tmp_img=$_FILES['user_img']['tmp_name'];

move_uploaded_file($tmp_img, "img/$image");

$user=new App();
$user->uploadImg($image);