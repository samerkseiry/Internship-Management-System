<div style="display:none;">
<?php include '../config.php';?>
</div>
<?php
session_start();
$idapp=$_GET["id"];
$status=$_GET["status"];
    $sql = "UPDATE applications SET status='$status'
            WHERE id_application=$idapp";
    if (mysqli_query($connect, $sql)) {
        header("Location: applications.php");
        exit();
    } else {
        return false;
    }
?>