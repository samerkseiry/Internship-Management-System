<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php 
session_start();


include '../function/editjobs.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jobtitle= test_input($_POST["jobtitle"]);
  $description = test_input($_POST["description"]);
  $companyname = test_input($_POST["companyname"]);
  $email = test_input($_POST["email"]);
  $phonenumber = test_input($_POST["phonenumber"]);
  $city = test_input($_POST["city"]);
  $minimumsalary = test_input($_POST["minimumsalary"]);
  $maximumsalary = test_input($_POST["maximumsalary"]);
  $experience = test_input($_POST["experience"]);

  $id = test_input($_POST["id"]);

  updatejob($id, $jobtitle, $description, $companyname, $email, $city, $phonenumber, $minimumsalary, $maximumsalary, $experience);
  header("Location: active-jobs.php");
  exit();
  
} else {
  $id = test_input($_GET["id"]);
    $sql = "SELECT * FROM jobs WHERE id_jobs=$id";
    $result = mysqli_query($connect, $sql);
    $use = mysqli_fetch_assoc($result);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
<link rel="stylesheet" href="../css/add-post.css">
</head>
<body>
<?php include '../Fixed/header_admin.php'; ?>
<div class="register-form">
	<section>
		<h2>Edit Profile</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<input type="hidden" name="id" value="<?php echo $use['id_jobs']; ?>">
            <label for="jobtitle">Job Title:</label>
            <input type="text" name="jobtitle"id="jobtitle" value="<?php echo $use['jobtitle']; ?>"><br>

            <label for="address">Description:</label>
            <input type="text" name="description" id="description" value="<?php echo $use['description']; ?>"><br>

            <label for="companyname">companyname:</label>
            <input type="text" id="companyname" name="companyname" value="<?php echo $use['companyname']; ?>"><br>

            <label for="phonenumber">Phone Number:</label>
            <input type="number" id="phonenumber" name="phonenumber" value="<?php echo $use['phonenumber']; ?>"><br>

            <label for="email">email:</label>
            <input type="text" id="email" name="email" value="<?php echo $use['email']; ?>"><br>

            <label for="city">city:</label>
            <input type="text" id="city" name="city" value="<?php echo $use['city']; ?>"><br>

            <label for="minimumsalary">minimum salary:</label>
            <input type="number" id="minimumsalary" name="minimumsalary" value="<?php echo $use['minimumsalary']; ?>"><br>

            <label for="maximumsalary">maximumsalary:</label>
            <input type="number" id="maximumsalary" name="maximumsalary" value="<?php echo $use['maximumsalary']; ?>"><br>

            <label for="experience">experience:</label>
            <input type="number" id="experience" name="experience" value="<?php echo $use['experience']; ?>"><br>

			<input type="submit" value="Save">
			<a href="active-jobs.php">Cancel</a>
		</form>
	</section>
</div>
    <?php include '../Fixed/footer_admin.html'; ?>
</body>
</html>