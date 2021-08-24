
<?php
include 'connect.php';

                 $username = $_POST['username'];
                 $password =$_POST['password'];
                 $hashpass  =  md5($_POST['password']);
                 $email = $_POST['email'];
                 $phone = $_POST['phone'];
                 $gender = $_POST['ismale'];
                 $position = $_POST['position'];
                 $date = date("Y-m-d h:m:s");

                   // validate the form
                 $formerrors =  array();
               if(empty($username)){
                 $formerrors[]= "username can`t be empty ";
               }
               if(empty($password)){
                 $formerrors[]= "password can`t be empty ";
               }
               if(empty($email)){
                 $formerrors[]= "email can`t be empty ";
               }
               if(empty($phone)){
                 $formerrors[]= "phone can`t be empty ";
               }
               if(empty($position)){
                 $formerrors[]= "must choose  position ";
               }

             foreach ($formerrors as $error) {
               replay_message($error,'danger','alert');
             }

               if(empty($formerrors)){

                    $insert_admins = "INSERT INTO admin (username,password,email,phone,gender,pos_id,A_date)
                                      VALUES
                                            ('$username','$hashpass','$email','$phone','$gender','$position','$date')";
                     $connect->query($insert_admins);
                            replay_message('user Added successfully','success','modal');

                   }



           // function
          function replay_message($error,$type,$data_dismiss){
            echo '
                      <div class="sufee-alert alert with-close alert-' . $type . ' alert-dismissible fade show col-12">'
                          . $error .
                          '<button type="button" class="close" data-dismiss="' . $data_dismiss . '" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>';
           }
?>
