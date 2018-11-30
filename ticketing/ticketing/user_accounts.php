<?php

session_start();

	if(!isset($_SESSION["sess_user"])) {
		
	header("location:../ticketing/starting_error.html");
	
} else{
	
	include("controllers/head.php");
	
	include("data.php");
	
	if (isset($_GET['remove']) ) {

		$id = $_GET['remove'];
		
		mysqli_query($con,"DELETE FROM accounts WHERE ID = '$id' ") or die (mysqli_error($con));
		
		echo "<meta http-equiv = 'refresh' content = '0; url = deleted.php'> " ;
			
		
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
        <li><a href="add.php">Add Accounts</a></li>
        <!--<li><a href="add_tickets.php">New Events Tickets</a></li>
        <li><a href="list_products.php">View Uploaded Tickets</a></li>-->
        <li class="active"><a href="user_accounts.php">View Users Accounts</a></li>
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
		
        <li><a href="add.php">Add Accounts</a></li>
		
        <!--<li><a href="add_tickets.php">New Events Tickets</a></li>
		
        <li><a href="list_products.php">View Uploaded Tickets</a></li>-->
		
        <li class="active"><a href="user_accounts.php">View Users Accounts</a></li>
		
        <li><a href="logout.php">Sign Out!</a></li>
		
		
      </ul>
	  
	  <br>
	  
    </div> 
		  <br>

	<div class="col-sm-9">
	
      <div class="well">
	  
        <h4>Dashboard</h4>
		
        <p>view user accounts here...</p>
		
      </div>
	  
    </div>
	
	<div class="col-sm-3"></div>
		<div class="col-sm-9">

		<div class="text-center">
			
			<label id="l-size">Accounts</label>

		</div>

			<table class="table table-bordered table-hover">
				
				<thead>

					<tr class="info">

						<th>Job ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Username</th>
						<th>Role</th>
						<th>Password</th>
						<th>operation</th>

					</tr>

				</thead>

				<tbody>
					
						
					<?php
						
						$select = mysqli_query($con,"SELECT * FROM accounts ") or die ('No offices found' . mysqli_error($con) );
						
							while($row = mysqli_fetch_assoc($select)) {

								echo "<tr class = 'tr-color'><td>".$row['ID']."</td>";
								echo "<td>".$row['fname']."</td>";
								echo "<td>".$row['lname']."</td>";
								echo "<td>".$row['username']."</td>";
								echo "<td>".$row['type']."</td>";
								echo "<td>".$row['password']."</td>";
								echo "<td><a id='log' href='user_accounts.php?remove=$row[ID]'>delete</a></td>";
								echo "</tr>";
								
							}

					?>


				</tbody>

			</table>


</div>
</div>
</div>


<?php

include("controllers/foot.php");
}

?>