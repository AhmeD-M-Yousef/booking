<?php

include '../admin/function/connect.php';

// if($_SERVER['REQUEST_METHOD'] == 'post'){


	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$date  = date("Y-m-d H:m:s");

	$select_mes  = "SELECT * FROM message WHERE message = '$message' && subject = '$subject'";
 	$result_mes  = $connect->query($select_mes);
 	$count = $result_mes->num_rows;


	if(empty($name) || empty($email) || empty($subject) || empty($message)) {
		echo "2";

		}elseif ($count > 0) {
			echo "4";

	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		// email validation code , filter validate email
			echo "3";

	}else{

		$insert_message = "INSERT INTO message (
									name,email,subject,message,M_date)
						VALUES ('$name','$email','$subject','$message','$date')";
		$connect->query($insert_message);
		echo " 1";


	}







// }else{

// 	echo 'not request';
// }
