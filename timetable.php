<?php require_once 'core/init.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Upload Timetable ||SMIS</title>
    <link rel="shortcut icon" href="src/media/favico.ico" type="image/x-icon">
  <!-- BOOTSTRAP STYLES-->
    <link href="Admin/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="Admin/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="Admin/css/custom.css" rel="stylesheet" />
    <link href="Admin/css/view.css" rel="stylesheet" />

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
                 
                       <li >
                          <a href="admin.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                      </li>
                     
                      <li>
                          <a href="students.php"><i class="fa fa-users "></i>Students</a>
                      </li>

                      <li>
                          <a href="lecture-rooms"><i class="fa fa-key "></i>Lecture Rooms</a>
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
                     <li class="active-link">
                        <a href="timetable.php"><i class="fa fa-clipboard "></i>TimeTable </a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>UPLOAD TIMETABLE</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
  
<div class="row">
   <div class="col-md-2">
    </div> 

    <div class="col-md-8">
        <div class="jumbotron bio-jumb">



   <?php           
   
       if (isset($_FILES['timetblfile'])) {
        $allowedFile =  array("docs", "DOCS", "docx", "DOCX","Pdf", "pdf","PDF");
        $upload = new Upload($_FILES['timetblfile'], "timetables/", 10000000000 ,$allowedFile);
        $timetable = $upload->GetFile();
        }
   
    if(Input::exists())
      {
   

            $timeInsert = DB::getInstance()->insert('tbltimetable', array(
              'timetable' => $timetable,
              'session' => input::get('session'),
              'level' => input::get('level'),
              'programme' =>input::get('programme'),
              'semester' =>input::get('semester'),
              'released' => date('d F Y , h:i A')

                 ));

            if($timeInsert)
            {
           ?>      
         <div class="alert alert-info text-capitalize" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="sr-only"></span> RECORDS INSERTED SUCCESSFULLY!!
          </div>
                  <script>
          setTimeout(function(){
          window.location.href= "timetable.php";
          }, 500);
        </script>
     
   <?php
      }
    }
  ?>
            <div class="container-fluid">
          <form class="form" method="POST" action="" enctype="multipart/form-data">
                  
             <div class="form-group">
                    <label style="color:red">Allowed Files(Word Document And .pdf) Only!</label>
                    <input type="file" name="timetblfile" class="form-control">
                  </div>                
      

                <div class="form-group">
                <label>SESSION</label>
         <select class="form-control" name="session">
                      <option>PLEASE CHOOSE A SESSION</option>
                      <option value="S20152016">2015/2016</option>
                      <option value="S20162017">2016/2017</option>
                      <option value="S20172018">2017/2018</option>
                      <option value="S20182019">2018/2019</option>
                    </select> 
                  </div>

                  <div class="form-group">
                    <label>SEMESTER</label>
                    <select class="form-control" name="semester">
                      <option>CHOOSE SEMESTER</option>
                    
                      <option value="1st SEMESTER">FIRST SEMESTER</option>

                      <option value="2nd SEMESTER">SECOND SEMESTER</option>
                    
                    </select> 
                </div>
              
              <div class="form-group">
                <label>LEVEL</label>
                    <select class="form-control" name="level">
                      <option>PLEASE CHOOSE LEVEL</option>
                      <option value="ND">OND</option>
                      <option value="HND">HND</option>
                    </select> 
              </div>



                <div class="form-group">
                        <label>PROGRAMME</label>
                    <select class="form-control" name="programme">
                      <option>PLEASE CHOOSE PROGRAMME</option>
                      <option value="FT">FULL TIME</option>
                      <option value="PT">PART TIME/EVENING</option>
                    </select> 
                </div>

              

            <div class="row" style="margin-top: 5%;">
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="SUBMIT">
                  </div>
                </div>

              <div class="col-md-6">
                <div class="form-group">
                    <input type="reset" class="btn btn-danger" style="float: right;" value="CANCEL">
                </div>
              </div>
            
            </div>

        </form>
            </div>
        </div>
    </div>
 <div class="col-md-2">
    </div>
</div>
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                 <div class="col-lg-12 text-center" >
                    &copy;  MOSHOOD ABIOLA POLYTECHNIC 
                </div>
          </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="Admin/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="Admin/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="Admin/js/custom.js"></script>
    
   
</body>
</html>
