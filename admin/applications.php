<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
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
<body class="hold-transition skin-green sidebar-mini">
<?php include '../Fixed/header_admin.php'; ?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Jobs</a></li>
                  <li class="active"><a href="applications.php"><i class="fa fa-address-card-o"></i> Candidates</a></li>
                  <li><a href="faculty.php"><i class="fa fa-building"></i> Faculty</a></li>
                  <li><a href="../home.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Application Database</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>username</th>
                      <th>experience</th>
                      <th>application</th>
                      <th>date applied</th>                 
                      <th>status</th>
                      <th>confirm </th>
                      <th>reject </th>
                    </thead>
                    <tbody>
                      <?php
                       $sql = "SELECT * FROM applications";
                            $result = $connect->query($sql);

                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                              {     
                      ?>
                      <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['experience']; ?></td>
                        <td><?php echo $row['application']; ?></td>
                        <td><?php echo date("d-M-Y", strtotime($row['reg_date'])); ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a href="editstatus.php?id=<?php echo $row['id_application']; ?>&status=Confirmed">accept</a></td>
                        <td><a href="editstatus.php?id=<?php echo $row['id_application']; ?>&status=reject ">reject</a></td>   
                        <?php /*if($row['resume'] != '') { ?>
                        <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['firstname'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                        <?php } else { ?>
                        <td>No Resume Uploaded</td>
                        <?php } */?>
                      </tr>

                      <?php

                        }
                      }
                      ?>
                      
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<?php include '../Fixed/footer_admin.html'; ?>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
