<?php
    session_start();
    include("./assets/db/Connection.php");
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
        <div class="col-md-8 SignUpRight2">
            <div class="InnerContent d-flex justify-content-center align-items-center flex-column">
                <h1>Step 2</h1>
                <form class="container d-flex align-items-start justify-content-center flex-wrap flex-column" method="POST">
                    <label id="ImageUploader" for="ProfileDP"></label>
                    <input type="file" name="ProfileDP" id="ProfileDP" />
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <br />
                    <label for="FullName">Full Name</label>
                    <br />
                    <input name="FullName" required type="text" placeholder="Enter Your Full Name...." />
                    <label for="PhoneNumber">Phone Number</label>
                    <br />
                    <input name="PhoneNumber" required type="text" placeholder="Enter Your Phone Number...." />
                    <label for="Address">Address</label>
                    <br />
                    <input name="Address" required type="text" placeholder="Enter Your Address...." />
                    <label for="">Gender</label>
                    <div>
                        <input name="gender" value="Male" type="radio">
                        <span class="gender">Male</span>                        
                        <input name="gender" value="Female" type="radio">
                        <span class="gender">Female</span>                        
                    </div>
                    <div>
                        <button class="Step2Cont" name="submit">Sign Up</button>
                        <span><a href='Login.php' >Sign In</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if($_SESSION["UserId"]){
        $UsersId = $_SESSION["UserId"];
        if(isset($_POST['submit'])){
            $FullName = $_POST['FullName'];
            $PhoneNum = $_POST['PhoneNumber'];
            $Address = $_POST['Address'];
            $Gender = $_POST['gender'];
            if($FullName !="" && $PhoneNum !="" && $Address != ""){
                $query = "UPDATE USERINFO SET UserFullName='$FullName',UserPhoneNo='$PhoneNum',UserAddress='$Address',UserGender='$Gender' WHERE UserId=$UsersId";
                $Response = mysqli_query($Connection, $query);
                if($Response){
                    echo "<script>alert('Data Are Submiited')</script>";
                }
                else{
                    echo "<script>alert('Data Not Submiited')</script>";
                    
                }
            }
        }
    }
    else{
        echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/SignUp.php' </script>";
        session_unset();
    }
?>