<?php
include 'connect.php';
session_start();

$id = $_POST['id_com'];

$delete_company = "DELETE FROM company WHERE id ='$id'";
$connect->query($delete_company);
echo "10";
