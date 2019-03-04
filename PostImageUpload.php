<?php
    session_start();
    include("./assets/db/Connection.php");
    $UsersId = $_SESSION["UserId"];
?>
<?php
    if(isset($_FILES['ProfileDP']['name'])){
        $FileName = $_FILES['ProfileDP']['name'];
        $TmpName = $_FILES['ProfileDP']['tmp_name'];
        $Folder = './assets/Images/PostImg/'.$FileName;
        move_uploaded_file($TmpName, $Folder);
        $query = "UPDATE POSTBLOG SET UserDp='$Folder' WHERE UserId=$UsersId";            
        $Response = mysqli_query($Connection, $query);
        if($Response){
            echo "<img src='$Folder' alt='Error'>";
        }            
        else{
            echo"Failed To Uploads";
        }
    }  
?>