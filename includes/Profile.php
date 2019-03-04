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
        $UserDp = $Response["UserDp"];
        $PostQuery = "SELECT * FROM POSTBLOG WHERE UserId='$UsersId'";
        $PostQueExe = mysqli_query($Connection, $PostQuery);
        $TotalResponseTitle = array();
        $TotalResponseImg = array();
        $TotalResponseDec = array();
        $TotalResponseDate = array();
        while($row = mysqli_fetch_assoc($PostQueExe)){
            array_push($TotalResponseTitle,$row["PostTitle"]);
            array_push($TotalResponseImg,$row["PostImage"]);
            array_push($TotalResponseDate,$row["PostDate"]);
            array_push($TotalResponseDec,$row["PostBody"]);
        }
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
                        <?php echo"<img src='$UserDp' alt='Erro' />"; ?>
                    </div>
                    <span><?php echo $Response['UserFullName'] ; ?></span>
                </span>
                <div class="profile-about d-flex align-items-center">
                    <span>
                        <?php echo mysqli_num_rows($PostQueExe) ?><span> Post</span>
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
        <div class="col-md-8">
        <?php
            for($x=0; $x<count($TotalResponseTitle); $x++){
                echo'<div class="col-12 blog-area d-flex flex-column flex-wrap">
                    <div><img src="'.$Response["UserDp"].'" width="50px" height="50px" style="border-radius: 50%"><span class="UserNameOnTime"> '.$Response["UserFullName"].'</span></div>
                    <span class="PostDates">'.$TotalResponseDate[$x].'</span>
                    <img src="'.$TotalResponseImg[$x].'" class="img-fluid PostImg" alt="" />
                    '.substr("$TotalResponseDec[$x]",0, 500).'........................................................'.'<br><br>
                    <button class="ReadMoreNow">Read More.</button>
                    </div>';
                }
                ?>
        </div>
</div>
</div>