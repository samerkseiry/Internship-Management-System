<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php 
    session_start();
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];

        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', phonenumber='$phonenumber', address='$address', gender='$gender' WHERE email='$email'";
        if(mysqli_query($connect, $query)) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/edit-user.css">
</head>
<body>
    <?php include 'Fixed/header.php'; ?>
    <div class="user-form">
        <h2>Edit Profile</h2>
        <form method="POST" action="editprofile.php">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>"><br>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>"><br>

            <label for="username">Username:</label>
            <input type="number" id="username" name="username" value="<?php echo $row['username']; ?>"><br>

            <label for="phonenumber">Phone Number:</label>
            <input type="number" id="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber']; ?>"><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address"><?php echo $row['address']; ?></textarea><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male" <?php if($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
            </select><br>

            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>
    <?php include 'Fixed/footer.html'; ?>
</body>
</html>