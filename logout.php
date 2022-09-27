<?php

// include 'config.php';
require_once ('D_Config/D_Connection.php');
  $db = new DB();

session_start();
session_unset();
session_destroy();

header('location:login.php');

?>