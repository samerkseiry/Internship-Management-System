<div style="display:none;">
<?php include 'config.php';?>
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
  
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
		$(document).ready(function() {
			$("#filter").on("input", function() {
				var filter = $(this).val();
				$.ajax({
					url: "function/filter.php",
					method: "GET",
					data: {filter: filter},
					success: function(data) {
						$("#data").html(data);
					}
				});
			});
		});
	</script>


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
  <link rel="stylesheet" href="css/custom.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">


<?php include 'Fixed/header.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center">Latest Jobs</h1>  
            <div class="input-group input-group-lg">
                <input type="text" id="filter" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Filters</h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> City <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href=""  class="citySearch" data-target="Beirut"><i class="fa fa-circle-o text-yellow"></i> Beirut</a></li>
                      <li><a href="" class="citySearch" data-target="Saida"><i class="fa fa-circle-o text-yellow"></i> Saida</a></li>
                    </ul>
                  </li>
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> Experience <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href="" class="experienceSearch" data-target='1'><i class="fa fa-circle-o text-yellow"></i> > 1 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='2'><i class="fa fa-circle-o text-yellow"></i> > 2 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='3'><i class="fa fa-circle-o text-yellow"></i> > 3 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='4'><i class="fa fa-circle-o text-yellow"></i> > 4 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='5'><i class="fa fa-circle-o text-yellow"></i> > 5 Years</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">

          <?php

      // Set the limit of job posts per page
$limit = 4;

// Get the current page number from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $limit;

// Get the search term and filter from the URL
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Build the SQL query based on the search term and filter
$sql = "SELECT * FROM jobs";
if ($search != '') {
    $search = mysqli_real_escape_string($connect, $search);
    if ($filter == 'city') {
        $sql .= " WHERE location LIKE '%$search%'";
    } else if ($filter == 'experience') {
        $sql .= " WHERE experience >= $search";
    } else {
        $sql .= " WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    }
}
//$sql = " ORDER BY id DESC LIMIT $limit OFFSET $offset";

// Execute the SQL query
$result = $connect->query($sql);

// Get the total number of job posts
$sql_count = "SELECT COUNT(id_jobs) AS id_jobs FROM jobs";
if ($search != '') {
    if ($filter == 'city') {
        $sql_count .= " WHERE location LIKE '%$search%'";
    } else if ($filter == 'experience') {
        $sql_count .= " WHERE experience >= $search";
    } else {
        $sql_count .= " WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    }
}
$result_count = $connect->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_records = $row_count['id_jobs'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $limit);
?>
<div id ="data">
    <?php
// Display the job posts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="jobtemplates.php?id='.$row['id_jobs'].'>';
        echo '<div class="job-post">';
        echo '<h2>' . $row['jobtitle'] . '</h2>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<p><strong>Location:</strong> ' . $row['city'] . '</p>';
        echo '<p><strong>Experience:</strong> ' . $row['experience'] . ' years</p>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo '<p>No job posts found.</p>';
}

// Display the pagination links
if ($total_pages > 1) {
    echo '<div class="text-center">';
    echo '<ul class="pagination text-center" id="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page) ? 'active' : '';
        echo '<li class="' . $active . '"><a href="#" data-page="' . $i . '">' . $i . '</a></li>';
    }
    echo '</ul>';
    echo '</div>';
}
?>
</div>
        <div id="target-content">

        </div>
        <div class="text-center">
          <ul class="pagination text-center" id="pagination"></ul>
        </div> 



      </div>
    </div>
  </div>
</section>
    

  </div>
    
    <?php include 'Fixed/footer.html'; ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>

</body>
</html>
