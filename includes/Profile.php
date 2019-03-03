<?php
    session_start();
    include("./assets/db/Connection.php");
    $UsersId= $_SESSION["UserId"];
?>
<?php
    if($_SESSION["UserId"]){
        $Query = "SELECT * FROM USERINFO WHERE UserId='$UsersId'";
        $QueryExe = mysqli_query($Connection, $Query);
        $Response = mysqli_fetch_assoc($QueryExe);
        $GenderIcon = "fa fa-".$Response['UserGender'];
        if($Response["UserFullName"] == ""){
            echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/ProfileSetting.php' </script>";
        }
    }
    else{
    echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/Login.php' </script>";
    }
?>
<div class="container-fluid Main">
    <div class="row">
        <div class="col-12 coverImg"></div>
    </div>
        <div class="row ProfileDetail d-flex align-items-center justify-content-center">
            <div class="col-sm-12 col-xs-12 col-md-10 col-lg-10 col-xl-10 d-flex flex-row flex-wrap justify-content-sm-center justify-content-lg-between ">
                <span>
                    <div class="ProfileDp">
                        <img src="./img/Cover.jpg" alt="">
                    </div>
                    <span><?php echo $Response['UserFullName'] ; ?></span>
                </span>
                <div class="profile-about d-flex align-items-center">
                    <span>
                        92<span> Post</span>
                    </span>
                    <span>
                        302<span> Likes</span>
                    </span>
                    <span>
                        430<span> Comments</span>
                    </span>
                    <a class="LogOut" href="LogOut.php"><i class="fa fa-sign-out"></i></a>
                </div>
            </div>
    </div>
    <div class="row d-flex align-items-start justify-content-between">
        <div class="col-md-4 info-area">
        <ul class="profile-info">
            <li><i class="fa fa-info-circle"></i>Personal Info</li>
            <li><i class="fa fa-envelope"></i><?php echo $Response['UserEmail']; ?></li>
            <li><i class="fa fa-mobile"></i><?php echo $Response['UserPhoneNo']; ?></li>
            <li><i class="fa fa-map-marker"></i><?php echo $Response['UserAddress']; ?></li>
            <li><?php echo"<i class='".$GenderIcon."'></i>"; echo $Response['UserGender']; ?></li>
            <li><i class="fa fa-check-circle"></i>Verified</li>
            <li><i class="fa fa-info"></i><a href="ProfileSetting.php">Update Profile</a></li>
        </ul>
        </div>
        <div class="col-md-8 blog-area d-flex flex-column flex-wrap">
            <div><img src="./img/Cover.jpg" width="50px" height="50px" alt="User" /><span>Jafeel KhanZada</span></div>
            <img src="./img/Cover.JPG" class="img-fluid PostImg" alt="" />
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>        
            <button>Read More.</button>
        </div>
    </div>
</div>
