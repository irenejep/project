<?php 

session_start();

	if(!isset($_SESSION["sess_user"] )) {
		
	header("location:../ticketing/starting_error.html");
	
} else if($_SESSION["sess_type"] == "Event_Host"){
	

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
        <li><a href="mainpanel.php">Event Host! Dashboard</a></li>
          <li><a href="add_tickets.php">New Events Tickets</a></li>

          <li><a href="list_products.php">View Uploaded Tickets</a></li>
        <li><a href="sold_outs.php">Sold Tickets</a></li>
        <li class="active"><a href="#.php">M-Pesa Platform</a></li>
        <li><a href="logout.php">Sign Out!</a></li>

      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs ">
      <h2><img src="image/ticket.png" class="img-responsive" alt="LOGO"></h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="mainpanel.php">Event Host! Dashboard</a></li>
          <li><a href="add_tickets.php">New Events Tickets</a></li>

          <li><a href="list_products.php">View Uploaded Tickets</a></li>
        <li><a href="sold_outs.php">Sold Tickets</a></li>
        <li class="active"><a href="#.php">M-Pesa Platform</a></li>
        <li><a href="logout.php">Sign Out!</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4><img src="image/safcom.png" class="img img-rounded" height="50px" width="100px"> M-Pesa Dashboard</h4>
        <p>Enter, view Dummy Amount to a paybill here...</p>
      </div>
      <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-5">
          <a href="dummy.php">
		  <div class="well">
            <h4><center>Enter Dummy Amount to a Paybill Number</center></h4>
          </div>
		  </a>
        </div>
        <div class="col-sm-5">
          <a href="transactions.php">
		  <div class="well">
            <h4><center>view dummy M-Pesa <small>(Transactions)</small></center></h4>
          </div>
		  </a>
        </div>
        <div class="col-sm-1">

        </div>
      </div>      
  
      <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <p>Event Ticketing &copy; Copyright 2017</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 

	include("controllers/foot.php");
}
?>