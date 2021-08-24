
<?php
include 'connect.php';

                 $name = $_POST['name'];


                   // validate the form
                 $adderrors =  array();
               if(empty($name)){
                 $adderrors[]= "Name can`t be empty ";
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

                    $insert_gov = "INSERT INTO governorate (name)  VALUES  ('$name')";
                     $connect->query($insert_gov);
                     echo '
                               <div class="sufee-alert alert with-close alert-success alert-dismissible fade show col-12">
                                   Governorate Added successfully
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                   </button>
                               </div>';

                   }
?>
