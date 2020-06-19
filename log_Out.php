<?php
include 'config.php';
if(isset($_GET["log_out"]) && !empty($_GET["log_out"])){
    session_unset();
session_destroy();
header("Location:login.php");
}