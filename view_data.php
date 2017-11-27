
<?php
    include("connect.php");
    $query = $db->prepare("SELECT * FROM files");
    $query->execute();   
    $get_data=$query->fetch(PDO::FETCH_ASSOC);
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>File Management</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
.btnd {
  background: #02410b;
  background-image: -webkit-linear-gradient(top, #02410b, #08c217);
  background-image: -moz-linear-gradient(top, #02410b, #08c217);
  background-image: -ms-linear-gradient(top, #02410b, #08c217);
  background-image: -o-linear-gradient(top, #02410b, #08c217);
  background-image: linear-gradient(to bottom, #02410b, #08c217);
  -webkit-border-radius: 4;
  -moz-border-radius: 4;
  border-radius: 4px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  padding: 2px 3px 2px 3px;
  border: solid #000000 1px;
  text-decoration: none;
    margin-left: -35px;
}

.btnd:hover {
  background: #04c90b;
  background-image: -webkit-linear-gradient(top, #04c90b, #02410b);
  background-image: -moz-linear-gradient(top, #04c90b, #02410b);
  background-image: -ms-linear-gradient(top, #04c90b, #02410b);
  background-image: -o-linear-gradient(top, #04c90b, #02410b);
  background-image: linear-gradient(to bottom, #04c90b, #02410b);
  text-decoration: none;
    color: #fff;
}
.btndel {
  background: #200000;
  background-image: -webkit-linear-gradient(top, #200000, #880000);
  background-image: -moz-linear-gradient(top, #200000, #880000);
  background-image: -ms-linear-gradient(top, #200000, #880000);
  background-image: -o-linear-gradient(top, #200000, #880000);
  background-image: linear-gradient(to bottom, #200000, #880000);
  -webkit-border-radius: 4;
  -moz-border-radius: 4;
  border-radius: 4px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  padding: 2px 3px 2px 3px;
  border: solid #000000 1px;
  text-decoration: none;
    margin-right: -35px;
}

.btndel:hover {
  background: #9f3232;
  background-image: -webkit-linear-gradient(top, #9f3232, #200000);
  background-image: -moz-linear-gradient(top, #9f3232, #200000);
  background-image: -ms-linear-gradient(top, #9f3232, #200000);
  background-image: -o-linear-gradient(top, #9f3232, #200000);
  background-image: linear-gradient(to bottom, #9f3232, #200000);
  text-decoration: none;
    color: #fff;
}
.btnedit {
  background: #191900;
  background-image: -webkit-linear-gradient(top, #191900, #00007F);
  background-image: -moz-linear-gradient(top, #191900, #00007F);
  background-image: -ms-linear-gradient(top, #191900, #00007F);
  background-image: -o-linear-gradient(top, #191900, #00007F);
  background-image: linear-gradient(to bottom, #191900, #00007F);
  -webkit-border-radius: 4;
  -moz-border-radius: 4;
  border-radius: 4px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  padding: 2px 3px 2px 3px;
  border: solid #000000 1px;
  text-decoration: none;
    margin-left: 20px;
}

.btnedit:hover {
  background: #00007F;
  background-image: -webkit-linear-gradient(top, #4C4CA5, #00007F);
  background-image: -moz-linear-gradient(top, #4C4CA5, #00007F);
  background-image: -ms-linear-gradient(top, #4C4CA5, #00007F);
  background-image: -o-linear-gradient(top, #4C4CA5, #00007F);
  background-image: linear-gradient(to bottom, #4C4CA5, #00007F);
  text-decoration: none;
    color: #fff;
}
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">File Hosting</a> 
            </div>
<!--
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2017 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
-->
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li class="text-center">
                        <img src="assets/img/zip.png" class="user-image img-responsive"/>
					</li>          
                    <li>
                        <a  href="form_upload.php"><i class="fa fa-edit fa-3x"></i> Upload More Files </a>
                    </li>				   	
                </ul>               
            </div>            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>File Management</h2>   
                        <h4>All files listed below are hosted through this website<br><br>Checkboxes for downloading files in a Zip folder | Download, Edit or Delete files from your storage</h4><br>    
                        <div class="col-md-7">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b style="color: #a70303; font-size: 17px;">File Manager</b>
                                </div>
                                <div class="panel-body">
                                    <form name="zips" method="post" action="zip_download.php">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                             <thead>
                                                <tr>
                                                    <th>Zip</th>
                                                    <th>Type</th>
                                                    <th>File Name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>                                   
<?php
    while($row1=$query->fetch(PDO::FETCH_ASSOC))
    {
        $id=$row1['id'];
        $name=$row1['iname'];
        $filename=$row1['filename'];
        
        $temp = explode(".", $filename);
        $extension = end($temp);
?>
                                            <tbody>
                                                <tr>
                                                    <td align="center"><input type="checkbox" name="sel_files[]" value="<?php echo $filename ;?>" /></td>
                                                    <td><?php echo $extension ;?></td>
                                                    <td><?php echo $name ;?></td>
                                                    <td align="center"><a class="btnd" href="download.php?filename=<?php echo $filename ;?>" >Download</a>
                                                        <a class="btnedit" href="edit_data.php?id=<?php echo $id ; ?>" > Edit</a>
                                                        <a class="btndel" href="delete_data.php?id=<?php echo $id ; ?>" > Delete</a>
                                                    </td>
                                                </tr>                                       
<?php
    }
?>                                      
                                                
<!--                                                onclick="return confirm('Are you sure you want to Delete this file?');"-->
                                            </tbody>
                                        </table>
                                    </div><!--TABLE-->
                                        <input style="margin-left:35px;" class="btnd" type="submit" name="download_zip" value="Download as ZIP" />
                                        <input class="btndel" type="reset" name="reset" value="reset" />
                                    </form>
                                </div><!--TABLE PANEL BODY-->
                            </div><!--FINAL TABLE CONTAINER-->
                        </div><!--COLUMN ASSIGNMENT FOR TABLE-->
                    </div><!--PAGE INNER INNER-->
                </div><!-- /. ROW  -->          
            </div><!--  PAGE INNER  -->        
        </div><!--  PAGE WRAPPER  -->
    </div><!--  WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
