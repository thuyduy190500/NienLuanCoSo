<?php session_start(); 
 
if (isset($_SESSION['user'])){
    unset($_SESSION['user']); // xóa session login
}
header('location: login.php');

?>