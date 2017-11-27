<?php
$error = "";

//include ("view_data.php");

if(isset($_POST['download_zip']))
{
    $file_folder = "filehosting/";
    
    if(extension_loaded('zip'))
    {
        if(isset($_POST['sel_files']) and count($_POST['sel_files']) > 0)
        {
            $zip = new ZipArchive();
            
            $zip_name = time().".zip";
            
            if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
            {
                $error .= "* Sorry ZIP creation failed";
            }
            foreach($_POST['sel_files'] as $filename)
            {
                $zip->addFile($file_folder.$filename);
            }
            
            $zip->close();
            
            if(file_exists($zip_name))
            {
                header('Content-type: application/zip');
                header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                readfile($zip_name);
                unlink($zip_name);
            }
            
        }
        else { $error .= "* Please select file to zip";}
    }
    else { $error .= "* You dont hae ZIP extension";}
}

if(!empty($error))
{ ?>
    <?php echo $error; ?>
<?php
}
?>