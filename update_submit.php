<?php
if(isset($_REQUEST['submit']))
{
    //echo "got into statement";
    $con=mysqli_connect("localhost","user","pass","dbname");
    
    $id=$_GET['id'];
    
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
       if(empty($_REQUEST['iname']))
    {
        echo "File Name Required!";
    }
    else{
        $iname=$_REQUEST['iname'];
        mysqli_query($con,"UPDATE files SET iname='$iname' WHERE id='$id'");
    }
    
    if($_FILES){
    $file=$_FILES["file"]["name"];
    $size=$_FILES["file"]["size"];
    
    

    
    if($size >5000000)
    {
        echo "<label>Image size must not be greater than 5MB</label";
    }
    
    $allowedExts = array("gif", "jpeg", "jpg", "png", "txt", "html", "pdf", "doc", "docx", "pptx", "PNG");
    
    $temp = explode(".", $_FILES["file"]["name"]);
    
    $extension = end($temp);
    
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "text/plain")
    || ($_FILES["file"]["type"] == "text/html")
    || ($_FILES["file"]["type"] == "application/pdf")
    || ($_FILES["file"]["type"] == "application/msword")
    || ($_FILES["file"]["type"] == "application/vnd.ms-powerpoint"))
    && ($_FILES["file"]["size"] <= 5000000)
    && in_array($extension, $allowedExts))
    {
        //echo $iname.$file.$size;
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        }
        elseif (file_exists("filehosting/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . "Image upload already exists! ";
        }
        
        else
        {
//            echo $iname.$file.$size;
            
            $query = mysqli_query($con,"SELECT filename FROM files WHERE id='$id'");
            $finame = mysqli_fetch_assoc($query);
            unlink("filehosting/" .$finame['filename']);
            
            move_uploaded_file($_FILES["file"]["tmp_name"], "filehosting/" .  $_FILES["file"]["name"] );
            
//            mysqli_query($con,"UPDATE files SET filename = '$file', iname = '$iname', WHERE id='$id'");
            mysqli_query($con,"UPDATE files SET filename = '$file' WHERE id='$id'");
            header("Location:view_data.php");
        }}}
mysqli_close($con);    
}   ?>  
