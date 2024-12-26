<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php 
session_start();
include '../function/edituser.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $username = test_input($_POST["username"]);
  $phonenumber = test_input($_POST["phonenumber"]);
  $address = test_input($_POST["address"]);
  $gender = test_input($_POST["gender"]);

  $id = test_input($_POST["id"]);

  updateuser($id, $firstname, $lastname, $username, $phonenumber, $address, $gender);
  header("Location: faculty.php");
  exit();
  
} else {
  $id = test_input($_GET["id"]);
    $sql = "SELECT * FROM users WHERE id=$id";
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
<link rel="stylesheet" href="../css/edit-user.css">
</head>
<body>
<?php include '../Fixed/header_admin.php'; ?>
<div class="user-form">
	<section>
		<h2>Edit Profile</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<input type="hidden" name="id" value="<?php echo $use['id']; ?>">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $use['firstname']; ?>"><br>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $use['lastname']; ?>"><br>

            <label for="username">Username:</label>
            <input type="number" id="username" name="username" value="<?php echo $use['username']; ?>"><br>

            <label for="phonenumber">Phone Number:</label>
            <input type="number" id="phonenumber" name="phonenumber" value="<?php echo $use['phonenumber']; ?>"><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address"><?php echo $use['address']; ?></textarea><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male" <?php if($use['gender'] == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($use['gender'] == 'female') echo 'selected'; ?>>Female</option>
            </select><br>
			<input type="submit" value="Save">
			<a href="faculty.php">Cancel</a>
		</form>
	</section>
</div>
    <?php include '../Fixed/footer_admin.html'; ?>
</body>
</html>