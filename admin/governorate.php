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
    <title>Gavernorate</title>
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
    include 'include/delcompanymodal.php';
    include 'include/addagov_modal.php';



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
                                <h1>Governorate</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Real estate</a></li>
                                    <li class="active"><a href="governorate.php">governorate</a></li>
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
                            <strong class="card-title">Companies details</strong>
                            <!-- Button trigger modal -->
                            <button style="position: absolute;right: 75px;top: 9px;width: 128px;color:white" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addgov_modal">
                              Add governorate
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
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody class="tablebody">
<?php
include 'function/connect.php';
$select_governorate  = "SELECT * FROM governorate";
$result_governorate  = $connect->query($select_governorate);
foreach ($result_governorate as $row_governorate) {





?>
                                    <tr class="tablerow<?php echo $row_governorate['id']; ?>"  >
                                        <td><?php echo $row_governorate['id'] ?></td>
                                        <td><?php echo $row_governorate['name'] ?></td>


                                        <td>
                                          <a href="?do=edit&id=<?php echo $row_governorate['id'];?>" style="color:white;" class="btn btn-info btn-sm">Edit</a>
                                          <!-- delete modal buuton -->

                                          <button type="button" class="btn btn-danger btn-sm bu_del_gov" data-toggle="modal" data-target="#deletegovernorate" data-id="<?php echo $row_governorate['id'];?>" data-name="<?php echo $row_governorate['name'];?>">
                                            delete
                                          </button>
                                        </td>
                                    </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <strong class="card-title">Companies details</strong>
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

            $gov_id   = $_GET['id'];

            $select_gov  = "SELECT * FROM governorate WHERE id = '$gov_id' ";
            $result_gov  = $connect->query($select_gov);
            $row_gov     = $result_gov->fetch_assoc();
                  ?>
                      <div class="row">
                        <div class="col-lg-6">
                            <div style="position: relative;top: 20px;left: 18%;" class="card">
                                <div class="card-header">
                                    <strong class="card-title">Edit Governorate</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Credit Card -->
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                    <form action="?do=edit_gov" method="post" >
                                      <div class="form-group">
                                          <label style="font-weight:bold" for="cc-payment" class="control-label mb-1">Edit Company  #<span style="color:red"> <?php echo $row_gov['name'];   ?></span> </label>
                                          <input id="cc-payment" name="id" type="hidden" class="form-control" value="<?php echo $row_gov['id'];   ?>" >
                                      </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1"> Name</label>
                                            <input id="cc-payment" name="name" type="text" class="form-control" value="<?php echo $row_gov['name'];   ?>" >
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-edit fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Edit</span>
                                                <span id="payment-button-sending" style="display:none;">Sending???</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->
              </div>


    <?php      }elseif($_GET['do'] == 'edit_gov'){

       $id        = $_POST['id'];
       $name      = $_POST['name'];
       $date      = date("Y-m-d h:m:s");

       $editgov = array();

       if(empty($name)){
         $editgov[] = ' name can`t be empty';
       }else{
         $update_a = "UPDATE governorate SET name = '$name'  WHERE id = '$id'";
         $connect->query($update_a);
       }
       ?>
       <div class="row">
         <div class="col-lg-6" style="height:800px" >
             <div style=" position: relative;top: 20px;left: 18%;" class="card">
                 <div class="card-header">
                     <strong class="card-title">Error</strong>
                 </div>
                 <div class="card-body">
                         <div class="card-body">


                         <?php foreach ($editgov as $editerror) {

                                            echo "<div  class=' alert alert-danger' role='alert'>". $editerror . "</div>" ;

                                             header("refresh:3;url=governorate.php");

                         }

                             if(empty($editgov)){

                               echo "<div  class=' alert alert-success' role='alert'> user Updated </div>" ;
                                header( "refresh:3;url=governorate.php" );
                             }?>


       </div>
       </div>
       </div>
       </div>
       </div>

  <?php }






?>
        <div class="clearfix"></div>

      <?php  include "include/footer.php";?>

    </div><!-- /#right-panel -->

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
            // for delete user modal
            var id;
            var name;
           $(document).on('click','.bu_del_gov',function(events){
             events.preventDefault();
             id = $(this).attr('data-id');
             name = $(this).attr('data-name');

             console.log(id);
             console.log(name);

             $('.del_gov_message').html('Are You Sure You want to Delete<span class="text-danger"> ' + name + '</span> !');
           });

           $(document).on('click','.btn_gov_del',function(evs){
             evs.preventDefault();
             $.post('function/deletegovernorate.php',{id:id},function(data){
                 if(data == 61){
                   $('.tablerow'+id).remove();
                   $('.error_message').show().html('<span style="color:green;" >governorate successfully Deleted</span>').fadeOut(4000);
                 }

             })

           });



           // add governorate modal
           $(document).on('click','.sendcompany',function(evnt){
             evnt.preventDefault();

             var name     = $('.name').val();

             $.post('function/addgov.php',{name:name},function(data){

               $('.errorshow2').html(data);

             })
           });
            </script>


</body>
</html>
<?php ob_end_flush(); ?>
