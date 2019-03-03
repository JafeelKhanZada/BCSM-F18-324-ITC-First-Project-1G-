<?php 
    session_start();
    include("./assets/db/connection.php");
    error_reporting(0);
?>
<div class="container-fluid MainSignUp">
    <div class="row">
        <div class="col-md-4 SignUpLeft">
            <div class="InnerContent d-flex justify-content-center align-items-center flex-column flex-wrap">
                <h1>carrino</h1>
                <ul class="Features">
                    <li><i class="fa fa-search"></i><span>Explore your favourite topics.</span></li>
                    <li><i class="fa fa-comments-o"></i><span>Create your own post and publish it.</span></li>
                    <li><i class="fa fa-thumbs-up"></i><span>Like, comments, and share the posts.</span></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 SignUpRight">
            <div class="InnerContent d-flex justify-content-center align-items-center flex-column flex-wrap">
                <h1>Create a new account.</h1>
                <form autoComplete="off" class="container" method="POST" action="">
                    <label for="Email">Email</label>
                    <br />
                    <input id="Email" name="userEmail" required autoComplete="off" type="email" placeholder="Enter Your Email...." />
                    <label for="Password">Password</label>
                    <br />
                    <input id="Password" name="userPass" required autoComplete="off" type="password" placeholder="Enter Your Password...." />
                    <label for="ConfrimPassword">Confrim Password</label>
                    <br />
                    <input id="ConfrimPassword" name="cpass" required autoComplete="off" type="password" placeholder="Enter Your Password Again...." />
                    <input class="TNC" name="terms" type="checkbox" /><span>I agree with <span>Terms&Conditions</span></span>
                    <br />
                    <button type="submit" name="submit">Sign Up</button>
                    <span><a href='Login.php' >Sign In</a></span>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if(!($_SESSION['UserId'])){
    if(isset($_POST['submit'])){
        $UserEmail = $_POST['userEmail'];
        $UserPass = $_POST['userPass'];
        $CPass = $_POST['cpass'];
        if($UserEmail != "" && $UserPass !=""){
            $ValidateQuery = "SELECT UserId FROM USERINFO WHERE UserEmail='$UserEmail'";
            $QueryResponse = mysqli_query($Connection , $ValidateQuery);
            $Result = mysqli_fetch_assoc($QueryResponse);        
            if($Result){
                echo "<script>alert('Users Email Already Exits')</script>";    
            }
            else{
                if($UserPass == $CPass){
                    $query = "INSERT INTO USERINFO (UserEmail,UserPassword) VALUES ('$UserEmail','$UserPass')";
                    $Response = mysqli_query($Connection, $query);
                    if($Response){
                        echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/Login.php'</script>";
                    }
                    else{
                        echo"<script>alert('Not Data Submited')</script>";
                    }
                }
                else{
                    echo"<script>alert('Password Does Not Matched')</script>";
                }
            }
        }
        else{
            echo"<script>alert('Filled The Filed Please!')</script>";
        }
    }
}
else{
    echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/Profile.php' </script>";
}
?>