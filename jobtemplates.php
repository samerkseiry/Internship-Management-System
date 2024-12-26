<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php
session_start();
  
$sql1 = "SELECT * FROM jobs WHERE id_jobs='$_GET[id]'";
$result1 = $connect->query($sql1);
if($result1->num_rows > 0) 
{
  $row = $result1->fetch_assoc();
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
<?php include 'Fixed/header.php'; ?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">          
          <div class="col-md-9 bg-white padding-2">
            <div class="pull-left">
              <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
            </div>
            <div class="pull-right">
              <a href="jobs.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div>
              <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['city']; ?></span> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['reg_date'])); ?></p>              
            </div>
            <div>
            <label for="description">Description:</label><br>
              <?php echo stripcslashes($row['description']); ?>
            </div>
            <div>
                <label for="minimumsalary">Minimum Salary:</label>
              <?php echo stripcslashes($row['minimumsalary']); ?>
            </div>
            <div>
                <label for="maximumsalary">Maximum Salary:</label>
              <?php echo stripcslashes($row['maximumsalary']); ?>
            </div>
            <div>
                <label for="experience">Experience:</label>
              <?php echo stripcslashes($row['experience']); ?>
            </div><br>
            <div>
            <button><a href="onlineapplication.php?id=<?php echo $row['id_jobs']; ?>">Apply</a></button>
             </div>
            
          </div>
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="img/download.jpeg" alt="companylogo">
              <div class="caption text-center">
                <h3><?php echo $row['companyname']; ?></h3>
                <hr>
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
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
