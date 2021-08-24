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
    <title>companies</title>
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
    include 'include/addacompany_modal.php';
    include 'include/approvemodal.php';
    include 'include/disapprovmodal.php';


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
                                <h1>Companies</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Admin & users</a></li>
                                    <li class="active"><a href="Company.php">companies</a></li>
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
        <div class="animated fadeIn ">
            <div class="row">

                <div  class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Companies details</strong>
                            <!-- Button trigger modal -->
                            <button style="position: absolute;right: 75px;top: 9px;width: 122px;color:white" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addcompany_modal">
                              Add company
                            </button>
                        <div style="position: absolute;top: 14px;left: 500px;color:red;font-weight:bold" class="error_message2">

                        </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Company Name</th>
                                        <th>Location</th>
                                        <th>email</th>
                                        <th>Company Type</th>
                                        <th>Approval</th>
                                        <th>control</th>
                                    </tr>
                                </thead>
                                <tbody class="tablebody">
<?php
include 'function/connect.php';
$select_company  = "SELECT * FROM company";
$result_company  = $connect->query($select_company);
foreach ($result_company as $row_company) {
$com_type = $row_company['type_id'];




?>
                                    <tr class="tablerow<?php echo $row_company['id']; ?>"  >
                                        <td><?php echo $row_company['id'] ?></td>
                                        <td><?php echo $row_company['name'] ?></td>
                                        <td><?php echo $row_company['location'] ?></td>
                                        <td><?php echo $row_company['email'] ?></td>
<?php
$select_type  = "SELECT * FROM com_type WHERE id = '$com_type'";
$result_type  = $connect->query($select_type);
foreach ($result_type as $row_type) {


?>

                                        <td><?php echo $row_type['name'] ?></td>
<?php } ?>
                                        <td class="approvC<?php echo $row_company["id"];?>">
                                        <?php if($row_company['approve'] == 1){?>
                                           <h2 style="color: #27ae60;border: 1px solid #27ae60;padding: 7px;font-size: 14px;display: inline-block; border-radius: 5px;font-weight: 600;">Approved</h2>
                                           <button type="button" class="btn btn-secondary btn-sm bu_disapprov_com" data-toggle="modal" data-target="#disapprovemodal" data-app="<?php echo $row_company["id"];?>" data-app-name="<?php echo $row_company["name"]?>" >
                                           Disapprove
                                         </button>
                                       <?php }else {?>
                                        <h2 style="color: red;border: 1px solid red;padding: 7px;font-size: 14px;display: inline-block; border-radius: 5px;font-weight: 600;">Disapproved</h2>
                                        <button type="button" class="btn btn-secondary btn-sm bu_approv_com" data-toggle="modal" data-target="#approvemodal" data-app="<?php echo $row_company["id"];?>"  data-app-name="<?php echo $row_company["name"]?>" >
                                           approve
                                         </button>
                                        <?php  } ?>
                                        </td>

                                        <td>
                                          <a href="?do=edit&id=<?php echo $row_company['id'];?>" style="color:white;" class="btn btn-info btn-sm">Edit</a>
                                          <!-- delete modal buuton -->

                                          <button type="button" class="btn btn-danger btn-sm bu_del_com" data-toggle="modal" data-target="#deletecompany" data-id="<?php echo $row_company['id'];?>" data-name="<?php echo $row_company['name'];?>">
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

            $company_id   = $_GET['id'];

            $select_comp  = "SELECT * FROM company WHERE id = '$company_id' ";
            $result_comp  = $connect->query($select_comp);
            $row_comp     = $result_comp->fetch_assoc();
            $company_type   = $row_comp['type_id'];
            $company_id2   = $row_comp['id'];

            $select_typ = "SELECT * FROM com_type WHERE id = '$company_type'";
            $result_typ = $connect->query($select_typ);
            $row_typ    = $result_typ->fetch_assoc();



                  ?>
                      <div class="row">
                        <div class="col-lg-6">
                            <div style="position: relative;top: 20px;left: 18%;" class="card">
                                <div class="card-header">
                                    <strong class="card-title">Edit company</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Credit Card -->
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                    <form action="?do=edit_company" method="post" >
                                      <div class="form-group">
                                          <label style="font-weight:bold" for="cc-payment" class="control-label mb-1">Edit Company  #<span style="color:red"> <?php echo $row_comp['name'];   ?></span> </label>
                                          <input id="cc-payment" name="id" type="hidden" class="form-control" value="<?php echo $row_comp['id'];   ?>" >
                                      </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Company name</label>
                                            <input id="cc-payment" name="name" type="text" class="form-control" value="<?php echo $row_comp['name'];   ?>" >
                                        </div>
                                        <div class="form-group ">
                                            <label for="cc-name" class="control-label mb-1">email</label>
                                            <input id="cc-name" name="email" type="email" class="form-control cc-name valid" value="<?php echo $row_comp['email'];   ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Location</label>
                                            <input id="cc-number" name="location" type="text" class="form-control cc-number identified visa"
                                            value="<?php echo $row_comp['location'];?>" >
                                        </div>
                                        <div class="row">
                                          <div class="col-12 col-md-6">
                                              <label for="cc-exp" class="control-label mb-1">Select Type</label>
                                                <select name="type" id="select" class="form-control">
                                                    <option value="">Please select</option>
                                                    <option value="1" <?php if($row_comp['type_id'] == 1){echo "selected";} ?>>Owner</option>
                                                    <option value="2" <?php if($row_comp['type_id'] == 2){echo "selected";} ?>>Broker</option>
                                                    <option value="3" <?php if($row_comp['type_id'] == 3){echo "selected";} ?>>Investor</option>

                                                </select>
                                          </div>
                                            <div class="col-6">
                                                <label for="x_card_code" class="control-label mb-1">Phone number</label>
                                                <div class="input-group">
                                                    <input id="x_card_code" name="phone" type="tel" class="form-control cc-cvc" autocomplete="off" value="<?php echo $row_comp['phone'];?>">

                                                </div>

                                            </div>
<br>
<br>
<br>
<br>
<br>

                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-edit fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Edit</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->
              </div>






    <?php      }elseif($_GET['do'] == 'edit_company'){

       $id        = $_POST['id'];
       $name      = $_POST['name'];
       $location  = $_POST['location'];
       $email     = $_POST['email'];
       $phone     = $_POST['phone'];
       $type      = $_POST['type'];
       $date      = date("Y-m-d h:m:s");

       $editcom = array();

       if(empty($name)){
         $editcom[] = ' name can`t be empty';
       }else{
         $update_a = "UPDATE company SET name = '$name' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(empty($location)){
         $editcom[] = ' location can`t be empty';
       }else{
         $update_a = "UPDATE company SET location = '$location' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(empty($email)){
         $editcom[] = ' email can`t be empty';
       }else {
         $update_a = "UPDATE company SET email = '$email' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(empty($phone)){
         $editcom[] = ' phone can`t be empty';
       }else {
         $update_a = "UPDATE company SET phone = '$phone' WHERE id = '$id'";
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


                         <?php foreach ($editcom as $editerror) {

                                            echo "<div  class=' alert alert-danger' role='alert'>". $editerror . "</div>" ;

                                             header("refresh:3;url=companies.php?do=edit");

                         }

                             if(empty($editform)){

                               $update_admins = "UPDATE company SET type_id = '$type' , A_date = '$date' WHERE id = '$id'";
                               $connect->query($update_admins);
                               echo "<div  class=' alert alert-success' role='alert'> user Updated </div>" ;
                                header( "refresh:3;url=companies.php" );
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


</body>
</html>
<?php ob_end_flush(); ?>
