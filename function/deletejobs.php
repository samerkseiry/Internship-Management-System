<?php
include '../config.php';


$id = $_GET['id'];
$sql = "DELETE FROM jobs WHERE id_jobs=$id";
if (mysqli_query($connect, $sql)) {
    header("Location: ../admin/active-jobs.php");
    exit();
} else {
    echo "Error deleting user";
}
?>