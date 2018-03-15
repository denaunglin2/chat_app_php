<?php
session_start();
include 'config.php';


$message=$_POST['message'];

$msg=new App();
$msg->sendMessage($message);
