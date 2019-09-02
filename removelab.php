<?php require_once 'core/init.php';
$id = input::get('id');
$delete = DB::getInstance()->DELETE('labs', array(
	'id', '=', $id
));
          
          if($delete) {?>
          	<script>
		setTimeout(function(){
		window.location.href= "labs.php?#table";
		}, 90);
	</script>
	<?php
          }
?>