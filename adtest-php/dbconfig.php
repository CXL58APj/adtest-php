<?php
    define ('DB_HOST','localhost');
    define ('DB_USER','adtestadmin');
    define ('DB_PASS','7Og2xoq92YYr12jt');
    define ('DB_NAME','adtestdb');

        try {
            $dbh = new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER,DB_PASS);
        }catch(PDOException $e){
            exit ("Error". $e->getMessage());
        }
?>

 