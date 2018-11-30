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
        <li class="active"><a href="add_tickets.php">New Events Tickets</a></li>
        <li><a href="list_products.php">View Uploaded Tickets</a></li>
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

        <li class="active"><a href="add_tickets.php">New Events Tickets</a></li>
		
        <li><a href="list_products.php">View Uploaded Tickets</a></li>
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

				// Check if image file is a actual image or fake image
			if (isset($_POST['add'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }

                $pname = $_POST['pname'];
                $pdesc = $_POST['pdesc'];
                $price = $_POST['price'];
                $no = $_POST['no'];


                if (empty ($pname)) {

                    echo
                    '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Required! </strong>Fill Ticket Title.
						</div>
					';
                } else if (empty ($target_file)) {
                    echo
                    '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Required!</strong> Ticket image.
						</div>
					';
                } else if (empty ($pdesc)) {
                    echo
                    '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Required!</strong> Title description.
						</div>
					';
                } else if (empty ($price)) {
                    echo
                    '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Required!</strong> price field.
						</div>
					';
                } else if (!is_numeric($price)) {
                    echo
                    '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Invalid!</strong> Only digits required in the  price field.
						</div>
					';
                } else if (empty ($no)) {
                    echo
                    '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Required!</strong> no of Tickets To be sold.
						</div>
					';
                } else if (!is_numeric($no)) {
                    echo
                    '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Invalid!</strong> Only digits required in the  no of Tickets To be sold.
						</div>
					';
                } else {

                    include_once('data.php');


                    $ccc = "INSERT INTO tickets (image,title,description,price,total_no_of_tickets)
					VALUES ('$target_file','$pname','$pdesc','$price','$no')";

                    if (!mysqli_query($con, $ccc)) {
                        echo

                        '
						<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Not successfully!</strong> <a href="add_products.php">click here</a> to reload page.
						</div>
					';

                    } else {

                        echo

                        '
						<div class="alert alert-success fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>New Event Ticket Added !</strong> .
						</div>
					';

                        mysqli_close($con);
                    }


                }


                // Check if file already exists
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }

			   
			?>
			
		

		<form method="POST" class="form-inline" action="add_tickets.php" enctype="multipart/form-data">

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
						
							<input id="uploadFile" placeholder="Choose File" class="form-control" disabled="disabled" required />
							
							<div class="fileUpload btn btn-primary btn-sm">
								
								<span>Upload</span>
								
								<input id="uploadBtn"  name="fileToUpload" type="file" class="upload" />
							
							</div>						
							
						</td>	
					
					</tr>				

					<tr>
						
						<td>

							<label>Ticket Title:</label>						</td>

						<td>
							
							<div class="form-inline has-primary">

								<input type="text" class="form-control" id="username" placeholder="" name="pname" size="40" required/>
							</div>						</td>	
					</tr>		

					<tr>
						
						<td>

							<label>Ticket Schedules:</label>						</td>

						<td>
							
							<div class="form-inline has-primary">
							  <textarea rows="4" cols="30" class="form-control" id="pdesc" placeholder="" name="pdesc" required></textarea>
							</div>					  </td>	
					</tr>

					<tr>

						<td>

							<label>Ticket Price:</label>						</td>

						<td>

							<div class="form-inline has-primary">

								<input type="number" class="form-control" id="username" maxlength="8" placeholder="" name="price" size="40" required/>
							</div>						</td>	
					</tr>		

					<tr>

						<td>

							<label>No of tickets to be sold:</label>						</td>

						<td>

							<div class="form-inline has-primary">

								<input type="number" class="form-control" id="stock" placeholder="" name="no" size="40"  required/>
							</div>						</td>	
					</tr>
		

					<tr>

						<td>

							<label></label>						</td>

						<td>
							<br>
						<input type="submit" name="add" class="btn btn-primary" value="Add">						</td>	
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