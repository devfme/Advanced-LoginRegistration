<?php session_start();

if(!isset($_SESSION['lr_id'])){
    header('location:login.php');

}