<?php
include 'connect.php';
session_start();

$id = $_POST['id'];

$delete_service = "DELETE FROM service WHERE id ='$id'";
$connect->query($delete_service);
echo "66";
