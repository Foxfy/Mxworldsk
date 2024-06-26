<?php
include_once '../DatabaseConFig/connect.php';
include_once '../Models/UserModels.php';

$userModels = new UserModels($conn);

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $userModels->checkUser($username, $password);

    $_SESSION['alert']['message'] = "Sign In successfully.";
    $_SESSION['alert']['css'] = "alert-success text-center";
    header('location:../competition-index.php');
}

catch(Exception $e) {
    $_SESSION['alert']['message'] = "Sign In failed.";
    $_SESSION['alert']['css'] = "alert-danger text-center";
    header('location:../competition-signIn.php');
}
?>