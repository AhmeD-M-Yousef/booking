<?php

include '../admin/function/connect.php';

if(isset($_POST['email'])){

	$email = $_POST['email'];
	$date  = date("Y-m-d h:m:s");

//to stop subscription to previous inserted email
 $select_newsletter  = "SELECT * FROM newsletter WHERE email = '$email'";
 $result_newsletter  = $connect->query($select_newsletter);
 $count = $result_newsletter->num_rows;


      	if(empty($email))  {
      		// echo "Please Insert Your Email!";
          echo "2";

      	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      		// email validation code , filter validate email
      			// echo "Please Insert Valid email address";
            echo "4";

      	}elseif($count > 0 ){
      		// email found code ,
      			// echo "mail subscribed befor";
            echo "3";
      	}else{
      		$insert_nlett = "INSERT INTO newsletter (email,N_date)
      						VALUES ('$email', '$date')";

      		$connect->query($insert_nlett);
      		// echo "subscribtion Done!";
          echo "1";
      	}



}else{

	header("location:../index.php");
}
