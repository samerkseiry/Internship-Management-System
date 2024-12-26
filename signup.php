<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php
include 'function/signup.php';
$firstname = $lastname = $username = $email = $password = $phonenumber = $address = $confirmpassword ="";
$firstname_error = $lastname_error = $username_error = $email_error = $phonenumber_error = $password_error = $confirmpassword_error = $address_error = $gender_error ="";

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

	if (empty($firstname_error) && empty($lastname_error) && empty($username_error) && empty($email_error) && empty($phonenumber_error) && empty($address_error) && empty($password_error) && empty($confirmpassword_error) && empty($gender_error)) {
	   signup($firstname, $lastname, $username, $email, $phonenumber, $address, $password, $gender);
	  header("Location: index.php");
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

   <link rel="stylesheet" href="css/loginsignup.css">

</head>
<body>
   
<div class="form-container" style="background-image: url('img/background.png'); background-size: cover; background-position: center;">
<img src="img/logo.png" alt="Logo" class="logo">
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

      <input type="number" name="username" required placeholder="enter your ID" id="username" value="<?php echo $username;?>">
			<span class="error"><?php echo $username_error; ?></span>

	  <input type="radio" name="gender" id="male" value="male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male') echo 'checked'; ?>>
    	    <label for="male">Male</label>
      <input type="radio" name="gender" id="female" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female') echo 'checked'; ?>>
    	    <label for="female">Female</label>
    	    <span class="error"><?php echo $gender_error; ?></span>

      <input type="text" name="email" required placeholder="enter your RHU Email" id="email" value="<?php echo $email;?>">
            <span class="error"><?php echo $email_error; ?></span>
            <?php if (!empty($email) && !preg_match("/^[a-zA-Z0-9._%+-]+@students.rhu.edu.lb$/", $email)) { ?>
            <p class="alert">Please enter a valid email address ending with @students.rhu.edu.lb</p>
            <?php }?>

      <input type="number" name="phonenumber" required placeholder="enter your phone number" id="phonenumber" value="<?php echo $phonenumber;?>">
			<span class="error"><?php echo $phonenumber_error; ?></span>

      <input type="text" name="address" required placeholder="enter your address" id="address" value="<?php echo $address;?>">
			<span class="error"><?php echo $address_error; ?></span>  

      <input type="password" name="password" required placeholder="enter your password" id="password" value="<?php echo $password;?>"> 
			<span class="error"><?php echo $password_error; ?></span> 

       <input type="confirmpassword" name="confirmpassword" required placeholder="confirm your password" id="confirmpassword" value="<?php echo $confirmpassword;?>"> 
			<span class="error"><?php echo $confirmpassword_error; ?></span> 
            

      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="index.php">login now</a></p>
   </form>

</div>

</body>
</html>