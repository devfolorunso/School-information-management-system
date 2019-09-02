<?php require_once 'core/init.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>LABORATORIES || SMIS</title>
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
                 

                    <li>
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

                    <li class="active-link">
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
                     <h2>LABORATORIES</h2>   
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

        if (isset($_FILES['lab_pics'])) {
        $allowedFile =  array("jpg","JPG", "PNG","JPEG", "png", "jpeg");
        $upload = new Upload($_FILES['lab_pics'], "labs/", 10000000000 ,$allowedFile);
        $lab_pics = $upload->GetFile();
        }
      if(Input::exists())
      {
   
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'lab_id' => array(
        'required' => true,
        'min'=>2,
        'max'=>20,
        'unique' => 'labs' 
          ),

          'capacity' =>array(
            'required' => true,
            'min' =>2 
          ),

          'location' =>array(
            'required' => true,
            'min' =>2 
          )

            ));
            if ($validation->passed()) 
        {

            $labInsert = DB::getInstance()->insert('labs', array(
              'lab_pics' => $lab_pics,
              'lab_type' => input::get('lab_type'),
              'lab_id' => input::get('lab_id'),
              'capacity' => input::get('capacity'),
              'location' =>input::get('location')
                 ));
            if($labInsert)
            {
           ?>      
         <div class="alert alert-info text-capitalize" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="sr-only"></span> RECORDS INSERTED SUCCESSFULLY!!
          </div>
       <script>
          setTimeout(function(){
          window.location.href= "labs.php?#table";
          }, 500);
        </script>
 
    <?php
            }
        }else{

       foreach ($validation->errors() as $error) {
          ?>
<div class="alert alert-danger text-capitalize" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span>
<?php echo $error;?>
</div>
   <?php
      }
    }
  }
  ?>

            <div class="container-fluid">
              <form class="form" method="POST" action="" enctype="multipart/form-data">
    
            <div class="form-group">
              <label>LAB TYPE</label>
            <Select class="form-control" name="lab_type">
              <option>Please labSelect  LAB TYPE</option>
              <option value="Software">SOFTWARE</option>
              <option value="Hardware">HARDWARE</option>
            </Select>
            </div>

           <div class="form-group">
              <label>LAB ID</label>
              <input type="text" name="lab_id"  placeholder="Input  LAB ID e.g LAB 2" class="form-control">
            </div>


            <div class="form-group">
              <label> CAPACITY/ NO OF SYSTEMS</label>
              <input type="number" name="capacity" placeholder="Input LAB Capacity" class="form-control" >
            </div>

          

            <div class="form-group">
              <label> LOCATION</label>
            <Select class="form-control" name="location">
              <option>Please labSelect  a buidling/location</option>
              <option value="ICT BUILDING">ICT BUILDING</option>
              <option value="PTDF">PTDF</option>
              </Select>
            </div>

            <div class="form-group">
              <label>PICTURE</label>
              <input type="file" name="lab_pics" class="form-control" >
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
<hr/>

<div id="table"></div>
  <div class="container-fluid">
    <div class="jumbotron">
      <h4 class="text-center">LABORATORIES IN COMPUTER SCIENCE DEPARTMENT</h4>
      <table class="table">
     
        <?php
        
        $labSelect = DB::getInstance()->query("SELECT * FROM labs");
          
      if(!$labSelect->count($labSelect)) {
            
      echo '<div class="alert alert-warning text-capitalize" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span><marquee>TABLE IS EMPTY!!!  TABLE IS EMPTY!! TABLE IS EMPTY!!TABLE IS EMPTY!!<marquee></div>';
            
    }else{
        ?>
           <tr>
          <th>TABLE ID</th>
          <th>LAB TYPE</th>
          <th>LAB ID</th>
          <th>CAPACITY</th>
          <th>LOCATION</th>
          <th>LAB PICS</th>
          <th>DELETE</th>
        </tr>

     <?php
      foreach($labSelect->results() as $labSelect){ $lab_pics = $labSelect->lab_pics; ?>
        <tr> 

          <td>
            <?php echo $labSelect->id;?>
          </td>

          <td>
            <?php echo $labSelect->lab_type;?>
          </td>
    
         <td>
            <?php echo $labSelect->lab_id;?>
          </td>

          <td>
            <?php echo $labSelect->capacity;?>
          </td>
          
          <td>
            <?php echo $labSelect->location;?>
          </td>

         <td>
         <?php
            echo "<a href=".$lab_pics."><img class='roomimg img-circle' src='". $lab_pics."' alt='avatar'></a>";
          ?>
          </td>
    
          <td>
            <a href="removelab.php?id=<?php echo $labSelect->id; ?>"><i class="fa fa-trash-o"></i></a>
          </td>

        </tr>
        <?php
      }
    }
    ?>
      </table>
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
