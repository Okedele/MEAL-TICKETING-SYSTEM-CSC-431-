<?php
    $hostname = "127.0.0.1";
    $db = "meal_ticketing";
    $username = "root";
    $password = "";
    try{
        $conn = new PDO("mysql:host=$hostname;dbname=$db",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $ex){
    echo "Sorry something went very wrong!";
    file_put_contents('DBerrors.txt',$ex->getMessage(),FILE_APPEND);
}
//print_r(PDO::getAvailableDrivers());
?>