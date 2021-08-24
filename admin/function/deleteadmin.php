<?php
include 'connect.php';
session_start();

$id = $_POST['id'];


$select_ad  = "SELECT * FROM admin WHERE id = '$id' ";
$result_ad  = $connect->query($select_ad);
$row_ad     = $result_ad->fetch_assoc();
$level_ad   = $row_ad['pos_id'];
$admin_id2   = $row_ad['id'];

$select_pos = "SELECT * FROM position WHERE id = '$level_ad'";
$result_pos = $connect->query($select_pos);
$row_pos    = $result_pos->fetch_assoc();
$admin_pos_level    = $row_pos['level'];
$admin_pos_id       = $row_pos['id'];

$session_pos_level  = $_SESSION['position_level'];
$session_id         = $_SESSION['id_name'];


        if($session_id == $admin_id2){
          echo " Can`t delete your Membership";
          }elseif($session_pos_level == $admin_pos_level) {
            echo "can`t delete an equal Membership";
          }elseif($session_pos_level >= $admin_pos_level){
            $delete_admin = "DELETE FROM admin WHERE id ='$id'";
            $connect->query($delete_admin);
            echo "1";
          }else {
          echo "Can`t delete a Higher Position Member";
          }
