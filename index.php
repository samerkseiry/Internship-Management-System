<?php
/*session_start();
// Get the username from the session
if(!isset($_SESSION['email'])) {
  header("Location: home.php");
  exit();
}
$email = $_SESSION['email'];*/
?>

<?php
session_start();
?>
<div style="display:none;">
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' ){
  if ($_GET['action'] == "logout"){
    setcookie('email', "", time() - 60 * 60 * 24 * 7);
    session_destroy();
    header("Location: index.php");
    exit();
  }
}?>
</div>
<?php
if(isset($_SESSION['email'])) {
  header("Location:home.php");
  exit();
}
  
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the email and password
    include('config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

      $sql = "SELECT email, password FROM users WHERE email='$email' && password = '$password'";

        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            // Create a cookie to store the email for one week
            setcookie('email', $email, time() + 60 * 60 * 24 * 7);
            header("Location: home.php");
            exit();
          }
         else {
          echo "Invalid email or password";
        }
    }  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="stylesheet" href="css/loginsignup.css">

</head>
<body>
   
<div class="form-container" style="background-image: url('img/background.png'); background-size: cover; background-position: center;">
<img src="img/logo.png" alt="Logo" class="logo">
   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email" id="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" />
      <input type="password" name="password" required placeholder="enter your password"> 
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="signup.php">register now</a></p>
   </form>

</div>

</body>
</html>