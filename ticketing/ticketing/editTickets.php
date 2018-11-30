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
        <li><a href="mainpanel.php">Event Host! Dashboard</a></li>
        <li><a href="add_tickets.php">New Events Tickets</a></li>
          <li><a href="sold_outs.php">Sold Tickets</a></li>
          <li><a href="mpesa.php">M-Pesa Platform</a></li>
        <li class="active"><a href="list_products.php">View Uploaded Tickets</a></li>
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
		
        <p>enter new events to the system here...</p>
		
      </div>
	  
    </div>
	
	<div class="col-sm-3"></div>
		<div class=" col-sm-9">
			
<?php 
			
	include("data.php");

	if (isset($_GET['edit']) ) {

		$id = $_GET['edit'];
		
		$res = mysqli_query($con,"Select * from tickets WHERE tID = '$id' ");
		
		$row = mysqli_fetch_array($res);

	}	

				
	if (isset($_POST['pname']) ) {
		
		$pname = $_POST['pname'];	
		
		$id = $_POST['id'];
		
		$sql = "UPDATE tickets SET title = '$pname' WHERE tID = '$id' ";
		
		$res = mysqli_query($con,$sql) or die ("could not connect". mysqli_error($con) );
		
		echo "<meta http-equiv = 'refresh' content = '0; url = EditSuccessfull.php'> " ;
	}	
	if (isset($_POST['pdesc']) ) {
		
		$pdesc = $_POST['pdesc'];	
		
		$id = $_POST['id'];
		
		$sql = "UPDATE tickets SET description = '$pdesc' WHERE tID = '$id' ";
		
		$res = mysqli_query($con,$sql) or die ("could not connect". mysqli_error($con) );
		
		echo "<meta http-equiv = 'refresh' content = '0; url = EditSuccessfull.php'> " ;
	}					
	
	if (isset($_POST['price']) ) {
		
		$price = $_POST['price'];	
		
		$id = $_POST['id'];
		
		$sql = "UPDATE tickets SET price = '$price' WHERE tID = '$id' ";
		
		$res = mysqli_query($con,$sql) or die ("could not connect". mysqli_error($con) );
		
		echo "<meta http-equiv = 'refresh' content = '0; url = EditSuccessfull.php'> " ;
	}				
	
	if (isset($_POST['no']) ) {
		
		$no = $_POST['no'];	
		
		$id = $_POST['id'];
		
		$sql = "UPDATE tickets SET total_no_of_tickets = '$no' WHERE tID = '$id' ";
		
		$res = mysqli_query($con,$sql) or die ("could not connect". mysqli_error($con) );
		
		echo "<meta http-equiv = 'refresh' content = '0; url = EditSuccessfull.php'> " ;
	}	
?>
			
		

		<form method="POST" class="form-inline" action="editTickets.php" enctype="multipart/form-data">

			<div class="con-table">
			
			<table class="table table-bordered well">
				
				<thead>
					
				</thead>

				<tbody>
				
					<tr>
						
						<td>

							<label>Ticket Design Image:</label>						
							
						</td>

						<td>
						
							<input id="uploadFile" placeholder="Choose File"  value="<?php echo $row[1];?>" class="form-control" disabled="disabled"  />
							
							<div class="fileUpload btn btn-primary btn-sm">
								
								<span>Upload</span>
								
								<input id="uploadBtn"  name="fileToUpload" value="<?php echo $row[1];?>" type="file" class="upload" disabled/>
							
							</div>						
							
						</td>	
					
					</tr>				

					<tr>
						
						<td>

							<label>Ticket Title:</label>						</td>

						<td>
							
							<div class="form-inline has-primary">

								<input type="text" class="form-control" value="<?php echo $row[2];?>" id="username" placeholder="" name="pname" size="40" required/>
							
							</div>						
							
						</td>	
					
					</tr>		

					<tr>
						
						<td>

							<label>Ticket Schedules:</label>						</td>

						<td>
							
							<div class="form-inline has-primary">
							 
								<textarea rows="4" cols="30" class="form-control" id="pdesc"  value="" placeholder="" name="pdesc" required><?php echo $row[3];?></textarea>
							
							</div>					  
							
						</td>	
					
					</tr>

					<tr>

						<td>

							<label>Ticket Price:</label>						
							
						</td>

						<td>

							<div class="form-inline has-primary">

								<input type="text" class="form-control"  value="<?php echo $row[4];?>" id="username" maxlength="8" placeholder="" name="price" size="40" required/>
							
							</div>						
							
						</td>	
					
					</tr>		

					<tr>

						<td>

							<label>No of tickets to be sold:</label>						
							
						</td>

						<td>

							<div class="form-inline has-primary">

								<input type="text" value="<?php echo $row[5];?>" class="form-control" id="stock" placeholder="" name="no" size="40"  required/>
							
							</div>						
							
						</td>	
					
					</tr>
		

					<tr>

						<td>

							<label></label>						
							
						</td>

						<td>
							
							<br>
						
							<input type="submit" name="add" class="btn btn-primary" value="Make Change!">						
							<input type="hidden" name="id" class="btn btn-primary" value="<?php echo$row[0];?>">						
						
						</td>	
					
					</tr>									
				
				</tbody>		
			
			</table>

		  </div>

		</form>
		
		</div>

	</div>

</div>

<br />

<script>

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};

</script>

<?php

	include("controllers/foot.php");

}

?>