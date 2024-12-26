<?php
function addjob($jobtitle, $description, $minimumsalary, $maximumsalary, $experience, $phonenumber, $companyname, $email, $city ){
    global $connect;
    $sql="INSERT INTO jobs (id_jobs, jobtitle, description, minimumsalary, maximumsalary, experience, phonenumber, companyname, email, city, reg_date) 
       VALUES (NULL, '$jobtitle', '$description', '$minimumsalary', '$maximumsalary', '$experience', '$phonenumber', '$companyname', '$email','$city', current_timestamp())";
        if (mysqli_query($connect, $sql)==TRUE){
            echo " Inserted Successfully";
        }else {
            echo " Error Inserting in the database ".$connect->error;
        }
    }
    ?>