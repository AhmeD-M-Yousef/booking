<?php
include 'connect.php';
session_start();

$id = $_POST['id_com'];

$update_approve = "UPDATE company SET approve = 1 WHERE id ='$id'";
$connect->query($update_approve);
echo "2";



?>
