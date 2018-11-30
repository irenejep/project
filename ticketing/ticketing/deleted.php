<?php

session_start();

	if(!isset($_SESSION["sess_user"])) {
		
	header("location:index.html");
	
} else{
	
	include("controllers/head.php");

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
        <li><a href="add_tickets.php">New Events Tickets</a></li>
        <li><a href="list_products.php">View Uploaded Tickets</a></li>
        <li class="active"><a href="user_accounts.php">View Users Accounts</a></li>
        <li><a href="logout.php">Sign Out!</a></li>
		
      </ul>
    </div>
  </div>
</nav>

<div class = "container-fluid">


<div class = "row content">
	
    <div class="col-sm-3 sidenav hidden-xs">
	
      <h2><img src="image/ticket.png" class="img-responsive" alt="LOGO"></h2>
	  
      <ul class="nav nav-pills nav-stacked">
	  
        <li><a href="mainpanel.php">Administrative! Dashboard</a></li>
		
        <li><a href="add.php">Add Accounts</a></li>
		
        <li><a href="add_tickets.php">New Events Tickets</a></li>
		
        <li><a href="list_products.php">View Uploaded Tickets</a></li>
		
        <li class="active"><a href="user_accounts.php">View Users Accounts</a></li>
		
        <li><a href="logout.php">Sign Out!</a></li>
		
		
      </ul>
	  
	  <br>
	  
    </div>
<br> 	
	<div class="col-sm-9">
	
      <div class="well">
	  
        <h4>Dashboard</h4>
		
        <p>enter new events to the system here...</p>
		
      </div>
	  
    </div>
	
	<div class="col-sm-3"></div>
	
		<div class=" col-sm-9">

		<div class="well">
		
			<strong>User Deleted!</strong> <a href="user_accounts.php">Click here</a> to delete other users.
		
		</div>			
		
		</div>

	</div>

</div>

<br />



<?php

	include("controllers/foot.php");

}

?>