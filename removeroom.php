<?php require_once 'core/init.php';
$id = input::get('id');
$delete = DB::getInstance()->DELETE('lectroom', array(
	'id', '=', $id
));
          
          if($delete) {?>
          	<script>
		setTimeout(function(){
		window.location.href= "lecture-rooms.php?#table";
		}, 90);
	</script>
	<?php
          }
?>