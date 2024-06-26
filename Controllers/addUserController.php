<?php
include_once '../DatabaseConFig/connect.php';
include_once '../Models/UserModels.php';

$userModels = new UserModels($conn);

$username = $_POST['username'];
$password = $_POST['password'];
$confpassword = $_POST['confirm_password'];

if($password == $confpassword) {
    $userModels->addUser($username, $password);

    $_SESSION['alert']['message'] = "Sign up successfully.";
    $_SESSION['alert']['css'] = "alert-success text-center";
    header('location:../competition-signIn.php');
}else {
    $_SESSION['alert']['message'] = "Sign up failed.";
    $_SESSION['alert']['css'] = "alert-danger text-center";
    header('location:../competition-signUp.php');
}
?>