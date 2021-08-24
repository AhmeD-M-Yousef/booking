<?php
include 'connect.php';
session_start();

$id = $_POST['id'];

$delete_property = "DELETE FROM property WHERE id ='$id'";
$connect->query($delete_property);
echo "60";
