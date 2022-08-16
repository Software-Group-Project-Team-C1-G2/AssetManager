<?php
session_start();

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}
?>