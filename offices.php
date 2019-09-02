<?php require_once 'core/init.php'; ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title> Offices || SIMS</title>
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
                          <a href="admin.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                      </li>
                     
                      <li>
                          <a href="students.php"><i class="fa fa-users "></i>Students</a>
                      </li>

                      <li>
                          <a href="lecture-rooms"><i class="fa fa-key "></i>Lecture Rooms</a>
                      </li>

                       <li class="active-link">
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
                      <div class="classol-md-12">
                       <h2>OFFICES</h2>   
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
        if (isset($_FILES['ofc_pic'])) {
        $allowedFile =  array("jpg","JPG", "PNG","JPEG", "png", "jpeg");
        $upload = new Upload($_FILES['ofc_pic'], "Offices/", 10000000000 ,$allowedFile);
        $officepic = $upload->GetFile();
      
        }
      if(Input::exists())
      {
   
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'ofc_id' => array(
        'required' => true,
        'min'=>2,
        'max'=>20,
        'unique' => 'offices' 
          ),

          'ofc_capacity' =>array(
            'required' => true
          )

            ));
            if ($validation->passed()) 
        {
            $officeInsert = DB::getInstance()->insert('offices', array(
              'ofc_pic' => $officepic,

              'ofc_id' => input::get('ofc_id'),
              
              'ofc_capacity' => input::get('ofc_capacity'),
              
              'occ_name' => input::get('occ_name'),
              
              'occ_nameii' => input::get('occ_nameii'),
              
              'occ_nameiii' => input::get('occ_nameiii'),
              
              'occ_nameiv' => input::get('occ_nameiv'),
              
              'occ_namev' => input::get('occ_namev')
                 ));

            if($officeInsert)
            {
           ?>      
         <div class="alert alert-info text-capitalize" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="sr-only"></span> RECORDS INSERTED SUCCESSFULLY!!
          </div>
                  <script>
          setTimeout(function(){
          window.location.href= "offices.php?#table";
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
              <label>OFFICE ID/NAME</label>
              <input type="text" name="ofc_id"  placeholder="Input Office Number/ Name" class="form-control">
            </div>

            <div class="form-group">
              <label>NUMBER  OF THE OCCUPANTS?</label>
              <select class="form-control" name="ofc_capacity" id="select1" onchange="showDivs('div',this)">
                <option value="a">1</option>
                <option value="b">2</option>
                <option value="c">3</option>
                <option value="d">4</option>
                <option value="e">5</option>
              </select>
            </div>

    <div id="diva" style="display:block;">
        <div class="form-group">
        <label>NAME</label>
        <input type="text" name="occ_name" placeholder="Pls Input Occupant's Name" class="form-control">
        </div>
    </div>

    <div id="divb" style="display:none;">
      <div class="form-group">
        <label>OCCUPANT ONE</label>
        <input type="text" name="occ_name" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

      <div class="form-group">
        <label>OCCUPANT TWO</label>
        <input type="text" name="occ_nameii" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>
    </div>

    <div id="divc" style="display:none;">
      <div class="form-group">
        <label>OCCUPANT ONE</label>
        <input type="text" name="occ_name" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

      <div class="form-group">
        <label>OCCUPANT TWO</label>
        <input type="text" name="occ_nameii" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

       <div class="form-group">
        <label>OCCUPANT THREE</label>
        <input type="text" name="occ_nameiii" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

    </div> 

    <div id="divd" style="display:none;">
        <div class="form-group">
        <label>OCCUPANT ONE</label>
        <input type="text" name="occ_name" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

      <div class="form-group">
        <label>OCCUPANT TWO</label>
        <input type="text" name="occ_nameii" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

       <div class="form-group">
        <label>OCCUPANT THREE</label>
        <input type="text" name="occ_nameiii" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

       <div class="form-group">
        <label>OCCUPANT FOUR</label>
        <input type="text" name="occ_nameiv" placeholder="Pls Input Occupant's Name" class="form-control" >
      </div>

    </div>

    <div id="dive" style="display:none;">
      
          <div class="form-group">
            <label>OCCUPANT ONE</label>
            <input type="text" name="occ_name" placeholder="Pls Input Occupant's Name" class="form-control" >
          </div>

          <div class="form-group">
            <label>OCCUPANT TWO</label>
            <input type="text" name="occ_nameii" placeholder="Pls Input Occupant's Name" class="form-control" >
          </div>

           <div class="form-group">
            <label>OCCUPANT THREE</label>
            <input type="text" name="occ_nameiii" placeholder="Pls Input Occupant's Name" class="form-control" >
          </div>

           <div class="form-group">
            <label>OCCUPANT FOUR</label>
            <input type="text" name="occ_nameiv" placeholder="Pls Input Occupant's Name" class="form-control" >
          </div>

           <div class="form-group">
            <label>OCCUPANT FIVE</label>
            <input type="text" name="occ_namev" placeholder="Pls Input Occupant's Name" class="form-control" >
          </div>
    </div>

</div>
            

            <div class="form-group">
              <label>PICTURE</label>
              <input type="file" name="ofc_pic" class="form-control" >
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
 <div class="col-md-2"></div>
</div>
<hr/>

<div id="table"></div>
  <div class="container-fluid">
    <div class="jumbotron">
      <h4 class="text-center">OFFICES IN COMPUTER SCIENCE DEPARTMENT</h4>
      <table class="table">
     
        <?php
        
        $selectOfc = DB::getInstance()->query("SELECT * FROM offices");
          
      if(!$selectOfc->count($selectOfc)) {
            
      echo '<div class="alert alert-warning text-capitalize" role="alert">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<span class="sr-only">Error:</span><marquee>TABLE IS EMPTY!!!  TABLE IS EMPTY!-! TABLE IS EMPTY!!TABLE IS EMPTY!!</marquee></div>';
            
    }else{
        ?>
           <tr>
          <th>TABLE ID</th>
          <th>OFFICE ID</th>
          <th>OCCUPANT I</th>
          <th>OCCUPANT Ii</th>
          <th>OCCUPANT III</th>
          <th>OCCUPANT IV</th>
          <th>OCCUPANT V</th>
          <th>OFFICE PIC</th>
          <th>DELETE</th>

        </tr>

     <?php
      foreach($selectOfc->results() as $selectOfc){ $ofc_pic = $selectOfc->ofc_pic; ?>
        <tr> 

          <td>
            <?php echo $selectOfc->id;?>
          </td>

          <td>
            <?php echo $selectOfc->ofc_id;?>
          </td>
                    
          <td>
            <?php echo $selectOfc->occ_name;?>
          </td>

         <td>
            <?php echo $selectOfc->occ_nameii;?>
          </td>

          <td>
            <?php echo $selectOfc->occ_nameiii;?>
          </td>

         <td>
            <?php echo $selectOfc->occ_nameiv;?>
          </td>

         <td>
            <?php echo $selectOfc->occ_namev;?>
          </td>

         <td>
         <?php
            echo "<a href=".$ofc_pic."><img class='roomimg img-circle' src='". $ofc_pic."' alt='avatar'></a>";
          ?>
          </td>
    
          <td>
            <a href="removeoffice.php?id=<?php echo $selectOfc->id; ?>"><i class="fa fa-trash-o"></i></a>
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
            
<script type="text/javascript">
function showDivs(prefix,chooser) {
        for(var i=0;i<chooser.options.length;i++) {
                var div = document.getElementById(prefix+chooser.options[i].value);
                div.style.display = 'none';
        }
        var div = document.getElementById(prefix+chooser.value);
        div.style.display = 'block';
}
</script>
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