<?php require_once 'core/init.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	   <title>ADD LECTURE ROOMS || SMIS</title>
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


                    <li class="active-link">
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
                     <h2>LECTURE ROOMS</h2>   
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

        if (isset($_FILES['room'])) {
        $allowedFile =  array("png", "PNG", "jpeg", "JPEG","jpg", "JPG");
        $upload = new Upload($_FILES['room'], "ROOMS/", 10000000000 ,$allowedFile);
        $room = $upload->GetFile();
        }
      if(Input::exists())
      {
   
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'roomname' => array(
        'required' => true,
        'min'=>2,
        'max'=>20,
        'unique' => 'lectroom' 
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

            $roomInsert = DB::getInstance()->insert('lectroom', array(
              'room' => $room,
              'roomname' => input::get('roomname'),
              'capacity' => input::get('capacity'),
              'location' =>input::get('location')
                 ));
            if($roomInsert)
            {
           ?>      
         <div class="alert alert-info text-capitalize" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="sr-only"></span> RECORDS INSERTED SUCCESSFULLY!!
          </div>
                  <script>
          setTimeout(function(){
          window.location.href= "lecture-rooms.php?#table";
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
              <label>ROOM NAME</label>
              <input type="text" name="roomname"  placeholder="Input Lecture Room's Name" class="form-control">
            </div>

            <div class="form-group">
              <label> CAPACITY</label>
              <input type="number" name="capacity" placeholder="Input Lecture Room's Capacity" class="form-control" >
            </div>

            <div class="form-group">
              <label> LOCATION</label>
            <select class="form-control" name="location">
              <option>Please select  a buidling/location</option>
              <option value="ICT Building">ICT BUILDING</option>
              <option value="Science Building">SCIENCE COMPLEX</option>
              <option value="Computer Rooms">COMPUTER ROOMS</option>
              </select>
            </div>

            <div class="form-group">
              <label>PICTURE</label>
              <input type="file" name="room" class="form-control" >
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
      <h4 class="text-center">LECTURE ROOMS IN COMPUTER SCIENCE DEPARTMENT</h4>
      <table class="table">
     
        <?php
        
        $select = DB::getInstance()->query("SELECT * FROM lectroom");
          
      if(!$select->count($select)) {
            
      echo '<div class="alert alert-warning text-capitalize" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span><marquee>TABLE IS EMPTY!!!  TABLE IS EMPTY!! TABLE IS EMPTY!!TABLE IS EMPTY!!</marquee></div>';
            
    }else{
        ?>
           <tr>
          <th>TABLE ID</th>
          <th>ROOMNAME</th>
          <th>CAPACITY</th>
          <th>LOCATION</th>
          <th>IMAGE</th>
          <th>DELETE</th>

        </tr>

     <?php
      foreach($select->results() as $select){ $rooms = $select->room; ?>
        <tr> 

          <td>
            <?php echo $select->id;?>
          </td>

          <td>
            <?php echo $select->roomname;?>
          </td>
          
          <td>
            <?php echo $select->capacity;?>
          </td>
          
          <td>
            <?php echo $select->location;?>
          </td>

         <td>
         <?php
            echo "<a href=".$rooms."><img class='roomimg img-circle' src='". $rooms."' alt='avatar'></a>";
          ?>
          </td>
    
          <td>
            <a href="removeroom.php?id=<?php echo $select->id; ?>"><i class="fa fa-trash-o"></i></a>
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
