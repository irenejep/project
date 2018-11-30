<?php

include("controllers/head.php");

require_once('library.php');

$rand = strtoupper(get_rand_id(10));

$msg="";

if (isset($_POST["add"])){

    $paybill = $_POST['paybill'];

    $phone = $_POST['phone'];

    $amount = $_POST['amount'];


    include_once('data.php');

    $ccc = "INSERT INTO mpesa (paybill,phone,transno,amount) VALUES ('$paybill','$phone','$rand','$amount')";

    if (!mysqli_query($con,$ccc)) {

        $msg=

            '
						<div class="alert alert-warning fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Error Sending Transaction!</strong>
						</div>
					'
        ;

    }  else{

        $msg=

            '
						<div class="alert alert-success fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>'.$rand.' Confirmed on Number '.$phone.'. Amount in Ksh.'.$amount.'/= </strong>
						</div>
					'
        ;

        mysqli_close($con);
    }


}

?>
<!--    <nav class="navbar navbar-inverse visible-xs">
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
                    <li><a href="mainpanel.php">Accounting System! Dashboard</a></li>

                    <li><a href="sold_outs.php">Sold Tickets</a></li>

                    <li class="active"><a href="mpesa.php">M-Pesa Platform</a></li>

                    <li><a href="logout.php">Sign Out!</a></li>

                </ul>
            </div>
        </div>
    </nav>
-->
    <div class = "container-fluid">

    <div class="row content">

        <div class="col-sm-3 sidenav hidden-xs">
<!--
            <h2><img src="image/ticket.png" class="img-responsive" alt="LOGO"></h2>

            <ul class="nav nav-pills nav-stacked">

                <li><a href="mainpanel.php">Accounting System! Dashboard</a></li>

                <li><a href="sold_outs.php">Sold Tickets</a></li>

                <li class="active"><a href="mpesa.php">M-Pesa Platform</a></li>

                <li><a href="logout.php">Sign Out!</a></li>

            </ul><br>-->

        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <h4><img src="image/safcom.png" class="img img-rounded" height="50px" width="100px"> M-Pesa Dashboard</h4>
                <p>Enter, view Dummy Amount to a paybill here...</p>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 text-center ">

            <?php

            echo $msg;

            ?>
            <table class = "table table-bordered well">

                <thead>

                </thead>


                <tbody>

                <form method="POST" action="mobile.php">

                    <tr>

                        <td class = "td-col">

                            Paybill No: <input type="number" name="paybill" class="form-control" id="age" required/>

                        </td>

                        <td class = "td-col">

                            Phone No: <input type="number" name="phone" class="form-control" id="age" required/>

                        </td>

                        <td class = "td-col">

                            Amount: <input type="number" name="amount" class="form-control" id="age" required/>

                        </td>

                    </tr>


                    <tr>

                        <td colspan="3" class = "td-col">

                            <input type="submit" name="add" class="btn btn-primary" value="Enter Dummy Amount!" />

                            <a href="mpesa.php" class="btn btn-default">Go Back</a>

                        </td>

                    </tr>

                </form>

                </tbody>

            </table>

        </div>

        <div class="col-sm-3 col-lg-3">	  </div>

    </div>

    <br /><br /><br />

    <!-- to place the footer at its place manualy-->

<?php

include("controllers/foot.php");

?>