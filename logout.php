<?php
session_start();
if($_SESSION['employee']){
    session_unset();
}
header("location:./index.php");