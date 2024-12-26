<?php 
$host = "localhost";
$user = "root";
$password = "";
$database_name = "Joblisting";
$datatable_name_1 = "Student";
$datatable_name_2 = "JOBS"; 
$datatable_name_3 = "Application";
$connect = new mysqli($host, $user, $password);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
else{
    echo 'connected';
}


if(!mysqli_select_db($connect,$database_name)){
    echo"Database does'not exists";
    $sql=" CREATE DATABASE ".$database_name;
    if ($connect->query($sql)==TRUE){
        echo " database created Successfully";
    }else {
        echo " Error creating database ".$connect->error;
    }
}
else {
    echo "database already exists";
}

$connect = new mysqli($host, $user, $password, $database_name);
   
    $sql = " SHOW TABLE LIKE ".$datatable_name_1;
    if ($connect->query($sql)==True){
        echo "Table exist";
    }
    else{
        echo "Table does not exists";
        $sql ="CREATE TABLE users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            phonenumber INT (8), 
            address VARCHAR(30) ,
            password VARCHAR(16) NOT NULL,
            gender VARCHAR(10),
            cv varchar(255),
            status VARCHAR(15) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
                if ($connect->query($sql)==TRUE){
                    echo " Table created Successfully";
                    $sql = "INSERT INTO users (username, firstname, lastname, email, password, status) VALUES ('admin', 'admin', 'admin', 'admin@rhu.edu.lb', '123456', 'admin')";
                    if ($connect->query($sql) == true){
                    echo "Default admin created successfully";
                    }
                    else{
                    echo "Error creating default admin: " . $connect->error;
                    }
                }else {
                    echo " Error creating Table ".$connect->error;
                }
    }

    $sql = " SHOW TABLE LIKE ".$datatable_name_2;
    if ($connect->query($sql)==True){
        echo "Table exist";
    }
    else{
        echo "Table dose not exists";
        $sql = "CREATE TABLE JOBS (
            id_jobs INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            jobtitle VARCHAR(50) NOT NULL,
            description VARCHAR(100) NOT NULL,
            minimumsalary INT(10),
            maximumsalary INT(10),
            experience INT(10),
            companyname VARCHAR(30),
            phonenumber INT(20),
            email VARCHAR(20),
            city VARCHAR(30),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
                if ($connect->query($sql)==TRUE){
                    echo " Table created Successfully";
                }else {
                    echo " Error creating Table ".$connect->error;
                }
    }

    $sql = " SHOW TABLE LIKE ".$datatable_name_3;
    if ($connect->query($sql)==True){
        echo "Table exist";
    }
    else{
        echo "Table dose not exists";
        $sql = "CREATE TABLE Applications (
            id_application INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_jobs INT(6),
            username INT(10),
            experience INT(10),
            application VARCHAR(255) NOT NULL,
            status VARCHAR(20),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
                if ($connect->query($sql)==TRUE){
                    echo " Table created Successfully";
                }else {
                    echo " Error creating Table ".$connect->error;
                }
    }
    ?>