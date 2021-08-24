<?php
include 'connect.php';
session_start();

$id = $_POST['id'];

$delete_gov = "DELETE FROM governorate WHERE id ='$id'";
$connect->query($delete_gov);
echo "61";
