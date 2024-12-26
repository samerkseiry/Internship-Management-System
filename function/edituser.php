<?php
function  updateuser($id, $firstname, $lastname, $username, $phonenumber, $address, $gender){
    global $connect;
    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', phonenumber='$phonenumber', address='$address', gender='$gender'
            WHERE id=$id";
    if (mysqli_query($connect, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>