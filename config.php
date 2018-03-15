<?php
session_start();
class App
{
    public function __construct()
    {
        try {
            $this->db = new Pdo('mysql:host=localhost; dbname=phpAjax', 'root', 'password');
        } catch (PDOException $e) {
            die("Connection Problem to Database Server.");
        }
    }

    public function deleteMsg($id){
        $sql="delete from msg where id='$id'";
        $this->db->query($sql);
        echo "success";
    }
    public function uploadImg($image){
        $user_id=$_SESSION['user_id'];
        $sql="update users set image='$image' where id='$user_id'";
        $this->db->query($sql);
        echo "success";

    }
    public function getMessage(){
        $s_id=$_SESSION['user_id'];
        $r_id=$_SESSION['r_id'];
        $sql="select users.name, users.image, msg.*  from users left JOIN msg on msg.s_id=users.id where s_id='$s_id' and  r_id='$r_id' or s_id='$r_id' and  r_id='$s_id' ORDER by id desc";
        return $this->db->query($sql);
    }
    public function sendMessage($message){
        $s_id=$_SESSION['user_id'];
        $r_id=$_SESSION['r_id'];

        $sql="insert into msg (s_id, r_id, message, created_at) values ('$s_id', '$r_id', '$message', now())";
        $this->db->query($sql);
        echo "success";
    }

    public function getUserOne($id){
        $sql="select * from users where id='$id'";
        return $this->db->query($sql);
    }
   public function getAllUser(){
        $sql="select * from users";
        return $this->db->query($sql);
   }
    public function register($name, $email, $password, $password_again){
        if($password==$password_again){
            $end_password=sha1($password);
            $sql="insert into users (name, email, password, created_at) values ('$name', '$email', '$end_password', now())";
            $this->db->query($sql);
            echo "<div class='alert alert-success'>The user account have been created.</div>";

        }else{
            echo "<div class='alert alert-danger'>The password and password again must match.</div>";
        }
    }

    public function login($name, $password){
        $users="select * from users where name='$name'";
        $user=$this->db->query($users)->fetch(PDO::FETCH_ASSOC);
        if($user['name']){
            $enc_password=sha1($password);
            $old_password=$user['password'];
            if($enc_password==$old_password){
                $_SESSION['login']=$user['name'];
                $_SESSION['user_id']=$user['id'];
                echo "<div class='alert alert-success'>Login success.</div>";

            }else{
                echo "<div class='alert alert-danger'>The selected password is ivalid.</div>";

            }
        }else{
            echo "<div class='alert alert-danger'>The selected user name was not found.</div>";

        }
    }
}