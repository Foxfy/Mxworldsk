<?php
include_once '../DatabaseConFig/connect.php';

$_SESSION = '';
session_destroy();
header('location:../competition-index.php');
?>