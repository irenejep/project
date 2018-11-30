<?php
$notify="";
	include("data.php");

	if (isset($_GET['info']) ) {

		$id = $_GET['info'];
		
		$res = mysqli_query($con,"Select * from tickets WHERE tID = '$id' ");
		
		while($row = mysqli_fetch_array($res))
		{
		
		//holding every details from tickets field to push to soldouts table.....

		$tid = $row['tID'];
		
		$image = $row['image'];
		
		$title = $row['title'];
		
		$desc = $row['description'];
		
		$price = $row['price'];
		
		$no_of_tick = $row['total_no_of_tickets'];
		
		/*to be entered by what time
		
		
		
		*/
		}

	}
	
	if (isset($_POST["purchase"])){
		
		$tid = $_POST['tid'];
		
		$image = $_POST['image'];
		
		$title = $_POST['title'];
		
		$desc = $_POST['description'];
		
		$fname = $_POST['fname'];
		
		$lname = $_POST['lname'];
		
		$email = $_POST['email'];
		
		$phone = $_POST['phone'];
		
		$no_of_tickets = $_POST['no_of_tickets'];
		
		$mpesa = $_POST['mpesa_transaction_no'];

		$insert = "INSERT INTO sold_outs (tid,fname,lname,email,phone,no_of_tickets,mpesa_transaction_no,image,title,description)

		VALUES 
		
		('$tid','$fname','$lname','$email','$phone','$no_of_tickets','$mpesa','$image','$title','$desc')";
		
		if (! mysqli_query($con,$insert)){
			
			die('Database Insertion Rejected check error'. mysqli_error($con) );
			
		}else{
			
			$notify="<div class='well text-center'>
			
				You have successfuly bought $no_of_tickets ticket.
			
			</div>";
			
		}
		
	}
	

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EventTicketing</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">EventTicketing</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="all.php">All Events</a>
                    </li>
                    <li>
                        <a href="#">More Sold Out</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>                    
					<li>
                        <a href="login.html">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
		

	
        <hr>

        <!-- Title -->
        <div class="row">
		
		<div class="thumbnail text-center">
		
			<?php
			
				echo "<h2>$title</h2>";
			
			?>
		
		</div>
		
		<?php
		
			echo $notify;
		
		?>
		
        </div>
        <!-- /.row -->

        <!-- Page Features -->
		
	<div class ="row">
	
	<div class="col-sm-6">
		
		<div class="thumbnail">
		
			<h4 class="text-center"><?php echo$desc; ?></h4>
		
		</div>
		
		<div class="thumbnail">
		
			<h5>Ticket Price: <?php echo$price; ?></h5>
		
		</div>		
		
		<div class="thumbnail">
		
			<h5>Remaining No of tickets: <?php echo$no_of_tick; ?></h5>
		
		</div>
		
	</div>
	
	
	<div class="col-sm-6">
        <!-- image of the ticket -->

		<div class="thumbnail">
		
			<?php
			
				echo "<img src = $image height='50%' width='50%' />";
			
			?>
		
		</div>
		
	</div>	
	
	</div>
	
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; EventTicketing 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>