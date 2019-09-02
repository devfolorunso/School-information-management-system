<?php require_once 'core/init.php';
$id = input::get('id');
$delete = DB::getInstance()->DELETE('offices', array(
	'id', '=', $id
));
          
          if($delete) {?>
          	<script>
		setTimeout(function(){
		window.location.href= "offices.php?#table";
		}, 90);
	</script>
	<?php
          }
?>