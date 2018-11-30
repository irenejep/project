<?php

session_start();

	if(!isset($_SESSION["sess_user"])) {
		
	header("location:index.html");
	
} else{
	
	include("controllers/head.php");
	
	include("data.php");
		

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
		
        <li class="active"><a href="mpesa.php">M-Pesa Platform</a></li>
				
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

          <li><a href="list_products.php">View Uploaded Tickets</a></li>
        <li><a href="sold_outs.php">Sold Tickets</a></li>
		
        <li class="active"><a href="mpesa.php">M-Pesa Platform</a></li>
		
        <li><a href="logout.php">Sign Out!</a></li>
		
      </ul>
	  
	  <br>
	  
    </div>
<br> 	

		<div class="col-sm-9">
		
		  <div class="well">
		  
        <h4><img src="image/safcom.png" class="img img-rounded" height="50px" width="100px"> M-Pesa Dashboard</h4>
			
			<p>Accounts, recording sales and mpesa transactions view here...</p>
			
		  </div>
		  
		</div>	

		<div class="col-sm-3">
			
			
			
		</div>

		
		<div class="col-sm-9">
		
		<div class="search text-right">
		
			<!--Noma sana form here !! -->
			
			<form role="form" class="form-inline" method="post">
						
			<input type="text" name="q" class="form-control" id="q" size="50" placeholder="search by m-pesa transaction no"  /> 
			
			<button type="submit" name="submit" value="search" class="btn btn-primary " /> <span class="glyphicon glyphicon-search"> Search</span></button>
			
			<a href="mpesa.php" class="btn btn-default">Go Back</a>
						
			<br /><br />
			
			</form>
		
		</div>
		
			<table class="table table-bordered table-hover">
				
				<thead>

					<tr class="info">

						<th>Paybill No</th>
						<th>Phone Number</th>
						<th>Transaction Number</th>
						<th>Ksh.</th>

					</tr>

				</thead>

				<tbody>
					
						
					<?php
					
						$key = isset($_POST['q']) ? $_POST['q'] : '';
						
						$select = mysqli_query($con,"SELECT * FROM mpesa WHERE transno LIKE '%$key%' ") or die ('No offices found' . mysqli_error($con) );

							$numrows = mysqli_num_rows($select);
							
							if($numrows == 0 ) {
								
								echo "<div class='text-danger'><p class='text-center'><b>No Ticket Found</b> </p></div>";
								
							}						
						
							while($row = mysqli_fetch_assoc($select)) {

								echo "<tr class = 'tr-color'>";
								echo "<td>".$row['paybill']."</td>";
								echo "<td>".$row['phone']."</td>";
								echo "<td>".$row['transno']."</td>";
								echo "<td>".$row['amount']."</td>";
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