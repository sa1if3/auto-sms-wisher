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
  <script type="text/javascript">
function post()
{
  var msg_db = document.getElementById('Inputmsg1').value;
  if(msg)
  {
    $.ajax
    ({
      type: 'post',
      url: '../../api/add_msg.php',
      data: 
      {
         msg1:msg
      },
      success: function (response) 
      {
          document.getElementById("status").innerHTML="<div class='alert alert-success'>Birthday Wish has been <strong>Saved!</strong></div>";
          window.setTimeout(function(){location.reload()},6000);
      }
    });
  }
  
  return false;
}
  </script>

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
        Wish 
        <small> table</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wish Book</li>
      </ol>
    </section>
    <!--Modal Starts-->
<div id="feedback-modal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<a class="close" data-dismiss="modal">×</a>
<h3>Birthday Message</h3>
</div>
<div class="modal-body">
<form class="feedback" name="feedback" action=" " method=" " onsubmit="return post();">
<strong>Message</strong>
<br/>
<textarea name="message" class="input-xlarge"></textarea>
</form>
</div>
<div class="modal-footer">
<button class="btn btn-success" id="submit" onclick="return post();">Save</button>
<a href="#" class="btn" data-dismiss="modal">Close</a>
</div>
</div>
</div>
</div>
    <!--Modal Ends-->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <p id="status"></p>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Wish Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Message</th>
                  <th>Sender ID</th>
                  <th>Option</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php include '../../api/msg_table.php';?>
                </tbody>
                <tfoot>
                <tr>
                  
                  <th>Message</th>
                  <th>Sender ID</th>
                  <th>Option</th>
                </tr>
                </tfoot>
              </table>

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
</body>
</html>
