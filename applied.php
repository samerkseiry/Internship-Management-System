<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php
session_start();
if(isset($_SESSION['email'])) {
    $email5 = $_SESSION['email'];
    $sql5 = "SELECT username, status FROM users WHERE email='$email5'";
    $result5 = mysqli_query($connect, $sql5);
    if(mysqli_num_rows($result5) > 0) {
        $row5 = mysqli_fetch_assoc($result5);
        $username5 = $row5['username'];
    }
    
}
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
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
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
<?php include 'Fixed/header.php'; ?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">

          <div class="col-md-9 bg-white padding-2">

            <h3>Applied jobs</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Application</th>
                      <th>Experience</th>
                      <th>Date applied</th>                 
                      <th>Status</th>
                      <th>Job Title</th>
                    </thead>
                    <tbody>
                      <?php
                       $sql = "SELECT * FROM applications WHERE username= $username5";
                            $result = $connect->query($sql);

                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                              {   
                      ?>
                      <tr>
                        <td><?php echo $row['application']; ?></td>              
                        <td><?php echo $row['experience']; ?></td>
                        <td><?php echo date("d-M-Y", strtotime($row['reg_date'])); ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a href="jobtemplates.php?id=<?php echo $row['id_jobs']; ?>"><i class="fa fa-address-card-o"></i></a></td> 
                        <?php /*if($row['resume'] != '') { ?>
                        <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['firstname'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                        <?php } else { ?>
                        <td>No Resume Uploaded</td>
                        <?php } */?>
                      </tr>

                      <?php

                        }

                      } 
                                             else{
                                                ?><tr>
                                                    <td><?php
                            echo"no applied jobs found";?>
                            </tr>
                            <?php
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
<?php include 'Fixed/footer.html'; ?>

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
