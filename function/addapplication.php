<?php
//include 'config.php';
function addapplication($idjob, $username4, $experience, $application){
    global $connect;
    $sql="INSERT INTO applications (id_application, id_jobs, username, experience, application, status, reg_date) 
       VALUES (NULL, '$idjob','$username4', '$experience', '$application', 'pending', current_timestamp())";
        if (mysqli_query($connect, $sql)==TRUE){
            echo " Inserted Successfully";
        }else {
            echo " Error Inserting in the database ".$connect->error;
        }
    }
    ?>