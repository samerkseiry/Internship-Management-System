<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php
session_start();
include '../function/addjob.php';
$jobtitle = $description = $minimumsalary = $maximumsalary = $experience = $phonenumber = $companyname = $email = $city ="";
$jobtitle_error = $description_error = $minimumsalary_error = $maximumsalary_error = $experience_error = $city_error = $email_error = $phonenumber_error = $companyname_error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


	if (empty($_POST["jobtitle"])) {
	  $jobtitle_error = "Job Title is required";
	} else {
	  $jobtitle = test_input($_POST["jobtitle"]);
	}
	if (empty($_POST["description"])) {
		$description_error = "Description is required";
	} else {
		$description = test_input($_POST["Description"]);
	}
  
	if (empty($_POST["minimumsalary"])) {
	  $minimumsalary_error = "Minimum Salary is required";
	} else {
	  $minimumsalary = test_input($_POST["minimumsalary"]);
	}
  
	if (empty($_POST["maximumsalary"])) {
	  $maximumsalary_error = "Maximum Salary required";
	} else {
	  $maximumsalary = test_input($_POST["maximumsalary"]);
	}
  
	if (empty($_POST["phonenumber"])) {
	  $phonenumber_error = "Phonenumber is required";
	} else {
	  $phonenumber = test_input($_POST["phonenumber"]);
	}
	if (empty($_POST["city"])) {
		$city_error = "city is required";
	  } else {
		$city = test_input($_POST["city"]);
	  }
      if (empty($_POST["companyname"])) {
		$companyname_error = "companyname is required";
	  } else {
		$companyname = test_input($_POST["companyname"]);
	  }
      if (empty($_POST["experience"])) {
		$experience_error = "experience is required";
	  } else {
		$experience = test_input($_POST["experience"]);
	  }
      if (empty($_POST["email"])) {
		$email_error = "email is required";
	  } else {
		$email = test_input($_POST["email"]);
	  }

	if (empty($jobtitle_error) && empty($email_error) && empty($experience_error) && empty($city_error) && empty($phonenumber_error) && empty($companyname_error) && empty($maximumsalary_error) && empty($minimumsalary_error) && empty($description_error) ) {
	   addjob($jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $phonenumber, $companyname, $email, $city );
	  header("Location: active-jobs.php");
	  exit();
	}
  }
  function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <link rel="stylesheet" href="../css/add-post.css">

</head>
<body>
<?php include '../Fixed/header_admin.php'; ?>
<div class="register-form">
   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <label for="jobtitle">Job Title:</label>
      <input type="text" name="jobtitle" required placeholder="enter Job Title" id="jobtitle" value="<?php echo $jobtitle;?>">
		    <span class="error"><?php echo $jobtitle_error; ?></span><br>

            <label for="address">Description:</label>
      <input type="text" name="description" required placeholder="enter description for the job" id="description" value="<?php echo $description;?>">
			<span class="error"><?php echo $description_error; ?></span><br>

            <label for="address">Company Name:</label>
      <input type="text" name="companyname" required placeholder="enter Company Name" id="companyname" value="<?php echo $companyname;?>">
			<span class="error"><?php echo $companyname_error; ?></span><br>

            <label for="address">Company Email:</label>
      <input type="text" name="email" required placeholder="enter Company Email" id="email" value="<?php echo $email;?>">
            <span class="error"><?php echo $email_error; ?></span><br>

            <label for="address">Company phone:</label>
      <input type="number" name="phonenumber" required placeholder="enter Company phone number" id="phonenumber" value="<?php echo $phonenumber;?>">
			<span class="error"><?php echo $phonenumber_error; ?></span><br>

            <label for="address">City:</label>
      <input type="text" name="city" required placeholder="enter Job City" id="city" value="<?php echo $city;?>">
			<span class="error"><?php echo $city_error; ?></span> <br> 

            <label for="address">Minimum Salary:</label>
      <input type="number" name="minimumsalary" required placeholder="enter Minimum Salary " id="minimumsalary" value="<?php echo $minimumsalary;?>"> 
			<span class="error"><?php echo $minimumsalary_error; ?></span> <br>

            <label for="address">Maximum Salary:</label>
       <input type="number" name="maximumsalary" required placeholder="enter Maximum Salary" id="maximumsalary" value="<?php echo $maximumsalary;?>"> 
	         <span class="error"><?php echo $maximumsalary_error; ?></span> <br>

             <label for="address">Experience:</label>
        <input type="number" name="experience" required placeholder="enter Experience" id="experience" value="<?php echo $maximumsalary;?>"> 
		    <span class="error"><?php echo $maximumsalary_error; ?></span><br>
            

      <input type="submit" name="submit" value="register now" class="form-btn">
	  <a href="active-jobs.php">Cancel</a>
   </form>
	</div>

<?php include '../Fixed/footer_admin.html'; ?>
</body>
</html>