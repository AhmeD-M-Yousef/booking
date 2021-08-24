<?php

include 'connect.php';



      $id        = $_POST['id'];
      $name      = $_POST['name'];
      $prop_type = $_POST['prop_type'];
      $price     = $_POST['price'];
      $room_num  = $_POST['room_number'];
      $gov       = $_POST['gov'];
      $com_name  = $_POST['com_name'];
      $desc      = $_POST['desc'];
      $date      = date("Y-m-d h:m:s");

      $image_count = count($_FILES['img']['name']);

      $editprop = array();

      if(empty($name)){
        $editprop[] = ' name can`t be empty';
      }else{
        $update_a = "UPDATE property SET name = '$name' WHERE id = '$id'";
        $connect->query($update_a);
      }

      if(empty($prop_type)){
        $editprop[] = ' prop_type can`t be empty';
      }else{
        $update_a = "UPDATE property SET prop_type = '$prop_type' WHERE id = '$id'";
        $connect->query($update_a);
      }

      if(empty($price)){
        $editprop[] = ' price can`t be empty';
      }else {
        $update_a = "UPDATE property SET price = '$price' WHERE id = '$id'";
        $connect->query($update_a);
      }
      if(empty($room_num)){
        $editprop[] = 'room_num can`t be empty';
      }else {
        $update_a = "UPDATE property SET room_number = '$room_num' WHERE id = '$id'";
        $connect->query($update_a);
      }

      if(empty($gov)){
        $editprop[] = ' gov can`t be empty';
      }else {
        $update_a = "UPDATE property SET gov_id = '$gov' WHERE id = '$id'";
        $connect->query($update_a);
      }

      if(empty($com_name)){
        $editprop[] = 'com_name can`t be selected';
      }else {
        $update_a = "UPDATE property SET com_id = '$com_name' WHERE id = '$id'";
        $connect->query($update_a);
      }
      if(empty($desc)){
       echo " ";
      }else {
        $update_a = "UPDATE property SET description = '$desc' WHERE id = '$id'";
        $connect->query($update_a);
      }
          // image code
        $image_name = array();
        $allowed    = array('gif','png' ,'jpg');

          for ($i=0; $i < $image_count ; $i++) {
            $img         = $_FILES['img']['name'][$i];
            $img_temp    = $_FILES['img']['tmp_name'][$i];
            $img_error   = $_FILES['img']['error'][$i];

            $ext = pathinfo($img, PATHINFO_EXTENSION);

            if($img_error == 0){ // if image uploaded without no error
              // this used for >> if there is no uplodaed image don`t give any error
              if(!in_array($ext,$allowed) ) {
                $num = $i+1 ;// this for making image number in loop too show the Error extension for image # 1 or # 2
                 $editprop[]= "Error extension for image" . $num;

               }else {
                 move_uploaded_file($img_temp , "../image/$img");
                 array_push($image_name, $img);
               }
            }
        }

      $image_update = implode(',',$image_name);

      $imagearray_count = count($image_name); // number of uploaded images that added to  $image_name array

            if($imagearray_count !== 0){
            $update_pro = "UPDATE property SET img = '$image_update', P_date = '$date' WHERE id = '$id'";
            $connect->query($update_pro);
            return_message('Image Updated','success');

          }

          foreach ($editprop as $editerror) {
           return_message($editerror,'danger');
         }

       if(empty($editprop)){
          return_message('Property Updated','success');

        }

                            // error function
                            function return_message($editerror,$type){
                              echo "<div  class=' alert alert-" . $type . " role='alert'>". $editerror . "</div>" ;
                            }


                        ?>
