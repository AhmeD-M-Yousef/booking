
<?php
include 'connect.php';

                 $name = $_POST['name'];
                 $prop_type =$_POST['prop_type'];
                 $price = $_POST['price'];
                 $room_num = $_POST['room_num'];
                 $gov = $_POST['gov'];
                 $com_name = $_POST['com_name'];
                 $desc = $_POST['desc'];
                 $date = date("Y-m-d h:m:s");



                   // validate the form
                 $addprop_errors =  array();
               if(empty($name)){
                 $addprop_errors[]= "Name can`t be empty ";
               }
               if(empty($prop_type)){
                 $addprop_errors[]= "prop_type can`t be empty ";
               }
               if(empty($price)){
                 $addprop_errors[]= "price can`t be empty ";
               }
               if(empty($room_num)){
                 $addprop_errors[]= "room_num can`t be empty ";
               }
               if(empty($gov)){
                 $addprop_errors[]= "must choose a gov ";
               }
               if(empty($com_name)){
                 $addprop_errors[]= "must choose a com_name ";
               }
               if(empty($desc)){
                 $addprop_errors[]= "must enter a description ";
               }
               // if(strlen($_FILES["img"]['name'][0]) == 0 ){
               //  $addprop_errors[]= "must enter an image ";
               //
               // }

               // image code
                  $image_count = count($_FILES['img']['name']);
                  $image_name = array();
                  $allowed    = array('gif','png' ,'jpg');

                     for ($i=0; $i < $image_count ; $i++) {
                       $img        = $_FILES['img']['name'][$i];
                       $img_temp   = $_FILES['img']['tmp_name'][$i];
                       $img_error   = $_FILES['img']['error'][$i];


                       $ext = pathinfo($img, PATHINFO_EXTENSION);
                       if($img_error == 0 ){ // if image uploaded without no error
                         // this used for >> if there is no uplodaed image or error happens give an error
                         if(!in_array($ext,$allowed) ) {
                           $num = $i+1 ;
                            return_message("Error extension for image  $num  "  ,"danger");

                          }else {
                            move_uploaded_file($img_temp , "../image/$img");
                            array_push($image_name, $img);
                          }
                       }else {
                         $addprop_errors[]= "must insert 3 images ";
                       }


                   }

                   $image_insert = implode(',',$image_name);// to insert uploaded image names to the database with  ','



                   $imagearray_count = count($image_name); // to know the number of inserted photos in the input file
                   foreach ($addprop_errors as $error) { // to show the error loop
                                      return_message($error,'danger');
                   }

                 if(empty($addprop_errors)){
                   if($imagearray_count !== 0){
                     $insert_prop = "INSERT INTO property (name,prop_type,price,room_number,gov_id,com_id,description,img,P_date)
                                       VALUES
                               ('$name','$prop_type','$price','$room_num','$gov','$com_name','$desc','$image_insert','$date')";
                      $connect->query($insert_prop);
                       return_message("property Added successfully","success");

                   }

                 }


                   // error function
                   function return_message($error,$type){
                     echo '
                               <div class="sufee-alert alert with-close alert-' . $type . ' alert-dismissible fade show col-12">'
                                   . $error .
                                   '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">×</span>
                                   </button>
                               </div>';
                   }




?>
