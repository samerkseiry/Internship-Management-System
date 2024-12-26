<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'Fixed/header.php'; ?>
   <form action="update_profile.php" method="post">
  <label for="first_name">First Name:</label>
  <input type="text" name="first_name" value="<?php echo $row["first_name"]; ?>"><br>

  <label for="last_name">Last Name:</label>
  <input type="text" name="last_name" value="<?php echo $row["last_name"]; ?>"><br>

  <label for="email">Email:</label>
  <input type="email" name="email" value="<?php echo $row["email"]; ?>"><br>

  <label for="phone_number">Phone Number:</label>
  <input type="tel" name="phone_number" value="<?php echo $row["phone_number"]; ?>"><br>

  <label for="address">Address:</label>
  <input type="text" name="address" value="<?php echo $row["address"]; ?>"><br>

  <label for="gender">Gender:</label>
  <input type="radio" name="gender" value="male" <?php if($row["gender"]=="male") echo "checked"; ?>> Male
  <input type="radio" name="gender" value="female" <?php if($row["gender"]=="female") echo "checked"; ?>> Female<br>

  <input type="submit" value="Update Profile">
  <?php include 'Fixed/footer.html'; ?>
</form> 
</body>
</html>