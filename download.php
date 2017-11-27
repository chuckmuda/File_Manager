<?php
$file_name=$_REQUEST['filename'];

$file_path='filehosting/'.$file_name;

output_file($file_path, $file_name);

function output_file($file_name, $name, $mime_type='')
{
    if(!is_readable($file_name)) { die('File not found or inaccessible!'); }
    
    $size = filesize($file_name);
    
    $name = rawurldecode($name);
    
    $known_mime_types=array(
    'zip' => 'application/zip',
    'png' => 'image/png',
    'PNG' => 'image/png',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
    'pdf' => 'application/pdf',
    'doc' => 'application/msword',
    'docx' => 'application/msword',
    'txt' => 'text/plain',
    'htm' => 'text/html',
    'html' => 'text/html',
    'php' => 'text/html',
    'css' => 'text/css',
    'js' => 'application/javascript',
    'json' => 'application/json',
    'xml' => 'application/xml',
    'xls' => 'application/vnd.ms-excel',
    'ppt' => 'application/vnd.ms-powerpoint',
    'pptx' => 'application/vnd.ms-powerpoint' );
    
    $file_extension = strtolower(substr(strrchr($file_name,"."),1));
    
    if(array_key_exists($file_extension, $known_mime_types))
    {
        $mime_type = $known_mime_types[$file_extension];
    }
    else
    {
        $mime_type="application/force-download";    
    }
    
    header('Content-Type: ' . $mime_type);
    header('Content-Disposition: attachment; filename="'.$name.'"');
    header("Content-Length: ".$size);
    readfile($file_name);
}

?>