<?php
include 'config.php';

$name=$_POST['name'];
$password=$_POST['password'];

$user=new App();
$user->login($name, $password);