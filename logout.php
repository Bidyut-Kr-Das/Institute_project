<?php 
include("connection/connection.php");
session_start();
unset($_SESSION['id']);
session_destroy();
@header("location:index.php?msg=successfully logged out");
?>