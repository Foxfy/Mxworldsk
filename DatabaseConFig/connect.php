<?php
session_start();

// connect database.
$conn = mysqli_connect('localhost','root','','xx_football_03');

// set character.
mysqli_set_charset($conn,'utf8');

// set timezone.
date_default_timezone_set('Asia/Bangkok');
?>