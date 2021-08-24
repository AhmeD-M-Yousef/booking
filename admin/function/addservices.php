
<?php
include 'connect.php';

                 $name        = $_POST['names'];
                 $price       = $_POST['price'];
                 $description = $_POST['description'];


                   // validate the form
                 $adderrors =  array();
               if(empty($name)){
                 $adderrors[]= "Name can`t be empty ";
               }
               if(empty($price)){
                 $adderrors[]= "Price can`t be empty ";
               }
               if(empty($description)){
                 $adderrors[]= "Description can`t be empty ";
               }

             foreach ($adderrors as $error) {
                  return_message($error,'danger','alert');

             }?>

             <?php

                 if(empty($adderrors)){

                    $insert_serv = "INSERT INTO service (name,service_price,description)
                                        VALUES          ('$name','$price','$description')";
                     $connect->query($insert_serv);
                              return_message('Service Added successfully','success','modal');

                   }

                      //functions
                   function return_message($error,$type,$alert){
                     echo '
                               <div class="sufee-alert alert with-close alert-' . $type . ' alert-dismissible fade show col-12">'
                                   . $error .
                                   '<button type="button" class="close" data-dismiss="' . $alert . '" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                   </button>
                               </div>';
                   }
?>
