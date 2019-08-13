<?php
session_start();
  if (!isset($_SESSION["id"]))
   {
      header("location: login.php");
   }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Techmion Birthday Blast | Birthday List</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include '../../nav/header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Birthday 
        <small> table</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Birthday Book</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
<?php
//load and initialize database class
require_once '../../api/db.class.php';
$db = new DB();

//get users from database
$con = array(
    'where' => array(
        'id' => $_SESSION["id"]
    )
);
$users = $db->getRows('customer_no',$con);

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<div class="container">
    <div class="row">
        <div class="panel panel-default users-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DOB(YYYY-MM-DD)</th>
                        <th>Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php if(!empty($users)): foreach($users as $user): ?>
                    <tr id="<?php echo $user['phone_no']; ?>">
                        <td><?php echo 'NA'; ?></td>
                        <td>
                            <span class="editSpan fname"><?php echo $user['name']; ?></span>
                            <input class="editInput fname form-control input-sm" type="text" name="name" value="<?php echo $user['name']; ?>" style="display: none;">
                        </td>
                        <td>
                            <span class="editSpan dob"><?php echo $user['dob']; ?></span>
                            <input class="editInput dob form-control input-sm" type="text" name="dob" value="<?php echo $user['dob']; ?>" style="display: none;">
                        </td>
                        <td>
                            <span class="editSpan phone_no"><?php echo $user['phone_no']; ?></span>
                            <input class="editInput phone_no form-control input-sm" type="text" name="phone_no" value="<?php echo $user['phone_no']; ?>" style="display: none;">
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-sm btn-default editBtn" style="float: none;"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>
                            </div>
                            <button type="button" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;">Save</button>
                            <button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr><td colspan="5">No user(s) found......</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include '../../nav/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
$(document).ready(function(){
    $('.editBtn').on('click',function(){
        //hide edit span
        $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
        //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        //show edit button
        $(this).closest("tr").find(".saveBtn").show();
        
    });
    
    $('.saveBtn').on('click',function(){
        var trObj = $(this).closest("tr");
        var ID = $(this).closest("tr").attr('id');
        var UID = <?php echo $_SESSION["id"];?>;
        var inputData = $(this).closest("tr").find(".editInput").serialize();
        $.ajax({
            type:'POST',
            url:'../../api/userAction.php',
            dataType: "json",
            data:'action=edit&id='+ID+'&uid='+UID+'&'+inputData,
            success:function(response){
                if(response.status == 'ok'){
                    trObj.find(".editSpan.fname").text(response.data.name);
                    trObj.find(".editSpan.dob").text(response.data.dob);
                    trObj.find(".editSpan.phone_no").text(response.data.phone_no);
                    
                    trObj.find(".editSpan.fname").text(response.data.name);
                    trObj.find(".editSpan.dob").text(response.data.dob);
                    trObj.find(".editSpan.phone_no").text(response.data.phone_no);
                    
                    trObj.find(".editInput").hide();
                    trObj.find(".saveBtn").hide();
                    trObj.find(".editSpan").show();
                    trObj.find(".editBtn").show();
                }else{
                    alert(response.msg);
                }
            }
        });
    });
    
    $('.deleteBtn').on('click',function(){
        //hide delete button
        $(this).closest("tr").find(".deleteBtn").hide();
        
        //show confirm button
        $(this).closest("tr").find(".confirmBtn").show();
        
    });
    
    $('.confirmBtn').on('click',function(){
        var trObj = $(this).closest("tr");
        var ID = $(this).closest("tr").attr('id');
        var UID = <?php echo $_SESSION["id"];?>;
        $.ajax({
            type:'POST',
            url:'../../api/userAction.php',
            dataType: "json",
            data:'action=delete&id='+ID+'&uid='+UID,
            success:function(response){
                if(response.status == 'ok'){
                    trObj.remove();
                }else{
                    trObj.find(".confirmBtn").hide();
                    trObj.find(".deleteBtn").show();
                    alert(response.msg);
                }
            }
        });
    });
});
</script>
</body>
</html>
