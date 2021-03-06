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
<body style="font-family: 'Raleway', sans-serif;">
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
                        <a href="#">All Events</a>
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
        <div class="row">
            <form role="form" method="post">
                <div class="col-xs-12">
                    <div class="form-inline">
                        <input type="search" name="q" class="form-control" id="q" size="25" placeholder="search ticket name"  /><br>
                    </div>
                </div>
                <div class="col-xs-6">
                    <button type="submit" name="submit" value="search" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span> Search</button>
                </div>
                <div class="col-xs-6">
                    <button type="submit" name="submit" value="search" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span> View all</button>
                </div>
            </form>
        </div>
        <!-- Title -->
        <br>
        <div class="row text-center">
            <h4>All Selling Tickets</h4>
        </div>
        <!-- /.row -->
        <!-- Page Features -->
    	<?php
            include("data.php");
            $key = isset($_POST['q']) ? $_POST['q'] : ' ';
            $select = mysqli_query($con,"SELECT * FROM tickets WHERE title LIKE '%$key%' ") or die ('No offices found' . mysql_error() );
            $numrows = mysqli_num_rows($select);
            
            if($numrows == 0 ) {
                
                echo "<div class='text-danger'><p class='text-center'>No Ticket Found by the name <b>$key</b> </p></div>";
                
            }
            while($row = mysqli_fetch_assoc($select)) {
                echo "<div class=' text-center'> ";					
                echo "<div class='col-md-3 col-sm-6 hero-feature'>";
                echo '<div class="thumbnail">';
                echo "<img src=".$row['image']." class='img-responsive' style='width:100%; height:200px' alt='Image'>";
                echo "<div class='caption'><h3>".$row['title']."</h3>";
                echo "<p>".$row['description']."</p>";
                echo '<p><a href="buy.php?buy='.$row['tID'].' " class="btn btn-primary">Buy Now!</a> <a href="moreinfo.php?info='.$row['tID'].'" class="btn btn-default">More Info</a></p>';
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                
            }				
		?>
    </div>
    <!-- /.container -->
        <!-- Footer -->
        <!--<footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; EventTicketing 2017</p>
                </div>
            </div>
        </footer>-->
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>