<?php
ob_start();


session_start();
include 'function/connect.php';


?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Properties</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body >
    <!-- Left Panel -->

    <?php

    // include 'include/deletemodal.php';
    include 'include/deletemodal.php';
    include 'include/addprop_modal.php';



      ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
<?php  include "include/topnav.php";
include "include/sidebar.php";?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Properties</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Real estate</a></li>
                                    <li class="active"><a href="property.php">Properties</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
          // $get = isset($_GET['do']) && is_numeric($_GET['do']) ? $_GET['do'] : "";

            if(!isset($_GET['do'])){?>
    <div class="content">
        <div class="animated fadeIn kareem">
            <div class="row">

                <div  class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Property details</strong>
                            <!-- Button trigger modal -->
                            <button style="position: absolute;right: 75px;top: 9px;width: 122px;color:white" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addproperty_modal">
                              Add Property
                            </button>
                        <div style="position: absolute;top: 14px;left: 500px;color:red;font-weight:bold" class="error_message2">

                        </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Prop_type</th>
                                        <th>price</th>
                                        <th>Bedrooms</th>
                                        <th>Governorate</th>
                                        <th>Company</th>
                                        <th>Description</th>
                                        <th>Images</th>
                                        <th>control</th>
                                    </tr>
                                </thead>
                                <tbody class="tablebody">
<?php
include 'function/connect.php';
$select_property  = "SELECT * FROM property";
$result_property  = $connect->query($select_property);
foreach ($result_property as $row_property) {
$prop_type = $row_property['prop_type'];
$gov_id = $row_property['gov_id'];
$com_id = $row_property['com_id'];




?>
                                    <tr class="tablerow<?php echo $row_property['id']; ?>"  >
                                        <td><?php echo $row_property['id'] ?></td>

                                        <?php
                                         $name_show = $row_property['name'];
                                         $first10Character = substr($name_show, 0, 10); ?>
                                        <td><?php echo $first10Character;?>....</td>

                                        <?php
                                        $select_prop_type  = "SELECT * FROM prop_type WHERE id = '$prop_type'";
                                        $result_prop_type  = $connect->query($select_prop_type);
                                        foreach ($result_prop_type as $row_prop_type) {
                                        ?>
                                        <td><?php echo $row_prop_type['name'] ?></td>
                                        <?php } ?>


                                        <td><?php echo $row_property['price'] ?></td>
                                        <td><?php echo $row_property['room_number'] ?></td>


                                        <?php
                                        $select_prop_gov  = "SELECT * FROM governorate WHERE id = '$gov_id'";
                                        $result_prop_gov  = $connect->query($select_prop_gov);
                                        foreach ($result_prop_gov as $row_prop_gov) {
                                        ?>
                                        <td><?php echo $row_prop_gov['name'] ?></td>
                                        <?php } ?>

                                        <?php
                                        $select_com_type  = "SELECT * FROM company WHERE id = '$com_id'";
                                        $result_com_type  = $connect->query($select_com_type);
                                        foreach ($result_com_type as $row_com_type) {
                                        ?>
                                        <td><?php echo $row_com_type['name'] ?></td>
                                        <?php } ?>

                                        <?php
                                         $desc_show = $row_property['description'];
                                         $first10Characters = substr($desc_show, 0, 10); ?>
                                        <td><?php echo $first10Characters ?>....</td>

                                        <?php
                                         $images_show = $row_property['img'];
                                         $first10Characters = substr($images_show, 0, 10); ?>
                                        <td><?php echo $first10Characters ?> ....</td>

                                        <td>
                                          <a href="?do=edit&id=<?php echo $row_property['id'];?>" style="color:white;" class="btn btn-info btn-sm">Edit</a>
                                          <!-- delete modal buuton -->

                                          <button type="button" class="btn btn-danger btn-sm bu_del_prop" data-toggle="modal" data-target="#deleteprop_modal" data-id="<?php echo $row_property['id'];?>" data-name="<?php echo $row_property['name'];?>">
                                            delete
                                          </button>
                                        </td>
                                    </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <strong class="card-title">Property details</strong>
                        <div style="position: absolute;bottom: 14px;left: 500px;color:red;font-weight:bold" class="error_message2">

                        </div>
                        </div>
                    </div>

                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php
          }elseif($_GET['do'] == 'edit'){

            $prope_id   = $_GET['id'];

            $select_prope  = "SELECT * FROM property WHERE id = '$prope_id' ";
            $result_prope  = $connect->query($select_prope);
            $row_prope     = $result_prope->fetch_assoc();

  ?>
                      <div class="row">
                        <div class="col-lg-6">
                            <div style="position: relative;top: 20px;left: 18%;" class="card">
                                <div class="card-header">
                                    <strong class="card-title">Edit property </strong>
                                </div>
                                <div class="card-body">
                                    <div id="pay-invoice">
                            <div class="card-body">
                                    <form id="formSend2" action="" method="post" enctype="multipart/form-data" >
                                      <div class="form-group">
                                          <label style="font-weight:bold" for="cc-payment" class="control-label mb-1">Edit property  #<span style="color:red"> <?php echo $row_prope['name'];   ?></span> </label>
                                          <input id="cc-payment" name="id" type="hidden" class="form-control" value="<?php echo $row_prope['id']; ?>" >
                                      </div>
                                          <div class="form-group">
                                              <label for="cc-payment" class="control-label mb-1">Name</label>
                                              <input id="cc-payment"  type="text" class="form-control " name="name" aria-required="true" aria-invalid="false" value="<?php echo $row_prope['name']  ?>" >
                                          </div>

                                          <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label for="cc-exp" class="control-label mb-1">Select property type</label>
                                                  <select  id="select" class="form-control " name="prop_type">
                                                      <option value="">Please select</option>
                                                      <option value="1" <?php if($row_prope['prop_type'] == 1){echo "selected";} ?>>Villa</option>
                                                      <option value="2" <?php if($row_prope['prop_type'] == 2){echo "selected";} ?>>Flat</option>
                                                      <option value="3" <?php if($row_prope['prop_type'] == 3){echo "selected";} ?>>Commercial</option>
                                                  </select>
                                            </div>
                                              <div class="col-6">
                                                  <label for="x_card_code" class="control-label mb-1">Price</label>
                                                  <div class="input-group">
                                                      <input id="x_card_code"  type="text" class="form-control cc-cvc " name="price" autocomplete="off" value="<?php  echo $row_prope['price']  ?> ">
                                                  </div>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="form-group ">
                                              <label for="cc-name" class="control-label mb-1">Rooms Number</label>
                                              <input id="cc-name"  type="text" class="form-control cc-name valid " name="room_number" value="<?php echo $row_prope['room_number'] ?>">
                                          </div>

                                          <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label for="cc-exp" class="control-label mb-1">Select Governorate</label>
                                                  <select  id="select" class="form-control " name="gov">
                                                      <option value="">Please select</option>
                                                      <?php
                                                      $select_prop_gov2  = "SELECT * FROM governorate";
                                                      $result_prop_gov2  = $connect->query($select_prop_gov2);
                                                      foreach ($result_prop_gov2 as $row_prop_gov2) {
                                                      ?>
                                                      <option value="<?php echo $row_prop_gov2['id']; ?>"  <?php if($row_prope['gov_id'] == $row_prop_gov2['id']){echo "selected";}?>><?php echo $row_prop_gov2['name']; ?> </option>

                                                    <?php } ?>
                                                  </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="cc-exp" class="control-label mb-1">Select Company name</label>
                                                  <select  id="select" class="form-control " name="com_name">
                                                      <option value="">Please select</option>
                                                      <?php
                                                      $select_com_type2  = "SELECT * FROM company";
                                                      $result_com_type2  = $connect->query($select_com_type2);
                                                      foreach ($result_com_type2 as $row_com_type2) {
                                                      ?>
                                                      <option value="<?php echo $row_com_type2['id'] ?>" <?php if($row_prope['com_id'] == $row_com_type2['id']){echo "selected";}?>><?php echo $row_com_type2['name'] ?> </option>
                                                    <?php } ?>
                                                  </select>
                                            </div>


                                          </div>
                                          <br>
                                          <div class="form-group">
                                              <label for="cc-number" class="control-label mb-1">Description</label>
                                              <textarea name="desc" class="form-control desc"  rows="5" cols="80" placeholder="Enter Description"></textarea>
                                          </div>
                                          <div class="row form-group" style="border: 1px solid #ced4da;border-radius: 4px;padding: 16px 0;margin: 0;">
                                              <div class="row - col-12" >
                                                <?php
                                                $prope_image   = $row_prope['img'];
                                                $imgae_explode = explode(",",$prope_image);
                                                // explode  return an array
                                                // ************************************
                                                global $counts ; // to show only the 3 items in the loop
                                                foreach ($imgae_explode as $key_imgae) :
                                                  $counts++; // Note that first iteration is $count = 1 not 0 here.
                                                  if($counts > 3) continue; // Skip the iteration when the 3 end
                                                ?>
                                                <img class="col-4" style="width:150px;height:150px;" src="image/<?php echo $key_imgae;?>" alt="">
                                                <?php
                                                  endforeach
                                                  // ************************************
                                                ?>


                                              </div>
                                          </div>
                                          <br>
                                          <div class="row form-group" style="border: 1px solid #ced4da;border-radius: 4px;padding: 16px 0;margin: 0;">
                                                <div class="col col-md-4"><label for="file-multiple-input" class=" form-control-label">Insert Images</label></div>
                                                <div class="col-12 col-md-8"><input type="file" id="file-multiple-input" name="img[]" multiple="" class="form-control-file img"></div>
                                          </div>
                                          <br>
                                          <div  class=" col-12 errorshow3">

                                          </div>
                                    <div class="modal-footer ">
                                      <!-- <button type="button" class="btn btn-secondary btn-lg col-2" data-dismiss="modal">Close</button> -->
                                          <button id="payment-button"  class="btn btn-lg btn-info btn-block sendprop">
                                              <i class="fa fa-lock fa-lg"></i>&nbsp;
                                              <input style="background: none;border: none;color: white;" class="sendprop" type="submit" name="Send" value="Send">
                                          </button>
                                    </div>
                                </form>
                          </div>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div><!--/.col-->
              </div>

    <?php   }?>
        <div class="clearfix"></div>

      <?php  include "include/footer.php";?>

    </div><!-- /#right-panel -->

<?php
    function return_message($editerror,$type){
      echo "<div  class=' alert alert-" . $type . " role='alert'>". $editerror . "</div>" ;
    }
?>

    <!-- Right Panel -->

        <script src="assets/js/lib/data-table/datatables.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/jszip.min.js"></script>
        <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
        <script src="assets/js/init/datatables-init.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
    <script type="text/javascript">
    // add property modal whit images
    $(document).on('submit','#formSend',function(e){
      e.preventDefault();

      $.ajax ({
            type : "post",
            url: "function/addprop.php",
            data:new FormData(this),
            success : function(data){
              $('.errorshow3').html(data);
            },
            processData:false,
            contentType:false
            })

    });

    // edit property with images
    $(document).on('submit','#formSend2',function(e){
      e.preventDefault();

      $.ajax ({
            type : "post",
            url: "function/editprop.php",
            data:new FormData(this),
            success : function(data){
              $('.errorshow3').html(data);
            },
            processData:false,
            contentType:false
            })

    });
    // for delete property modal
    var id ;
    var name ;
   $(document).on('click','.bu_del_prop',function(events){
     events.preventDefault();
     id = $(this).attr('data-id');
     name = $(this).attr('data-name');

     $('.del_prop_message').html('Are You Sure You want to Delete<span class="text-danger"> ' + name + '</span> property!');
   });

   $(document).on('click','.btn_prop_confirm',function(evs){
     evs.preventDefault();
     $.post('function/deleteprop.php',{id:id},function(data){
         if(data == 60){
           $('.tablerow'+id).remove();
           $('.error_message').show().html('<span style="color:green;" >property successfully Deleted</span>').fadeOut(4000);
         }else {
           $('.error_message').show().html(data).fadeOut(4000);
         };
     })
   });

    </script>

</body>
</html>
<?php ob_end_flush(); ?>
