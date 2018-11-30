<?php
$notify="";
$error="";
	include("data.php");
	
	//catching a get request from HTTP
	
	if (isset($_GET['buy']) ) {

		$id = $_GET['buy'];
		
		$res = mysqli_query($con,"Select * from tickets WHERE tID = '$id' ");
		
		while($row = mysqli_fetch_array($res))
		{
		
		//holding every details from tickets field to push to soldouts table.....

		$tid = $row['tID'];
		
		$image = $row['image'];
		
		$title = $row['title'];
		
		$desc = $row['description'];
		
		$pricing = $row['price'];
		
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
		
		/*
		
		*insert a code to call the M-Pesa Platform to confirm if tickets exits.
		
		*Query if transacton code exists in the M-Pesa Platform in the database...
		
		*/
		
		$q = mysqli_query($con,"SELECT * FROM mpesa WHERE transno = '$mpesa' " );
		
		$numrows = mysqli_num_rows($q);
		
		$find = mysqli_fetch_assoc($q);
		
		//variable fetched to hold M-Pesa Amount
		
		$amt = $find['amount'];
		
		$phon = $find['phone'];
		
		$trns = $find['transno'];
		
		//end/.
		
		//validating  codes to prevent unlogical part of facial hackker minded..
		if($numrows == 0 ) {
			
			$error ="<div class='text-danger'><p class='text-center'> Sorry we have not yet received the amount in our account. Kindly, Wait for 1 Min and try again.</p></div>";
			
		}else if($trns !== $mpesa ){
			
			$error = "<div class='text-danger'><p class='text-center'> The M-Pesa Transaction No is not known in our M-Pesa Paybill Platform ): .</p></div>";
			
		}else {
			
			
			
		
		
		
		/*
		
		*End Querying.
		
		*End Statement.
		
		*/
		
		

		$insert = "INSERT INTO sold_outs (tid,fname,lname,email,phone,no_of_tickets,mpesa_transaction_no,image,title,description)

		VALUES 
		
		('$tid','$fname','$lname','$email','$phone','$no_of_tickets','$mpesa','$image','$title','$desc')";
		
		if (! mysqli_query($con,$insert)){
			
			$notify = "<div class='alert alert-danger'>
                The transaction number has already been used!
            </div>";
			
		}else{
			
			$notify="<div class='alert alert-success'>
			
				You have successfully bought $no_of_tickets ticket.
			
			</div>";
			
		}
		
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
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

</head>

<body style="font-family: 'Raleway',sans-serif ">

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
        <!-- Title -->
        <div class="row">
		<div class="thumbnail text-center">
			<?php
			
				echo "<h4>Event Title: $title</h4>";
			
			?>
		</div>
		<?php
			echo $notify;
			echo $error;
		?>
            <div class="col-lg-12">
                <h4>Buying Ticket</h4>
            </div>
        </div>
        <!-- /.row -->
        <!-- Page Features -->
	<div class ="row">
	<div class="col-sm-6">
        <!-- image of the ticket -->
		<div class="thumbnail">
			<?php
				echo "<img src = $image height='50%' width='50%' />";
			?>
		</div>
	</div>
        <div class="col-sm-6">
            <form role="form" class="form-inline" method="post" action="buy.php">
                <input type="text" name="fname" class="form-control" id="q" size="35" placeholder="First Name" required /
                <input type="text" name="lname" class="form-control" id="q" size="35" placeholder="Last Name" required />
                <br /><br />
                <input type="email" name="email" class="form-control" id="q" size="50" placeholder="Email" required />
                <input type="number" name="phone" class="form-control" id="q" size="50" placeholder="Phone Number" required />
                <br /><br />
                <select name = "no_of_tickets" class="form-control" placeholder="Phone Number" required >
                    <option>--Select No Of Tickets--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="12">12</option>
                </select>
                <input type="text" name="mpesa_transaction_no" class="form-control" id="q" size="50" placeholder="M-Pesa Transaction Number" required />
                <input type="hidden" name="tid" class="form-control" id="q" size="50" placeholder="M-Pesa Transaction Number" value="<?php echo $tid;?>" required />
                <input type="hidden" name="image" class="form-control" id="q" size="50" placeholder="M-Pesa Transaction Number"  value="<?php echo $image;?>" required />
                <input type="hidden" name="title" class="form-control" id="q" size="50" placeholder="M-Pesa Transaction Number"  value="<?php echo $title;?>" required />
                <input type="hidden" name="description" class="form-control" id="q" size="50" placeholder="M-Pesa Transaction Number"  value="<?php echo $desc;?>" required />
                <br /><br />
                <button type="submit" name="purchase" class="btn btn-primary btn-block" >Purchase Ticket</button>
            </form>
        </div>
    </div>
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; EventTicketing 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>