<?php 

$capture_login_error = "";

if (isset ($_POST["login"]) )  {
	$user = $_POST['username'];
	$pass = $_POST['password'];
		
		include('data.php');
	
	$query = mysqli_query ($con,"SELECT * FROM accounts WHERE username = '".mysqli_real_escape_string($con,$user)."' AND password = '".mysqli_real_escape_string($con,$pass)."' ");
    $numrows = mysqli_num_rows($query);
	if($numrows!=0) {
		while($row = mysqli_fetch_assoc($query)) {
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
			$dbtype = $row['type'];
		}
		if($user == $dbusername && $pass == $dbpassword ) {
			session_start();
			$_SESSION['sess_user']=$user;
			$_SESSION['sess_type']=$dbtype;

			header("location: mainpanel.php");

		}
		
	} else{
		
		
	/*$capture_login_error = '
	<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> Login Credentials, Please try again.
  	</div>
	
	';*/
	
		header("location: starting_error.html");
		
		//echo "<meta http-equiv = 'refresh' content = '0; url = index.html'> " ;

	}
	


}
	

 
?>