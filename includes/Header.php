<?php 
    include("./assets/db/Connection.php");
    session_start();
    error_reporting(0);
    $UsersId = $_SESSION['UserId'];
    // echo"<script>alert('')</script>
    if($_SESSION["UserId"]){
        $Query = "SELECT * FROM USERINFO WHERE UserId='$UsersId'";
        $QueryExe = mysqli_query($Connection, $Query);
        $Response = mysqli_fetch_assoc($QueryExe);
    }
?>
<div class="container-fluid navbar-wrapper fixed-top">
<nav class="navbar-dark navbar-expand-lg navbar container   ">
    <button type="button" data-target="#collapseNavbar" data-toggle="collapse" class="navbar-toggler">
        <span class="fa fa-bars"></span>
    </button>
    <a href="#" class="navbar-brand">Carrino</a>
    <div class="navbar-collapse collapse justify-content-between" id="collapseNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Authors</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="">About</a>
            </li>
            <?php
                if($_SESSION["UserId"]){
                    echo'
                    <li class="nav-item">
                        <a class="nav-link" href="">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profile.php"> '.$Response["UserFullName"].' </a>
                    </li>';
                }
                else{
                    echo'<li class="nav-item">
                        <a class="nav-link" href="Login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SignUp.php">Sign Up</a>
                    </li>';
                }
            ?>
        </ul>
    </div>
</nav>
</div>