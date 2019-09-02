  <?php require_once 'core/init.php';
  if(Input::exists())
  {
        $session = input::get('session');
       
          $t20152016 = 't20152016';
          $t20132014 = 't20132014';
  
    if ($t20152016 == $session)
    {
        // -------------------
      $programme = input::get('programme');
      $level = input::get('level');

            $t215 = DB::getInstance()->query("SELECT id, surname,firstname,othernames,matric_no
              FROM t20152016
              WHERE programme = ?
              AND level = ? ",array(
                'programme' => $programme,
                'level' => $level));

            if(!$t215->count($t215))
            {
            
              echo '<script>
                    alert("SORRY! THE TABLE IS EMPTY!!");
                   </script>';
            
            }else
            {
               $delimiter = ",";
               $filename = "t20152016_" . date('Y-m-d') . ".csv";

                 //create a file pointer
              $f = fopen('php://memory', 'w');
              
               //set column headers
            $fields = array('S/N', 'Surname', 'Firstname', 'Othernames', 'Matric No', 'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9', 'Week 10', 'Summary' );
            fputcsv($f, $fields, $delimiter);
        
            foreach($t215->results() as $t215)
            {
               $lineData = array( $t215->id, $t215->surname ,$t215->firstname, $t215->othernames,$t215->matric_no);
            
             fputcsv($f, $lineData, $delimiter);
              // echo $t215->id .'<br/>';
              // echo $t215->surname .'<br/>';
              // echo $t215->matric_no .'<br/>';
            }
             //move back to beginning of file
          fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    //output all remaining data on a file pointer
    fpassthru($f);
        }

    }else     if ($t20132014 == $session)
    {
        // -------------------
      $programme = input::get('programme');
      $level = input::get('level');

            $t215 = DB::getInstance()->query("SELECT id, surname,firstname,othernames,matric_no
              FROM t20132014
              WHERE programme = ?
              AND level = ? ",array(
                'programme' => $programme,
                'level' => $level));

            if(!$t215->count($t215))
            {
            
              echo '<script>
                    alert("SORRY! THE TABLE IS EMPTY!!");
                   </script>';
            
            }else
            {
               $delimiter = ",";
               $filename = "t20132014_" . date('Y-m-d') . ".csv";

                 //create a file pointer
              $f = fopen('php://memory', 'w');
              
               //set column headers
            $fields = array('S/N', 'Surname', 'Firstname', 'Othernames', 'Matric No', 'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8', 'Week 9', 'Week 10', 'Summary' );
            fputcsv($f, $fields, $delimiter);
        
            foreach($t215->results() as $t215)
            {
               $lineData = array( $t215->id, $t215->surname ,$t215->firstname, $t215->othernames,$t215->matric_no);
            
             fputcsv($f, $lineData, $delimiter);
              // echo $t215->id .'<br/>';
              // echo $t215->surname .'<br/>';
              // echo $t215->matric_no .'<br/>';
            }
             //move back to beginning of file
          fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    //output all remaining data on a file pointer
    fpassthru($f);
        }

    }else
    {
      echo "<script>
            alert('NO SESSION SELECTED!!');
            setTimeout(function(){
          window.location.href= 'attendance.php';
          }, 500);
          </script>";
    }

    {
      echo "<script>
            alert('NO SESSION SELECTED!!');
            setTimeout(function(){
          window.location.href= 'attendance.php';
          }, 500);
          </script>";
    }
                              
  } 
    ?>