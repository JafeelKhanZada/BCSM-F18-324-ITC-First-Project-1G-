<?php 
    session_start();
    include("./assets/db/Connection.php");
    error_reporting(0);
    if($_SESSION["UserId"]){
        echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/Profile.php' </script>";
    }
?>
<div class="container-fluid MainForm">
                <div class="row">
                    <div class="col-md-6 Left-Content d-flex align-items-center justify-content-center flex-column flex-wrap">
                        <span>C</span>
                        <div class="order-0">
                            <h1>Start <br /> Blogging <br />Today.</h1>
                        </div>
                        <ul class="SocialIcons order-1">
                            <li class="fa fa-facebook"></li>
                            <li class="fa fa-instagram"></li>
                            <li class="fa fa-twitter"></li>
                            <li class="fa fa-linkedin"></li>
                        </ul>
                    </div>
                    <div class="col-md-6 Right-Content  d-flex flex-column justify-content-center">
                        <h1 class="text-center">carrino</h1>
                        <form action="" method="POST" class=" d-flex flex-column flex-wrap justify-content-center align-items-center">
                        <ul class="Input">
                            <li>
                                <i class="fa fa-user"></i>
                                <input type="email" required name="email" placeholder="      Enter Email Here..." />
                            </li>
                            <li>
                                <i class="fa fa-key"></i>
                                <input type="password" required minLength="6" name="password" placeholder="      Enter Password Here..." />
                            </li>
                            <li>
                                <span>Create Account or <span> Forget Password?</span></span>
                            </li>
                        </ul>
                        <button name="submit" id="btn-login" type="submit">Sign In</button>
                        </form>                    
                    </div>
                </div>
            </div>
<?php
    if(isset($_POST['submit'])){
        $Email = $_POST['email'];
        $Pass = $_POST['password'];
        if($Email != '' && $Pass !=''){
            $Query = "SELECT * FROM USERINFO WHERE UserEmail='$Email' && UserPassword='$Pass'";
            $QueryExe = mysqli_query($Connection, $Query);
            $Response = mysqli_num_rows($QueryExe);
            if($Response !=1){
                session_unset();
                echo "<script>alert('Enter Valid Username And Password')</script>";
            }
            else{
                $UserArray = mysqli_fetch_assoc($QueryExe);
                $UserId = $UserArray['UserId'];
                $_SESSION['UserId'] = $UserId;
                echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/Profile.php' </script>";                
            }
        }
    }
?>




