<?php

session_start();

if(isset($_SESSION['timz'])){

          $now = time() - $_SESSION['timz'];

          if( $now > 30 ) {

            session_unset();
            session_destroy();


          }






}








 ?>
