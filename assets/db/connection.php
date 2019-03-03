<?php 
    $ServerName = "127.0.0.1";
    $UserName = "root";
    $password = "";
    $DbName = "Carrino";
    $Connection = mysqli_connect($ServerName,$UserName,$password,$DbName);
    if($Connection){
        echo'';
    }
    else{
        die("Connection Is Failed Because Of ".mysqli_connect_error());
    }
?>