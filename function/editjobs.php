<?php
function  updatejob($id, $jobtitle, $description, $companyname, $email, $city, $phonenumber, $minimumsalary, $maximumsalary, $experience){
    global $connect;
    $sql = "UPDATE jobs SET jobtitle='$jobtitle', description='$description', companyname='$companyname', email='$email', phonenumber='$phonenumber', city='$city', minimumsalary='$minimumsalary', maximumsalary='$maximumsalary', experience='$experience'
            WHERE id_jobs=$id";
    if (mysqli_query($connect, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>