<?php
include 'connect.php';
session_start();

$id = $_POST['id'];

$delete_users = "DELETE FROM users WHERE id ='$id'";
$connect->query($delete_users);
echo "20";
