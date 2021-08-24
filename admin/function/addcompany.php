
<?php
include 'connect.php';

                 $name = $_POST['name'];
                 $location =$_POST['location'];
                 $email = $_POST['email'];
                 $phone = $_POST['phone'];
                 $type = $_POST['type'];
                 $date = date("Y-m-d h:m:s");

                   // validate the form
                 $adderrors =  array();
               if(empty($name)){
                 $adderrors[]= "Name can`t be empty ";
               }
               if(empty($location)){
                 $adderrors[]= "location can`t be empty ";
               }
               if(empty($email)){
                 $adderrors[]= "email can`t be empty ";
               }
               if(empty($phone)){
                 $adderrors[]= "phone can`t be empty ";
               }
               if(empty($type)){
                 $adderrors[]= "must choose a type ";
               }




             foreach ($adderrors as $error) {

                                echo '
                                          <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-12">'
                                              . $error .
                                              '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">×</span>
                                              </button>
                                          </div>';



             }?>

             <?php

                 if(empty($adderrors)){

                    $insert_companys = "INSERT INTO company (name,location,email,phone,type_id,C_date)
                                      VALUES
                                                        ('$name','$location','$email','$phone','$type','$date')";
                     $connect->query($insert_companys);
                     echo '
                               <div class="sufee-alert alert with-close alert-success alert-dismissible fade show col-12">
                                   Company Added successfully
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                   </button>
                               </div>';

                   }
?>
