<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php
session_start();
include 'function/addapplication.php';
$idjob=$_GET["id"];
$sql1 = "SELECT * FROM jobs WHERE id_jobs='$idjob'";
$result1 = $connect->query($sql1);
if($result1->num_rows > 0) 
{
  $row = $result1->fetch_assoc();
}
if(isset($_SESSION['email'])) {
    $email4 = $_SESSION['email'];
    $sql4 = "SELECT username, id FROM users WHERE email='$email4'";
    $result4 = mysqli_query($connect, $sql4);
    if(mysqli_num_rows($result4) > 0) {
        $row4 = mysqli_fetch_assoc($result4);
        $username4 = $row4['username'];
    }  
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $experience = ($_POST["experience"]);
    $application = ($_POST["application"]);
    addapplication($idjob, $username4, $experience,$application);
	  //header("Location: appliedapplication.php");
	  exit();
	}
    
	/*if (isset($_POST['submit'])) {

		if (isset($_FILES['pdf_file'][$username4]))
		{
		$file_name = $_FILES['pdf_file'][$username4];
		$file_tmp = $_FILES['pdf_file'][$username4];

		move_uploaded_file($file_tmp,"./pdf/".$file_name);

		$insertquery =
		"INSERT INTO users (filename) VALUES('$username4','$file_name')WHERE username = '$username4'";
		$iquery = mysqli_query($connect, $insertquery);
		}
		else
		{
		?>
			<div class=
			"alert alert-danger alert-dismissible
			fade show text-center">
			<a class="close" data-dismiss="alert"
				aria-label="close"></a>
			<strong>Failed!</strong>
				File must be uploaded in PDF format!
			</div>
		<?php
		}
	}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Application</title>
    <link rel="stylesheet" href="css/edit-user.css">
</head>
<body>
   <?php include 'Fixed/header.php'; ?>
  <div class="user-form">
   
    <h2>Applying for <?php echo $row['jobtitle'] ?></h2><br><br>
    <form method="POST" enctype="multipart/form-data">
  <label for="username">Username: <?php echo $username4?> </label><br><br>

  <label for="experience">Experience in this job:</label>
  <input type="number" id="experience" name="experience"></input>/Month<br><br>
  
  <label for="application">Application:</label>
  <textarea id="application" name="application"></textarea><br><br>

  <label for="CV">Add your Cv:</label>
  <input type="file" id="CV" name="CV" accept=".pdf" title="Upload PDF"><br><br>

  <input type="submit" value="Submit">
  <a href="faculty.php">Cancel</a>
</form>
</div>
    <?php include 'Fixed/footer.html'; ?>
</body>
</html>