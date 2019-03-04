<?php
    include("assets/db/Connection.php");
    $Query = "SELECT * FROM USERINFO WHERE UserId='$UsersId'";
        $QueryExe = mysqli_query($Connection, $Query);
        $Response = mysqli_fetch_assoc($QueryExe);
        $GenderIcon = "fa fa-".$Response['UserGender'];
        $UserDp = $Response["UserDp"];
        $PostQuery = "SELECT * FROM POSTBLOG";
        $PostQueExe = mysqli_query($Connection, $PostQuery);
        $TotalResponseTitle = array();
        $TotalResponseImg = array();
        $TotalResponseDec = array();
        $TotalResponseDate = array();
        $TotalResponseUserId = array();
        while($row = mysqli_fetch_assoc($PostQueExe)){
            array_push($TotalResponseTitle,$row["PostTitle"]);
            array_push($TotalResponseImg,$row["PostImage"]);
            array_push($TotalResponseDate,$row["PostDate"]);
            array_push($TotalResponseDec,$row["PostBody"]);
            array_push($TotalResponseUserId,$row["UserId"]);
        }
?>
<?php
for($x=0; $x<count($TotalResponseTitle); $x++){
        $Query = "SELECT * FROM USERINFO WHERE UserId='$TotalResponseUserId[$x]'";
        $QueryExe = mysqli_query($Connection, $Query);
        $Response = mysqli_fetch_assoc($QueryExe);
        $UserName = $Response["UserFullName"];
echo'<div class="col-md-12 col-lg-4 justify-content-center d-flex col-xl-4 Posts">
    <div class="content align-items-start d-flex flex-column flex-wrap justify-content-center">
        <img src="'.$TotalResponseImg[$x].'" alt="" class="img-fluid order-0">
        <span class="h5 order-1">'.$TotalResponseTitle[$x].'</span>
        <span class="order-2">By <span id="AuthorName">'.$UserName.'</span><span id="Date">--'.$TotalResponseDate[$x].'</span></span>
        <span class="order-3">'.substr("$TotalResponseDec[$x]",0, 300).'</span><br><br>
        <a href="#" class="order-4">Read More</a>
    </div>
</div>';   
}
?>