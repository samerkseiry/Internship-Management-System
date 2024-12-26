<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php
session_start();

if(!isset($_SESSION['email'])){
   header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RHU JOB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/home.css">
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
<body>
<div style="display:none;">
<?php include 'config.php';?>
</div>
  
    <?php include 'Fixed/header.php'; ?>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

<section class="content-header bg-main">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center index-head">
        <h1>All <strong>INTERNSHIP JOBS</strong> In One Place</h1>
        <p>For all Senior RHU Students</p>
        <p><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
      </div>
    </div>
  </div>
</section>

<section class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 latest-job margin-bottom-20">
        <h1 class="text-center">Latest Jobs</h1>            
        <?php 
      /* Show any 4 random job post
       * 
       * Store sql query result in $result variable and loop through it if we have any rows
       * returned from database. $result->num_rows will return total number of rows returned from database.
      */
      $sql = "SELECT * FROM jobs Order By Rand() Limit 4";
      $result = $connect->query($sql);
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
          $sql3 = "SELECT * FROM jobs WHERE id_jobs='$row[id_jobs]'";
          $result3 = $connect->query($sql3);
          if($result3->num_rows > 0) {
            while($row3 = $result3->fetch_assoc()) 
            {
         ?>
      <a href="jobtemplates.php?id=<?php echo $row['id_jobs']; ?>">
        <div class="attachment-block clearfix">
          <img class="attachment-img" src="img/photo1.png" alt="Attachment Image">
          <div class="attachment-pushed">
            <h4 class="attachment-heading"><a href="jobtemplates.php?id=<?php echo $row['id_jobs']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">$<?php echo $row['minimumsalary']; ?>/Month</span></h4>
            <div class="attachment-text">
                <div><strong><?php echo $row3['city']; ?> | <?php echo $row3['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
            </div>
          </div> 
        </div>
       </a>
      <?php
          }
        }
        }
      }
      ?>

      </div>
    </div>
  </div>
</section>

<section id="candidates" class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1>Candidates</h1>
        <p>Finding a job just got easier. Browse the jobs and apply with single mouse click.</p>            
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail candidate-img">
          <img src="img/browse.jpg" alt="Browse Jobs">
          <div class="caption">
            <h3 class="text-center">Browse Jobs</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail candidate-img">
          <img src="img/interviewed.jpeg" alt="Apply & Get Interviewed">
          <div class="caption">
            <h3 class="text-center">Apply & Get Interviewed</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail candidate-img">
          <img src="img/career.jpg" alt="Start A Career">
          <div class="caption">
            <h3 class="text-center">Start A Career</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="company" class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1>Companies</h1>
        <p>Hiring? Register your company for free, browse our talented pool, post and track job applications</p>            
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail company-img">
          <img src="img/postjob.png" alt="Browse Jobs">
          <div class="caption">
            <h3 class="text-center">Post A Job</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail company-img">
          <img src="img/manage.jpg" alt="Apply & Get Interviewed">
          <div class="caption">
            <h3 class="text-center">Manage & Track</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4">
        <div class="thumbnail company-img">
          <img src="img/hire.png" alt="Start A Career">
          <div class="caption">
            <h3 class="text-center">Hire</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="statistics" class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1>Our Statistics</h1>
      </div>
    </div>
    <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
         <?php
                  $sql = "SELECT * FROM jobs";
                  $result = $connect->query($sql);
                  if($result->num_rows > 0) {
                    $totalno = $result->num_rows;
                  } else {
                    $totalno = 0;
                  }
                ?>
          <h3><?php echo $totalno; ?></h3>

          <p>Job Offers</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-paper"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
              <?php
                  $sql = "SELECT * FROM users";
                  $result = $connect->query($sql);
                  if($result->num_rows > 0) {
                    $totalno = $result->num_rows;
                  } else {
                    $totalno = 0;
                  }
                ?>
          <h3><?php echo $totalno; ?></h3>

          <p>Registered Users</p>
        </div>
        <div class="icon">
            <i class="ion ion-briefcase"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
         <?php
                      $sql = "SELECT * FROM Applications WHERE status ='Confirmed'";
                      $result = $connect->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                ?>
          <h3><?php echo $totalno; ?></h3>

          <p>Applications Accepted</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-list"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
           <?php
                      $sql = "SELECT * FROM applications";
                      $result = $connect->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                ?>
          <h3><?php echo $totalno; ?></h3>

          <p>Total Applications</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-stalker"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  </div>
</section>

<section id="about" class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center latest-job margin-bottom-20">
        <h1>About US</h1>                      
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <img src="img/browse.jpg" class="img-responsive">
      </div>
      <div class="col-md-6 about-text margin-bottom-20">
      <p>We are a team of passionate individuals from Rafik Hariri University who are dedicated to helping RHU students find their dream job and employers find the perfect student candidate for their company.</p>

      <p>Our website offers a user-friendly platform where job seekers can easily search and apply for job openings, and employers can post job listings and manage applications by contacting the University.</p>

      <p>We strive to provide the best possible experience for both job seekers and employers, and we are constantly improving our website to meet their needs.</p>
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
<script src="js/adminlte.min.js"></script>
</body>
</html>