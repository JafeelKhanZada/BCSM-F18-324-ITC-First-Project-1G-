<?php
    session_start();
    include("./assets/db/Connection.php");
    session_unset();
    echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/Login.php' </script>";    
?>