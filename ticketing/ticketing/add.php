<?php 

session_start();

	if(!isset($_SESSION["sess_user"] )) {
		
	header("location:../ticketing/starting_error.html");
	
} else if($_SESSION["sess_type"] == "Administrator"){
	

	include("controllers/head.php");


?>
<?php
	
	$msg="";
	
		if (isset($_POST["add"])){
			
			$fname = $_POST['fname'];
			
			$sname = $_POST['lname'];
			
			$user = $_POST['user'];
			
			$pass = $_POST['pass'];
			
			$role = $_POST['role'];


			
			include_once('data.php');
			
			$ccc = "INSERT INTO accounts (fname,lname,username,password,type) VALUES ('$fname','$sname','$user','$pass','$role')";
			
			if (!mysqli_query($con,$ccc)) {
				
				$msg=
					
				   '
						<div class="alert alert-warning fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Not successfully!</strong> <a href="add.php">click here</a> to reload page.
						</div>
					'
					;		

			}  else{ 

				$msg=
					
				   '
						<div class="alert alert-success fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong></strong> One user added.
						</div>
					'
					;

			   mysqli_close($con);
			}	
			
			
		}
	
	?>
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="image/ticket.png" class="img-responsive" alt="LOGO" height="50px" width="50px"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="mainpanel.php">Administrative! Dashboard</a></li>
        <li class="active"><a href="add.php">Add Accounts</a></li>
        <!--<li><a href="add_tickets.php">New Events Tickets</a></li>
        <li><a href="list_products.php">View Uploaded Tickets</a></li>-->
        <li><a href="user_accounts.php">View Users Accounts</a></li>
        <li><a href="logout.php">Sign Out!</a></li>
		
      </ul>
    </div>
  </div>
</nav>

<div class = "container-fluid">
	
  <div class="row content">
  
    <div class="col-sm-3 sidenav hidden-xs">
	
      <h2><img src="image/ticket.png" class="img-responsive" alt="LOGO"></h2>
	  
      <ul class="nav nav-pills nav-stacked">
	  
        <li><a href="mainpanel.php">Administrative! Dashboard</a></li>
		
        <li class="active"><a href="add.php">Add Accounts</a></li>
		
       <!-- <li><a href="add_tickets.php">New Events Tickets</a></li>
		
        <li><a href="list_products.php">View Uploaded Tickets</a></li>-->
		
        <li><a href="user_accounts.php">View Users Accounts</a></li>
		
        <li><a href="logout.php">Sign Out!</a></li>
		
      </ul><br>
	  
    </div> 
		  <br>

	<div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>add user accounts here...</p>
      </div>
      </div>
	<div class="col-sm-6 col-lg-6 text-center ">
      
		<?php

			echo $msg;

		?>
			<table class = "table table-bordered well">
			
				<thead>
					
				</thead>
			
			
				<tbody>
				
				<form method="POST" action="add.php">
				
					<tr>
					
						<td class = "td-col">
						
							First Name: <input type="text" name="fname" class="form-control" id="age" required/>						
							
						</td>						
						
						<td class = "td-col">
						
							Second Name: <input type="text" name="lname" class="form-control" id="age" required/>						
							
						</td>
						
					</tr>
				
					<tr>
					
						<td class = "td-col">
						
							Username: <input type="text" name="user" class="form-control" id="no" required/>						
							
						</td>
					
					
						<td class = "td-col">
						
							Role Type: 
							
							<select name="role"  class="form-control">
							
								<option></option>
								<option>Administrator</option>
								<option value="Event_Host">Event Host</option>
								<option>User</option>
							
							</select>
							
						</td>
						
					</tr>						
					
					<tr>
					
						<td class = "td-col">
						
							Password: <input type="text" name="pass" class="form-control" id="age" required/>						
							
						</td>
						
					</tr>			

					<tr>
					
						<td colspan="2" class = "td-col">
						
							<input type="submit" name="add" class="btn btn-primary" value="Add" />
							
						</td>
					
					</tr>
					
				</form>
				
				</tbody>
			
			</table>
	
	</div> 
	  
<div class="col-sm-3 col-lg-3">	  </div>  

</div>

<br /><br /><br />

	<!-- to place the footer at its place manualy-->

<?php 

	include("controllers/foot.php");
}
?>