<?php

include 'connect.php';
session_start();

if(isset($_POST['policy'])){




        $username = $_POST['username'];
        $password = $_POST['password'];
        $shpass = md5($_POST['password']);
        $email = $_POST['email'];
        $gender = $_POST['gender'];

          $formerrors = array();

          if(empty($username)){
            $formerrors[] = "must enter a username";
          }
          if(empty($password)){
            $formerrors[] = "must enter a password";
          }
          if(empty($email)){
            $formerrors[] = "must enter an email";
          }

          foreach ($formerrors as $errors) {
          echo "<div  class='alert alert-danger' role='alert'>". $errors . '</div>' ;
          }

          if(empty($formerrors)){
            $insert_admin = "INSERT INTO admin (username , email , password , gender)
                                VALUES ('$username','$email','$shpass','$gender')";
            $connect->query($insert_admin);

            $_SESSION['id'] = $username;
            $_SESSION['id_name'] = $id_name;

              header('location:../index.php');

            }

}else {
  echo "must agree the policy";
}















 ?>
