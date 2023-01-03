<?php

function dbconnection()
{
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "productsdb";
    try{
        $connec = new PDO("mysql:host=$servername;dbname=$db",$username,$pass);
        // set the PDO error mode to exception
        $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connec;
       }
    catch(PDOException $e){
        echo "Connection is failed: " . $e->getMessage();
           }      
}
?>