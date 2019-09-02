<?php  require_once 'core/init.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	   <title>UPLOAD STUDENTS || SMIS</title>
    <link rel="shortcut icon" href="src/media/favico.ico" type="image/x-icon">
  <!-- BOOTSTRAP STYLES-->
    <link href="Admin/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="Admin/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="Admin/css/custom.css" rel="stylesheet" />
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
                 

                    <li>
                        <a href="admin.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                   

                    <li class="active-link">
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
                    <div class="col-md-12">
                     <h2>UPLOAD STUDENTS</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
  <?php
 if(Input::exists())
  {
        $session = input::get('session');
       
         $s20152016 = 't20152016';
          $s20182019 = 't20182019';


    if ($s20152016 == $session)
    {
        // -------------------
      if (input::get('students'))
      {
            
        $allowedFile =  array("csv","CSV");            
        $upload = new Upload(input::get('students'), "STUDENTS/", 10000024,$allowedFile);
        if($allowedFile == true)
        {
                
                $file = $upload->GetFile();

                    //set temp name and then open
                    $handle = fopen($file, 'r');
                        //loop through the file and get contents via fgetcsv into an array

                while(($line=fgetcsv($handle, 1000, ",")) !== FALSE)
                {

                    $surname = $line[0];
                    $firstname = $line[1];
                    $othernames = $line[2];
                    $matric = $line[3];
                    $programme = $line[4];
                    $level = $line[5];
                    
          $tbl15 = DB::getInstance()->insert('t20152016', array(
                        'surname' => $surname,
                        'firstname' => $firstname,
                        'othernames' => $othernames,
                        'matric_no' => $matric,
                        'programme' => $programme,
                        'level' => $level
                    ));
                   }

              if($tbl15)
            {
               ?>      
             <div class="alert alert-info text-capitalize" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="sr-only"></span> RECORDS INSERTED SUCCESSFULLY!!
              </div>
                      <script>
              setTimeout(function(){
              window.location.href= "students.php";
              }, 700);
              </script>
      
               <?php
            
            }else
            {
              ?>
             <div class="alert alert-error text-capitalize" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="sr-only"></span>EROR!!! RECORDS NOT INSERTED!!
              </div>
              <?php
          }
               // 

        }else
        {
                echo "  INVALID FILE FORMAT CHOOSEN!!!";
        }
      }
        // ---------------
    }elseif ($t20162017 == $session)
    {
            // =============================
            if (input::get('csv'))
      {
            
        $allowedFile =  array("csv","CSV");            
        $upload = new Upload(input::get('csv'), "excel/", 1024,$allowedFile);
        if($allowedFile == true)
        {
                
                $file = $upload->GetFile();

                    //set temp name and then open
                    $handle = fopen($file, 'r');
                        //loop through the file and get contents via fgetcsv into an array

                while(($line=fgetcsv($handle, 1000, ",")) !== FALSE)
                {

                    $surname = $line[0];
                    $firstname = $line[1];
                    $othernames = $line[2];
                    $matric = $line[3];

                     $studentInsert = DB::getInstance()->insert('t20162017', array(
                        'surname' => $surname,
                        'firstname' => $firstname,
                        'othernames' => $othernames,
                        'matric_no' => $matric

                    ));

                   }
              if($studentInsert)
            {
               ?>      
             <div class="alert alert-info text-capitalize" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="sr-only"></span> RECORDS INSERTED SUCCESSFULLY!!
              </div>
                      <script>
              setTimeout(function(){
              window.location.href= "students.php";
              }, 700);
              </script>
      
               <?php
            
            }else{
              echo ' <div class="alert alert-danger text-capitalize" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span class="sr-only"></span>ERROR!!! RECORDS NOT INSERTED!!
              </div>';
            }
               // 

        }else
        {
                echo "  INVALID FILE FORMAT CHOOSEN!!!";
        }
      }
        // ---------------      // =============================

    }else
    {
      echo "NO SESSION SELECTED!";
    }
                              
  } 
    ?>
    <table border="2" align="center">
      <tr>
      <th>Surname</th>
      <th>Firstname</th>
      <th>Othername</th>
      <th>Matric no</th>
      <th>Programme</th>
      <th>Level</th>
    </tr>
    </table>
    <p class="text-capitalize text-center" style="color: red; font-weight: bold; font-size: 15px;">The Data In your csv file should be arranged in the above format excluding the column headers</p>
    <hr>
<div class="row">
   <div class="col-md-2">
    </div> 

    <div class="col-md-8">
        <div class="jumbotron bio-jumb">

            <div class="container-fluid">
              <form class="form" method="POST" action="" enctype="multipart/form-data">
                
                <div class="form-group">
                <label>SESSION</label>
                    <select class="form-control" name="session">
                      <option>PLEASE CHOOSE A SESSION</option>
                      <option value="t20152016">2015/2016</option>
                      <option value="t20162017">2016/2017</option>
                      <option value="t20172018">2017/2018</option>
                      <option value="t20182019">2018/2019</option>
                    </select> 
                  </div>

            <div class="form-group">
               <label style="color:red">Choose A CSV FILE (CSV FILES ONLY!!!))</label>
              <input type="file" name="students" class="form-control">
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
