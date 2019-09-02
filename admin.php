<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN || SMIS</title>
    <link rel="shortcut icon" href="src/media/favico.ico" type="image/x-icon">
	<!-- BOOTSTRAP STYLES-->
    <link href="admin/css/bootstrap.css" rel="stylesheet" />	 <link href="src/bootstrap/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
			<link href="src/animate/animate.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="src/bootstrap/css/bootstrap.min.css">


     <!-- FONTAWESOME STYLES-->
    <link href="admin/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="admin/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img class="logo" src="src/media/mapoly.jpg" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  
                </span>
            </div>
        </div>

        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="admin.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                   

                    <li>
                        <a href="students.php"><i class="fa fa-users "></i>Students</a>
                    </li>


                    <li>
                        <a href="lecture-rooms.php"><i class="fa fa-key "></i>Lecture Rooms</a>
                    </li>

                    <li>
                        <a href="offices.php"><i class="fa fa-key"></i>Offices</a>
                    </li>

                    <li>
                        <a href="labs.php"><i class="fa fa-desktop "></i>Laboratories</a>
                    </li>
                    <li>
                        <a href="attendance.php"><i class="fa fa-user "></i>Generate Attendance</a>
                    </li>
                     <li>
                        <a href="timetable.php"><i class="fa fa-clipboard "></i>TimeTable </a>
                    </li>
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                          <marquee>WELCOME ADMIN!  WELCOME ADMIN!!  WELCOME ADMIN!!!</marquee>
                      </div>

                    </div>
                </div>

                    <hr/ >
                  <!-- /. ROW  --> 
            <div class="row text-center pad-top" id="board">
                 <div class="col-md-2"></div> 
            
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                      <a href="students.php" >
                      <i class="fa fa-users fa-5x"></i>
                      <h4>STUDENTS</h4>
                      </a>
                      </div>
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                      <a href="lecture-rooms.php" >
                      <i class="fa fa-key  fa-5x"></i>
                      <h4>LECTURE ROOMS</h4>
                      </a>
                      </div>
                  </div>

                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                       <a href="offices.php" >
                       <i class="fa fa-key fa-5x"></i>
                      <h4>OFFICES</h4>
                      </a>
                      </div>
                  </div>
                  
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                  <div class="div-square">
                      <a href="labs.php" >
                      <i class="fa fa-desktop fa-5x"></i>
                      <h4>LABs</h4>
                      </a>
                      </div>
                  </div>

                 
    
              </div>
                 <!-- /. ROW  -->
                <div class="row text-center pad-top">
                 <div class="col-md-2"></div> 
                 
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
                         <i class="fa fa-clipboard fa-5x"></i>
                      <h4>ALL DOCS</h4>
                      </a>
                      </div>
                 </div>
                  


                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="attendance.php" >
                         <i class="fa fa-user fa-5x"></i>
                      <h4>Generate ATTENDANCE</h4>
                      </a>
                      </div>
                 </div>

                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="timetable.php" >
                         <i class="fa fa-clipboard fa-5x"></i>
                      <h4>TIMETABLE</h4>
                      </a>
                      </div>
                 </div>

                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
                       <i class="fa fa-gear fa-5x"></i>
                      <h4>Settings</h4>
                      </a>
                      </div> 
                  </div>




                  <!-- /. ROW  --> 
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
                        <div class="div-square text-center">
                             <a href="csc-mapoly.php" >
                         <i class="fa fa-home fa-5x"></i>
                        <h4>GOTO HOMEPAGE</h4>
                        </a>
                        </div> 
      </div>
      <div class="col-md-2"></div>
    </div>  

             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    &copy;  MOSHOOD ABIOLA POLYTECHNIC</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="admin/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
      <script src="src/bootstrap/js/bootstrap-dropdownhover.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="admin/js/custom.js"></script>
    
   
</body>
</html>
