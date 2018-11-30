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
<body style="font-family: 'Raleway', sans-serif ">
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
        <!-- Jumbotron Header -->
        <header class="jumbotron">
            <img src="image/ticket.png" height="100px" style="display: block; margin: auto" width="100px" />
            <h3 class="text-center">Talk to us.</h3>
            <!--<p><a class="btn btn-primary btn-large">Login</a></p>-->
        </header>
		<div class="container jumbotron">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<table>
					<tr>
						<td><p>Whatsapp:</p></td>
						<td class=" col-xs-1">07** *** ***</td>
					</tr>
					<tr>
						<td><p>Facebook:</p></td>
						<td class=" col-xs-1">/EventTicketing</td>
					</tr>
					<tr>
						<td><p>Twitter:</p></td>
						<td class=" col-xs-1">@EventTicketing</td>
					</tr>
				</table>
			</div>
			<div class="col-md-6 col-lg-6">
<?php
	
	$msg="";
	
	include("data.php");
	
		if (isset($_GET["sms"])){
			
			$name = $_GET['name'];
			
			$email = $_GET['email'];
			
			$message = $_GET['message'];
			
			$phone = $_GET['phone'];
			


			
			include_once('data.php');
			
			$ccc = "INSERT INTO contact (name,email,message,phone) VALUES ('$name','$email','$message','$phone')";
			
			if (!mysqli_query($con,$ccc)) {
				
				echo
					
				   '
						<div class="alert alert-warning fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Not successfully!</strong>
						</div>
					'
					;		

			}  else{ 

				echo
					
				   '
						<div class="alert alert-success fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Successful!</strong> Message sent.
						</div>
					'
					;

			   mysqli_close($con);
			}	
			
			
		}
	
	?>			
			<form method="get" action="contact.php">
				<input type="text" name="name" id ="name" placeholder="Name" class="form-control" required/>
				<div class="form-inline">
				<input type="email" name="email" id ="email" placeholder="Email" size="35	" class="form-control" required/>
				<input type="number" name="phone" id ="no" placeholder="Phone no" size="20" class="form-control" required/>
				</div>
				<textarea type="text" cols="40" rows="4" name="message" id ="name" placeholder="Message" class="form-control" required></textarea>
				<input type="submit" name="sms" id ="sms" value="Send" class="btn btn-primary btn-block"/>
			</form>
			
			</div>
			
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
