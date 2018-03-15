<?php
include 'config.php';

$id=$_GET['id'];

$msg=new App();
$msg->deleteMsg($id);