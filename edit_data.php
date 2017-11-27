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
  background: #4C4CA5;
  background-image: -webkit-linear-gradient(top, #4C4CA5, #00007F);
  background-image: -moz-linear-gradient(top, #4C4CA5, #00007F);
  background-image: -ms-linear-gradient(top, #4C4CA5, #00007F);
  background-image: -o-linear-gradient(top, #4C4CA5, #00007F);
  background-image: linear-gradient(to bottom, #4C4CA5, #00007F);
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
  background-image: -webkit-linear-gradient(top, #00007F, #4C4CA5);
  background-image: -moz-linear-gradient(top, #00007F, #4C4CA5);
  background-image: -ms-linear-gradient(top, #00007F, #4C4CA5);
  background-image: -o-linear-gradient(top, #00007F, #4C4CA5);
  background-image: linear-gradient(to bottom, #00007F, #4C4CA5);
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
        <?php 
    $con=mysqli_connect("localhost","charliez_charlie","a1232123","charliez_hosting");
    if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
    
    $id=$_GET['id'];    
    $query=mysqli_query($con,"SELECT * FROM files WHERE id= $id");
    
    for($i=0; $get_data=mysqli_fetch_assoc($query); $i++){ ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Replace A File</h2>   
                        <h4>Select a new file to replace the file you selected</h4><br>    
                        <div class="col-md-7">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b style="color: #a70303; font-size: 17px;">File Manager - Replace A File</b>
                                </div>
                                <div class="panel-body">
                                    <form action="update_submit.php?id=<?php echo $get_data['id']; ?>" method="post" enctype="multipart/form-data">                      
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">     
                                                
                                                <div class="form-group">
                                                    <b style="color: #a70303; font-size: 14px;">Current File Name: </b>                                                
                                                        <input type="text" name="iname" value="<?php echo $get_data['iname']; ?>" />                                                
                                                </div>
                                                
                                                <div class="form-group">
                                                    <b style="color: #a70303; font-size: 14px;">Current File: </b>
                                                    <b> <?php echo $get_data['filename']; ?></b>                                              
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <b style="color: #a70303; font-size: 14px;">Replace with a new File: </b>
                                                    
                                                    <input type="file" name="file" id="file">
                                                </div>
                                               
                                                <div class="form-group">
                                                    <button class="btnd" style="margin-left:80px;" name="submit">Submit</button>
                                                </div>
<?php } mysqli_close($con);?>
                                                <div class="form-group">
                                                        <a class="btnedit" style="margin-left:70px;" href="view_data.php?">View Data</a>
                                                    </div>
<!--
                                                <div class="form-group">
                                                        <a class="btnedit" style="margin-left:65px;" href="form_upload.php?">Add New Data</a>
                                                </div>
-->
                                                
                                            </table>
                                        </div>
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
