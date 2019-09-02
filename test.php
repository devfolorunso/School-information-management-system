 <?php require_once 'core/init.php';
        
        $selectOfc = DB::getInstance()->query("SELECT * FROM t20152016 ORDER BY RAND() LIMIT 10");

           if( $selectOfc->count($selectOfc)) {	
           	  
          foreach($selectOfc->results() as $selectOfc)
           	    { 
           	      echo $selectOfc->email ."<br/>";
           	  } 

           	}?>