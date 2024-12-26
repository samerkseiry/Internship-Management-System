<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php
session_start();

include '../function/adduser.php';
$firstname = $lastname = $username = $email = $password = $phonenumber = $address = $confirmpassword ="";
$firstname_error = $lastname_error = $username_error = $email_error = $phonenumber_error = $password_error = $confirmpassword_error = $address_error = $gender_error = $status_error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


	if (empty($_POST["firstname"])) {
	  $firstname_error = "Firstname is required";
	} else {
	  $firstname = test_input($_POST["firstname"]);
	}
	if (empty($_POST["lastname"])) {
		$lastname_error = "Lastname is required";
	} else {
		$lastname = test_input($_POST["lastname"]);
	}
  
	if (empty($_POST["username"])) {
	  $username_error = "Username is required";
	} else {
	  $username = test_input($_POST["username"]);
	}
  
	if (empty($_POST["email"])) {
	  $email_error = "Emailis required";
	} else {
	  $email = test_input($_POST["email"]);
	}
  
	if (empty($_POST["phonenumber"])) {
	  $phonenumber_error = "Phonenumber is required";
	} else {
	  $phonenumber = test_input($_POST["phonenumber"]);
	}
	if (empty($_POST["address"])) {
		$address_error = "address is required";
	  } else {
		$address = test_input($_POST["address"]);
	  }
	if (empty($_POST["password"])) {
		$password_error = "password is required";
	  } else {
		$password = test_input($_POST["password"]);
	  }
	  if (empty($_POST["confirmpassword"])) {
		$confirmpassword_error = "confirm password is required";
	  } else {
		$confirmpassword = test_input($_POST["confirmpassword"]);
		if ($confirmpassword != $password){
			$confirmpassword_error = "The password that you entered does't match";
		}
	  }
	  if (isset($_POST['gender'])){
		$gender =$_POST['gender'];
	  }
	  else{
	  $gender_error ='Gender is required';
	  }
      if (isset($_POST['status'])){
		$status =$_POST['status'];
	  }
	  else{
	  $status_error ='status is required';
	  }

	if (empty($firstname_error) && empty($lastname_error) && empty($username_error) && empty($email_error) && empty($phonenumber_error) && empty($address_error) && empty($password_error) && empty($confirmpassword_error) && empty($gender_error) && empty($status_error) ) {
	   adduser($firstname, $lastname, $username, $email, $phonenumber, $address, $password, $gender, $status);
	  header("Location: faculty.php");
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

   <link rel="stylesheet" href="../css/add-user.css">

</head>
<body>
<?php include '../Fixed/header_admin.php'; ?>
<div class="user-form">
   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="firstname" required placeholder="enter your first name" id="firstname" value="<?php echo $firstname;?>">
		    <span class="error"><?php echo $firstname_error; ?></span>

      <input type="text" name="lastname" required placeholder="enter your last name" id="lastname" value="<?php echo $lastname;?>">
			<span class="error"><?php echo $lastname_error; ?></span>

      <input type="text" name="username" required placeholder="enter your username" id="username" value="<?php echo $username;?>">
			<span class="error"><?php echo $username_error; ?></span>

			
	  <input type="radio" name="gender" id="male" value="male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male') echo 'checked'; ?>>
    	    <label for="male">Male</label>
	
	
      <input type="radio" name="gender" id="female" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female') echo 'checked'; ?>>
    	    <label for="female">Female</label>
	
    	    <span class="error"><?php echo $gender_error; ?></span>
     

      <input type="text" name="email" required placeholder="enter your RHU Email" id="email" value="<?php echo $email;?>">
            <span class="error"><?php echo $email_error; ?></span>

      <input type="number" name="phonenumber" required placeholder="enter your phone number" id="phonenumber" value="<?php echo $phonenumber;?>">
			<span class="error"><?php echo $phonenumber_error; ?></span>

      <input type="text" name="address" required placeholder="enter your address" id="address" value="<?php echo $address;?>">
			<span class="error"><?php echo $address_error; ?></span>  
    <input type="radio" name="status" id="admin" value="admin" <?php if(isset($_POST['status']) && $_POST['status'] == 'admin') echo 'checked'; ?>>
    	    <label for="admin">admin</label>
      <input type="radio" name="status" id="student" value="student" <?php if(isset($_POST['status']) && $_POST['status'] == 'student') echo 'checked'; ?>>
    	    <label for="student">student</label>
    	    <span class="error"><?php echo $status_error; ?></span>
      <input type="password" name="password" required placeholder="enter your password" id="password" value="<?php echo $password;?>"> 
			<span class="error"><?php echo $password_error; ?></span> 

       <input type="password" name="confirmpassword" required placeholder="confirm your password" id="confirmpassword" value="<?php echo $confirmpassword;?>"> 
			<span class="error"><?php echo $confirmpassword_error; ?></span> 
            

      <input type="submit" name="submit" value="register now" class="form-btn">
	  <a href="faculty.php">Cancel</a>
   </form>
	</div>
<?php include '../Fixed/footer_admin.html'; ?>
</body>
</html>