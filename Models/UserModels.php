<?php

class UserModels {
    private $conn;

    public function __construct($conn) {
        $this->link = $conn;
    }

    public function addUser($username, $password) {
        $hashpassword = md5($password);
        $sql = "insert into users values(NULL,'$username','$hashpassword')";
        $result = $this->link->query($sql);
        if($result) {
            return true;
        }else {
            return false;
        }
    }

    public function checkUser($username, $password) {
        $hashpassword = md5($password);
        $sql = "select * from users where username = '$username' and password = '$hashpassword'";
        $user = $this->link->query($sql)->fetch_assoc();
        if($user) {
            $_SESSION['user'] = $user;
            return true;
        }else {
            return false;
        }
    }
}

?>