<?php require_once 'core/init.php';?>

<?php 

if(Input::exists()){
		if (Token::check(Input::get('token'))) {

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
					'username' => array(
						'required' => true,
						'min'=>2,
						'max'=>50,
						'unique' => 'admin'	
					),


					'password' =>array(
						'required' => true,
						'min' =>5	
					),
		));
						if ($validation->passed()) {
					$user = new User();
					$salt = Hash::salt(32);

					try{

						$user->Create(array(
							'username' => Input::get('username'),
							
							'password' => Hash::make(Input::get('password'), $salt),
							
							'salt' => $salt,
							
							'group' => 2

						));?>

						<?php redirect::to("login.php");?>

					<?php }catch(Exception $e){
						die($e->getMessage());
					}
					// Session::flash('Success', 'You registered sucessfully!');
					// header('Location:index.php'); 

				}else{
					
					foreach ($validation->errors() as $error) {?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <?php echo $error;?>
   </div><?php
					}
				}
		}
}
?>


<form method="post" action="" role="form">
	<input type="username" name="username">
	<input type="password" name="password">
	<input type="hidden" name="token" value="<?php echo Token::generate();?>">
	 <input type="submit" class="btn btn-primary" value="Save Changes">
</form>