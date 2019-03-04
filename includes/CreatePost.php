<?php
    include("./assets/db/Connection.php");
    session_start();
    $UsersID = $_SESSION["UserId"];
?>
<div class="container-fluid MainSignUp">
    <div class="row">
        <div class="col-md-4 SignUpLeft SignUpLeft2">
            <div class="InnerContent d-flex justify-content-center align-items-center flex-column flex-wrap">
                <h1>carrino</h1>
                <ul class="Features">
                    <li><i class="fa fa-search"></i><span>Explore your favourite topics.</span></li>
                    <li><i class="fa fa-comments-o"></i><span>Create your own post and publish it.</span></li>
                    <li><i class="fa fa-thumbs-up"></i><span>Like, comments, and share the posts.</span></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 SignUpRight3 d-flex justify-content-center">
            <div class="InnerContent2 d-flex justify-content-center align-items-center flex-column flex-wrap">
                <h1>Create a post!</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="title" id="postTitle" placeholder="Enter Here Post Title......">
        			<textarea class="ckeditor" name="texteditor" id="texteditor"></textarea>
                    <input type="file" name="Files" id="ProfileDP" value="Feature Image">
                    <button type="submit" name="submit">Create Post!</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if($_SESSION["UserId"]){
    if(isset($_POST['submit'])){
            $PostTitle = $_POST["title"];
            $PostBody = $_POST["texteditor"];  
            $FileName = $_FILES['Files']['name'];
            $Dates = date("d.M.Y/D");
            echo "<script>alert('$Dates')</script>";
            $TmpName = $_FILES['Files']['tmp_name'];
            $Folder = './assets/Images/PostImg/'.$FileName;
            $Query = "INSERT INTO POSTBLOG (PostTitle,PostBody,PostDate,UserId,PostImage) VALUES ('$PostTitle','$PostBody','$Dates', '$UsersID','$Folder')"; 
            $QueryExe = mysqli_query($Connection, $Query);
            if($QueryExe){
                move_uploaded_file($TmpName, $Folder);
                echo "<script>alert('Data Are Submited')</script>";
            }
            else{
                echo "<script>alert('Data Are Failed To Submited')</script>";
            }
        }
}
else{
    echo "<script>window.location = 'http://localhost/BCSM-F18-324-ITC-First-Project-1G-/Login.php' </script>";
}
?>