<?php
include 'connect.php';
session_start();

$id = $_POST['id_com'];


$update_unapprove = "UPDATE company SET approve = 0 WHERE id ='$id'";
$connect->query($update_unapprove);
echo "3";



?>
