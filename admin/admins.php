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
    <title>Admins</title>
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

    include 'include/deletemodal.php';
    include 'include/addadmin_modal.php';



      ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
<?php  include "include/topnav.php";
      include "include/sidebar.php"; ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Admins</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Admin & users</a></li>
                                    <li class="active"><a href="admins.php">admins</a></li>
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
        <div class="animated fadeIn">
            <div class="row">

                <div  class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Admins details</strong>
                            <!-- Button trigger modal -->
                            <button style="position: absolute;right: 75px;top: 9px;width: 122px;color:white" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addadmin_modal">
                              Add admin
                            </button>
                        <div style="position: absolute;top: 14px;left: 500px;color:red;font-weight:bold" class="error_message">

                        </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Username</th>
                                        <th>email</th>
                                        <th>Gender</th>
                                        <th>Position</th>
                                        <th>control</th>
                                    </tr>
                                </thead>
                                <tbody class="tablebody">
<?php
include 'function/connect.php';
$color_id  = $_SESSION['id_name']; // for coloring the loggedin admin in the table
$select_admin  = "SELECT * FROM admin";
$result_admin  = $connect->query($select_admin);
foreach ($result_admin as $row_admin) {
$admin_pos = $row_admin['pos_id'];




?>
                                    <tr class="tablerow<?php echo $row_admin['id']; ?>" <?php if( $row_admin['id'] == $color_id ){ echo 'style="font-weight:bold;color:#00C292;"';}?> >
                                        <td><?php echo $row_admin['id'] ?></td>
                                        <td><?php echo $row_admin['username'] ?></td>
                                        <td><?php echo $row_admin['email'] ?></td>
                                        <?php $gender = $row_admin['gender'] == 0 ? 'male' : 'Female' ; ?>
                                        <td><?php echo $gender  ?></td>
<?php
$select_position  = "SELECT * FROM position WHERE id = '$admin_pos'";
$result_position  = $connect->query($select_position);
foreach ($result_position as $row_position) {


?>

                                        <td><?php echo $row_position['name'] ?></td>
<?php } ?>
                                              <td>
                                                <a href="?do=edit&id=<?php echo $row_admin['id'];?>" style="color:white;" class="btn btn-info btn-sm">Edit</a>
                                                <!-- delete modal buuton -->

                                                <button type="button" class="btn btn-danger btn-sm bu_del_admin" data-toggle="modal" data-target="#deleteadminmodal" data-id="<?php echo $row_admin['id'];?>" data-name="<?php echo $row_admin['username'];?>">
                                                  delete
                                                </button>
                                              </td>
                                    </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <strong class="card-title">Admins details</strong>
                        <div style="position: absolute;bottom: 14px;left: 500px;color:red;font-weight:bold" class="error_message">

                        </div>
                        </div>
                    </div>

                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->






<?php
          }elseif($_GET['do'] == 'edit'){

            $admin_id   = $_GET['id'];

            $select_ad  = "SELECT * FROM admin WHERE id = '$admin_id' ";
            $result_ad  = $connect->query($select_ad);
            $row_ad     = $result_ad->fetch_assoc();
            $level_ad   = $row_ad['pos_id'];
            $admin_id2   = $row_ad['id'];

            $select_pos = "SELECT * FROM position WHERE id = '$level_ad'";
            $result_pos = $connect->query($select_pos);
            $row_pos    = $result_pos->fetch_assoc();
            $admin_pos_level    = $row_pos['level'];
            $admin_pos_id       = $row_pos['id'];

            $session_pos_level  = $_SESSION['position_level'];
            $session_id         = $_SESSION['id_name'];

                    if( $session_pos_level > $admin_pos_level ){ ?>
                      <div class="row">
                        <div class="col-lg-6">
                            <div style="    position: relative;top: 20px;left: 18%;" class="card">
                                <div class="card-header">
                                    <strong class="card-title">Add a New Admin</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Credit Card -->
                                    <div id="pay-invoice">
                                        <div class="card-body">

                        <?php
                        $admin_id   = $_GET['id'];
                        $select_adm = "SELECT * FROM admin WHERE id = '$admin_id' ";
                        $result_adm = $connect->query($select_adm);
                        $row_adm    = $result_adm->fetch_assoc();



                 ?>
                                    <form action="?do=edit_user" method="post" >
                                      <div class="form-group">
                                          <label style="font-weight:bold" for="cc-payment" class="control-label mb-1">Edit Admin Id #<span style="color:red"> <?php echo $row_adm['id'];   ?></span> </label>
                                          <input id="cc-payment" name="id" type="hidden" class="form-control" value="<?php echo $row_adm['id'];   ?>" >
                                      </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">username</label>
                                            <input id="cc-payment" name="username" type="text" class="form-control" value="<?php echo $row_adm['username'];   ?>" >
                                        </div>
                                        <div class="form-group ">
                                            <label for="cc-name" class="control-label mb-1">email</label>
                                            <input id="cc-name" name="email" type="email" class="form-control cc-name valid" value="<?php echo $row_adm['email'];   ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">password</label>
                                            <input id="cc-number" name="password" type="password" class="form-control cc-number identified visa"
                                            value="<?php echo $row_adm['password'];?>" >
                                        </div>
                                        <div class="row">
                                          <div class="col-12 col-md-6">
                                              <label for="cc-exp" class="control-label mb-1">Select Position</label>
                                                <select name="position" id="select" class="form-control">
                                                    <option value="">Please select</option>
                                                    <option value="1" <?php if($row_adm['pos_id'] == 1){echo "selected";} ?>>Owner</option>
                                                    <option value="2" <?php if($row_adm['pos_id'] == 2){echo "selected";} ?>>admin</option>
                                                    <option value="3" <?php if($row_adm['pos_id'] == 3){echo "selected";} ?>>moderator</option>

                                                </select>
                                          </div>
                                            <div class="col-6">
                                                <label for="x_card_code" class="control-label mb-1">Phone number</label>
                                                <div class="input-group">
                                                    <input id="x_card_code" name="phone" type="tel" class="form-control cc-cvc" autocomplete="off" value="<?php echo $row_adm['phone'];?>">

                                                </div>

                                            </div>
                                            <div class="row form-group ">
                                                <div class="col col-md-3"><label style="margin: 19px;width: 190px;" class=" form-control-label ">Choose gender</label></div>
                                                <div class="col col-md-9">
                                                    <div class="form-check-inline form-check">
                                                        <label style="margin: 20px;padding-left: 15px;" for="inline-radio1" class="form-check-label " >
                                                            <input type="radio" id="inline-radio1" name="gender" value="0" class="form-check-input" <?php if($row_adm['gender'] == 0){echo "checked";}  ?>>Male
                                                        </label>
                                                        <label for="inline-radio2" class="form-check-label ">
                                                            <input type="radio" id="inline-radio2" name="gender" value="1" class="form-check-input" <?php if($row_adm['gender'] == 1){echo "checked";}  ?>>Female
                                                        </label>

                                                    </div>
                                                </div>

                                            </div>
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


                  <?php   }elseif($session_id == $admin_id2){
                    echo '<div class="row">
                    <div class="col-lg-6" style="height:800px" >
                        <div style=" position: relative;top: 20px;left: 18%;" class="card">
                            <div class="card-header">
                          <strong class="card-title">Alert</strong>
                          </div>
                                <div class="card-body">
                                    <div class="card-body">';
                     echo '<div  class="card-body alert alert-success" role="alert"> Can`t Edit Your Membership </div>';

                     header( "refresh:3;url=admins.php" );

                     echo '
                                     </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    ';



                      }elseif($session_pos_level == $admin_pos_level){
                                    echo '<div class="row">
                                    <div class="col-lg-6" style="height:800px" >
                                        <div style=" position: relative;top: 20px;left: 18%;" class="card">
                                            <div class="card-header">
                                          <strong class="card-title">Alert</strong>
                                          </div>
                                                <div class="card-body">
                                                    <div class="card-body">';
                                     echo '<div  class="card-body alert alert-success" role="alert"> can`t Edit an equal Membership </div>';

                                     header( "refresh:3;url=admins.php" );

                                     echo '
                                                     </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                      }else{
                        echo '<div class="row">
                        <div class="col-lg-6" style="height:800px" >
                            <div style=" position: relative;top: 20px;left: 18%;" class="card">
                                <div class="card-header">
                              <strong class="card-title">Alert</strong>
                              </div>
                                    <div class="card-body">
                                        <div class="card-body">';
                         echo '<div  class="card-body alert alert-success" role="alert"> Can`t Edit a Higher Position Member </div>';

                         header( "refresh:3;url=admins.php" );

                         echo '
                                         </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                        ';
                      }


              ?>




    <?php      }elseif($_GET['do'] == 'edit_user'){

       $id        = $_POST['id'];
       $username  = $_POST['username'];
       $password  =  $_POST['password'];
       $hashpass  =  md5($_POST['password']);
       $email     = $_POST['email'];
       $phone     = $_POST['phone'];
       $gender    = $_POST['gender'];
       $position  = $_POST['position'];
       $date      = date("Y-m-d h:m:s");

       $editform = array();

       if(empty($username)){
         $editform[] = ' username can`t be empty';
       }else{
         $update_a = "UPDATE admin SET username = '$username' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(!empty($password)){
         $update_a = "UPDATE admin SET  password = '$hashpass' WHERE id = '$id'";
         $connect->query($update_a);
       }else {
         $editform[] = ' password can`t be empty';
       }

       if(empty($phone)){
         $editform[] = ' phone can`t be empty';
       }else {
         $update_a = "UPDATE admin SET phone = '$phone' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(empty($email)){
         $editform[] = ' email can`t be empty';
       }else {
         $update_a = "UPDATE admin SET email = '$email' WHERE id = '$id'";
         $connect->query($update_a);
       }?>

       <div class="row">
         <div class="col-lg-6" style="height:800px" >
             <div style=" position: relative;top: 20px;left: 18%;" class="card">
                 <div class="card-header">
                     <strong class="card-title">Error</strong>
                 </div>
                 <div class="card-body">
                         <div class="card-body">


                         <?php foreach ($editform as $editerror) {

                                            echo "<div  class=' alert alert-danger' role='alert'>". $editerror . "</div>" ;

                                             header("refresh:3;url=admins.php");

                         }

                             if(empty($editform)){

                               $update_admins = "UPDATE admin SET gender ='$gender' , pos_id = '$position' , A_date = '$date' WHERE id = '$id'";
                               $connect->query($update_admins);
                               echo "<div  class=' alert alert-success' role='alert'> user Updated </div>" ;
                                header( "refresh:3;url=admins.php" );
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
