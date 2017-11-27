<?php
$con=mysqli_connect("localhost","user","pass","db");

$id=$_GET['id'];

$query=mysqli_query($con,"SELECT * FROM files WHERE id='$id'");
$actualfile = mysqli_fetch_assoc($query);
unlink("filehosting/" .$actualfile['filename']);
    
mysqli_query($con,"DELETE FROM files WHERE id='$id'");
mysqli_close($con);


header("location: view_data.php");

?>
