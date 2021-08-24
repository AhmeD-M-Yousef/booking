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
    <title>Users</title>
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
    include "include/sidebar.php";
    include 'include/deletemodal.php';




      ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
<?php  include "include/topnav.php"; ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Users</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Admin & users</a></li>
                                    <li class="active"><a href="admins.php">Users</a></li>
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
                            <strong class="card-title">Companies details</strong>
                        <div style="position: absolute;top: 14px;left: 500px;color:red;font-weight:bold" class="error_message2">

                        </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th>id</th>
                                      <th>Username</th>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>email</th>
                                      <th>Gender</th>
                                      <th>control</th>
                                    </tr>
                                </thead>
                                <tbody class="tablebody">
<?php
include 'function/connect.php';
$select_users  = "SELECT * FROM users";
$result_users  = $connect->query($select_users);
foreach ($result_users as $row_users) {
$gender = $row_users['gender'] == 0 ? 'Male' : 'Female';

?>
                                    <tr class="tablerow<?php echo $row_users['id']; ?>"  >
                                      <td><?php echo $row_users['id'] ?></td>
                                      <td><?php echo $row_users['username'] ?></td>
                                      <td><?php echo $row_users['firstname'] ?></td>
                                      <td><?php echo $row_users['lastname'] ?></td>
                                      <td><?php echo $row_users['email'] ?></td>

                                      <td><?php echo $gender ?></td>


                                        <td>
                                          <a href="?do=edit&id=<?php echo $row_users['id'];?>" style="color:white;" class="btn btn-info btn-sm">Edit</a>
                                          <!-- delete modal button -->

                                          <button type="button" class="btn btn-danger btn-sm bu_del_user" data-toggle="modal" data-target="#deleteusermodal" data-id="<?php echo $row_users['id'];?>" data-name="<?php echo $row_users['username'];?>">
                                            delete
                                          </button>
                                        </td>
                                    </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                            <strong class="card-title">Users details</strong>
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

            $users_id   = $_GET['id'];

            $select_usr  = "SELECT * FROM users WHERE id = '$users_id' ";
            $result_usr  = $connect->query($select_usr);
            $row_usr     = $result_usr->fetch_assoc();


                  ?>
                      <div class="row">
                        <div class="col-lg-6">
                            <div style="position: relative;top: 20px;left: 18%;" class="card">
                                <div class="card-header">
                                    <strong class="card-title">Add a New company</strong>
                                </div>
                                <div class="card-body">
                                    <!-- Credit Card -->
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                    <form action="?do=edit_user" method="post" >
                                      <div class="form-group">
                                          <label style="font-weight:bold" for="cc-payment" class="control-label mb-1">Edit User  #<span style="color:red"> <?php echo $row_usr['username'];   ?></span> </label>
                                          <input id="cc-payment" name="id" type="hidden" class="form-control" value="<?php echo $row_usr['id'];   ?>" >
                                      </div>
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">UserName</label>
                                            <input id="cc-payment" name="username" type="text" class="form-control" value="<?php echo $row_usr['username'];   ?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">FirstName</label>
                                            <input id="cc-payment" name="firstname" type="text" class="form-control" value="<?php echo $row_usr['firstname'];   ?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">LastName</label>
                                            <input id="cc-payment" name="lastname" type="text" class="form-control" value="<?php echo $row_usr['lastname'];   ?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">password</label>
                                            <input id="cc-payment" name="password" type="password" class="form-control" value="<?php echo $row_usr['password']?>" >
                                        </div>

                                        <div class="form-group ">
                                            <label for="cc-name" class="control-label mb-1">email</label>
                                            <input id="cc-name" name="email" type="email" class="form-control cc-name valid" value="<?php echo $row_usr['email']?>" >
                                        </div>
                                        <div class="row">
                                          <div class="col-12 col-md-6">
                                              <label for="cc-exp" class="control-label mb-1">Select gender</label>
                                                <select name="gender" id="select" class="form-control">
                                                    <option value="">Please select</option>
                                                    <option value="0" <?php if($row_usr['gender'] == 0){echo "selected";} ?>>Male</option>
                                                    <option value="1" <?php if($row_usr['gender'] == 1){echo "selected";} ?>>Female</option>
                                                </select>
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
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->
              </div>






    <?php      }elseif($_GET['do'] == 'edit_user'){

       $id            = $_POST['id'];
       $username      = $_POST['username'];
       $firstname     = $_POST['firstname'];
       $lastname      = $_POST['lastname'];
       $email         = $_POST['email'];
       $password      = $_POST['password'];
       $hashpass       = md5($_POST['password']);
       $gender        = $_POST['gender'];
       $date          = date("Y-m-d h:m:s");

      ?>

       <div class="row">
         <div class="col-lg-6" style="height:800px" >
             <div style=" position: relative;top: 20px;left: 18%;" class="card">
                 <div class="card-header">
                     <strong class="card-title">Error</strong>
                 </div>
                 <div class="card-body">
                         <div class="card-body">
       <?php
         $edituser = array();

       if(empty($username)){
         $edituser[] = ' username can`t be empty';
       }else{
         $update_a = "UPDATE users SET username = '$username' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(empty($firstname)){
          $edituser[] = ' firstname can`t be empty';
       }else{
         $update_a = "UPDATE users SET firstname = '$firstname' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(empty($lastname)){
         $edituser[] = ' lastname can`t be empty';
       }else{
         $update_a = "UPDATE users SET lastname = '$lastname' WHERE id = '$id'";
         $connect->query($update_a);
       }

       if(!empty($password)){
         $update_a = "UPDATE users SET password = '$hashpass' WHERE id = '$id'";
         $connect->query($update_a);
       }else {
         $edituser[] = ' password can`t be empty';
       }

       if(empty($email)){
         $edituser[] = ' email can`t be empty';
       }else {
         $update_a = "UPDATE users SET email = '$email' WHERE id = '$id'";
         $connect->query($update_a);

       }

       ?>



                         <?php foreach ($edituser as $editerror) {

                                            echo "<div  class=' alert alert-danger' role='alert'>". $editerror . "</div>" ;

                                             header("refresh:3;url=users.php");

                         }

                             if(empty($edituser)){

                               $update_userss = "UPDATE users SET gender = '$gender' , U_date = '$date' WHERE id = '$id'";
                               $connect->query($update_userss);
                               echo "<div  class=' alert alert-success' role='alert'> user Updated </div>" ;
                                header( "refresh:3;url=users.php" );
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
