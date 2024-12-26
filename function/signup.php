<?php
function signup($firstname, $lastname, $username, $email, $phonenumber, $address, $password, $gender){
    global $connect;
    $sql="INSERT INTO users (id, username, firstname, lastname, email, phonenumber, address, password, gender, status, reg_date) 
       VALUES (NULL, '$username', '$firstname', '$lastname', '$email', '$phonenumber', '$address', '$password', '$gender','student', current_timestamp())";
        if (mysqli_query($connect, $sql)==TRUE){
            echo " Inserted Successfully";
        }else {
            echo " Error Inserting in the database ".$connect->error;
        }
    }
    ?>