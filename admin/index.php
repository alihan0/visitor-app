<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
ob_start();

if(!isset($_SESSION["admin"])){
    header("location: /admin/login.php");
}else{
    header("location: /admin/main.php");
}