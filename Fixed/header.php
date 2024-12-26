<div style="display:none;">
<?php include 'config.php';?>
</div>
<?php
// Get the username from the database based on the email in the session
if(isset($_SESSION['email'])) {
    $email2 = $_SESSION['email'];
    $sql2 = "SELECT username, status FROM users WHERE email='$email2'";
    $result2 = mysqli_query($connect, $sql2);
    if(mysqli_num_rows($result2) > 0) {
        $row2 = mysqli_fetch_assoc($result2);
        $username2 = $row2['username'];
        $status2=$row2['status'];
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="Fixed/css/header.css">
    <script>
    function toggleLogout() {
        var logoutLinks = document.querySelectorAll("#logout-link, #admin-link");
        logoutLinks.forEach(function(logoutLink) {
            if (logoutLink.style.display === "none") {
                logoutLink.style.display = "block";
            } else {
                logoutLink.style.display = "none";
            }
        });
    }
</script>


</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="Fixed/css/logo.png" alt="My Website Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="jobs.php">Job Listing</a></li>
                <li><a href="applied.php">Applied Jobs</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="profile.php">Profile</a></li>
                
                <li><a href="#" onclick="toggleLogout();"><?php echo $username2; ?></a></li>
                <li id="logout-link" style="display:none;"><a href="index.php?action=logout">Logout</a></li>
                <?php if($status2 == 'admin'){ ?>
                <li id="admin-link"  style="display:none;"><a href="admin/dashboard.php">admin</a></li>
                <?php }?>
            </ul>
        </nav>
    </header>
</body>
</html>