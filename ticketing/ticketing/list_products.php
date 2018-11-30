<?php

session_start();

	if(!isset($_SESSION["sess_user"])) {
		
	header("location:index.html");
	
} else{
	
	include("controllers/head.php");
	
	include("data.php");
	
	if (isset($_GET['delete']) ) {

		$id = $_GET['delete'];
		
		mysqli_query($con,"DELETE FROM tickets WHERE tID = '$id' ") or die (mysqli_error($con));
		
		echo "<meta http-equiv = 'refresh' content = '0; url = deletesuccess.php'> " ;
			
		
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
        <li><a href="mainpanel.php">Event Host! Dashboard</a></li>
        <li><a href="add_tickets.php">New Events Tickets</a></li>
        <li class="active"><a href="list_products.php">View Uploaded Tickets</a></li>
          <li><a href="sold_outs.php">Sold Tickets</a></li>
          <li><a href="mpesa.php">M-Pesa Platform</a></li>
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
	  
        <li><a href="mainpanel.php">Event Host! Dashboard</a></li>

        <li><a href="add_tickets.php">New Events Tickets</a></li>
		
        <li class="active"><a href="list_products.php">View Uploaded Tickets</a></li>

          <li><a href="sold_outs.php">Sold Tickets</a></li>
          <li><a href="mpesa.php">M-Pesa Platform</a></li>
        <li><a href="logout.php">Sign Out!</a></li>
		
		
      </ul>
	  
	  <br>
	  
    </div>
<br> 	

	<div class="col-sm-9">
	
      <div class="well">
	  
        <h4>Dashboard</h4>
		
        <p>view all events in the system here...</p>
		
      </div>
	  
    </div>	

		<div class="col-sm-3">
			
			
			
		</div>
		
		<div class="col-sm-9">
		
			<table class="table table-bordered table-hover">
				
				<thead>

					<tr class="info">

						<th>Ticket ID</th>
						<th>Ticket image</th>
						<th>Ticket Name</th>
						<th>Ticket Schedules</th>
						<th>Price</th>
						<th>Total No of Tickets</th>
						<th>Operation</th>

					</tr>

				</thead>

				<tbody>
					
						
					<?php
						
						$select = mysqli_query($con,"SELECT * FROM tickets") or die ('No offices found' . mysqli_error($con) );
						
							while($row = mysqli_fetch_assoc($select)) {

								echo "<tr class = 'tr-color'><td>".$row['tID']."</td>";
								echo "<td><img src=".$row['image']." width='40px' height='40px'></td>";
								echo "<td>".$row['title']."</td>";
								echo "<td>".$row['description']."</td>";
								echo "<td>".$row['price']."</td>";
								echo "<td>".$row['total_no_of_tickets']."</td>";
								echo "<td><a href='editTickets.php?edit=$row[tID]'><span class='glyphicon glyphicon-edit'></span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='list_products.php?delete=$row[tID]'><span class='glyphicon glyphicon-trash'></span></a></td>";
								echo "</tr>";
								
							}

					?>


				</tbody>

			</table>

		</div>
	
	</div>

</div>

<br />

<?php

	include("controllers/foot.php");

}

?>