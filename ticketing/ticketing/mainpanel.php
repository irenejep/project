<?php
    session_start();
	if(!isset($_SESSION["sess_user"] )) {
	header("location:../ticketing/starting_error.html");
} else if($_SESSION["sess_type"] == "Administrator"){
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
        <li class="active"><a href="#">Administrative! Dashboard</a></li>
        <li><a href="add.php">Add Accounts</a></li>
        <!--<li><a href="add_tickets.php">New Events Tickets</a></li>
        <li><a href="list_products.php">View Uploaded Tickets</a></li>-->
        <li><a href="user_accounts.php">View Users Accounts</a></li>
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
        <li class="active"><a href="#section1">Administrative! Dashboard</a></li>
        <li><a href="add.php">Add Accounts</a></li>
        <!--<li><a href="add_tickets.php">New Events Tickets</a></li>-->
        <!--<li><a href="list_products.php">View Uploaded Tickets</a></li>-->
        <li><a href="user_accounts.php">View Users Accounts</a></li>
        <li><a href="logout.php">Sign Out!</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Manage accounts and new upcoming tickets here...</p>
      </div>
      <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10">
          <a href="add.php">
		  <div class="well">
            <h4><div style="text-align: center;">Add Accounts</div></h4>
          </div>
		  </a>
        </div>
        <div class="col-sm-1">

        </div>
      </div>      
	  
	  <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10">
          <a href="user_accounts.php">
		  <div class="well">
            <h4><div style="text-align: center;">View Users Accounts</div></h4>
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
	}else if($_SESSION["sess_type"] == "Event_Host"){
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
        <li class="active"><a href="#">Event Host! Dashboard</a></li>
          <li><a href="add_tickets.php">Add New Events Tickets</a></li>
          <li><a href="list_products.php">View Uploaded Tickets</a></li>
          <li><a href="sold_outs.php">Sold Tickets</a></li>
        <li><a href="mpesa.php">M-Pesa Platform</a></li>
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
        <li class="active"><a href="#">Event Host! Dashboard</a></li>
          <li><a href="add_tickets.php">Add New Events Tickets</a></li>
          <li><a href="list_products.php">View Uploaded Tickets</a></li>
        <li><a href="sold_outs.php">Sold Tickets</a></li>
        <li><a href="mpesa.php">M-Pesa Platform</a></li>
        <li><a href="logout.php">Sign Out!</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Accounts, recording sales and mpesa transactions view here...</p>
      </div>
      <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-5">
          <a href="add_tickets.php">
		  <div class="well">
            <h4><div style="text-align: center;">Add new tickets</div></h4>
          </div>
		  </a>
        </div>
        <div class="col-sm-5">
          <a href="list_products.php">
		  <div class="well">
            <h4><div style="text-align: center;">View uploaded tickets</div></h4>
          </div>
		  </a>
        </div>
        <div class="col-sm-1">

        </div>
      </div>      
      <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-5">
          <a href="sold_outs.php">
		  <div class="well">
            <h4><div style="text-align: center;">Sold Tickets</div></h4>
          </div>
		  </a>
        </div>
        <div class="col-sm-5">
          <a href="mpesa.php">
		  <div class="well">
            <h4><div style="text-align: center;">M-Pesa Platform <small>(Safaricom)</small></div></h4>
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