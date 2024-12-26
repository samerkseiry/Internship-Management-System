<?php
include '../config.php';


$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$id";
if (mysqli_query($connect, $sql)) {
    header("Location: ../admin/companies.php");
    exit();
} else {
    echo "Error deleting user";
}
?>