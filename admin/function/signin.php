<?php

include 'connect.php';

$username  = $_POST['username'];
$password  = md5($_POST['password']);

// select code with sql injection preventer
$select_admin  = "SELECT * FROM admin WHERE username = ? && password = ? ";
$prepare = $connect->prepare($select_admin);
$prepare->bind_param('ss', $username, $password); // ss mean username= stirng and password = string
$prepare->execute();
$result_admin  = $prepare->get_result();
$row_admin     = $result_admin->fetch_assoc();
$id_name       = $row_admin['id'];
$position_id   = $row_admin['pos_id'];
$counter       = $result_admin->num_rows;

$select_position   = "SELECT * FROM position WHERE id = '$position_id' ";
$result_position   = $connect->query($select_position);
$row_position      = $result_position->fetch_assoc();
$position_id_pos   = $row_position['id'];
$position_level    = $row_position['level'];


if($counter > 0){

      session_start();

                      if(($_POST['Remember']) == 1){
                          $_SESSION['id'] = $username;  // admin table
                          $_SESSION['id_name'] = $id_name; // admin table
                          $_SESSION['admin_pos_id'] = $position_id; // admin table ['pos_id']
                          $_SESSION['position_level'] = $position_level;

                          header('location:../index.php');

                      }else {
                         $_SESSION['id'] = $username;
                         $_SESSION['id_name'] = $id_name;
                         $_SESSION['admin_pos_id'] = $position_admin; // admin table ['pos_id']
                         $_SESSION['position_admin'] = $position_id; // position table ['id'];
                         $_SESSION['position_level'] = $position_level;
                         $time = time();
                         $_SESSION['timz'] = $time;

                          header('location:../index.php');
                      }



}else {
    header('location:../login.php');
};






?>
