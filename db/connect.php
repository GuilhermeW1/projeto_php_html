<?php

include('config.php');


try{
    $con = new PDO('mysql:host' .DATABASE_HOST . ';port=3306;dbname=' .DATABASE_NAME, DATABASE_USER, 
    DATABASE_PASSWORD);

    return $con;

}catch(PDOException $e){
    echo 'erro ao conectar aoç mysql: ' .$e->getMessage();
}