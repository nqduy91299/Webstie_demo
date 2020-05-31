<?php
session_start();
	if(!isset($_SESSION["email"])){
		header("Location: ../Controller/signIn.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <!--icon-->
    <link rel="shortcut icon" type="icon" href="../img/icon-hotel.png">
        
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/account.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../fonts/fontawesome-free-5.13.0-web/css/all.css">

    <!--font familly-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;700&display=swap" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    <!--NAVIGATION-->
    <nav class="navbar navbar-expand-xl  navbar-light bg-light " id="navbar">
        <a class="navbar-brand" href="./index.php">THE PIRATES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutUs">ABOUT US<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rooms">ROOMS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promotions">PROMOTIONS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-us">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-12" style="display: flex; justify-content: space-between;">
                <a href="../../index.php" class="btn btn-success" style="color: white; padding: 10px 20px;">Back to Home</a>
                <h2>Account</h2>
                <a href="../Controller/logout.php" class="btn btn-danger" role="button">Log out</a>
            </div>
        </div>
        <div style="background-color: #f1f1f1; box-shadow: 5px 5px 5px #2c2828a1; margin-bottom: 50px; margin-top: 50px; padding: 50px 0;" class="row">
            
			<div class="col-lg-6">
			<?php
						$user = $_SESSION["email"];
						//echo $_SESSION["email"];
						require_once("../../conn.php");
						$sql = "SELECT * FROM account_customer WHERE email='$user'";
						$result = $conn->query($sql);
						
						if($result->num_rows ==1){
							$row = $result->fetch_assoc();
							$email = $row["email"];
						}
						
			?>
                <div class="account_infor">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header text-center"><h4>Your Infomation</h4></div>
                        <div class="card-body">
                            <div class="infor">
                                <p>Your name: </p>
                                <span><?php echo $row["name"] ?></span>
                            </div>
                            <div class="infor">
                                <p>Your email:</p>
                                <span><?php echo $row["email"] ?></span>
                            </div>
                            <div class="infor">
                                <p>Your phone:</p>
                                <span><?php echo $row["phone"] ?></span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="booking-history">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header text-center"><h4>Booking History</h4></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Check-in</th>
                                    <th scope="col">Check-out</th>
                                    <th scope="col">Room</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
													
													require_once("../../conn.php");
													$sql = "SELECT *FROM info
														WHERE email='$user' ";
													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														// output data of each row
														while($row = $result->fetch_assoc()) {
															
													
													?>		
															<tr >
															
																<td><?php echo $row["checkin"]?></td>
																<td><?php echo $row["checkout"]?></td>
																<td><?php echo $row["nameRoom"]?></td>
																
															</tr>
													<?php 
														}
													}
													?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- FOOTER -->
    <footer>
        <div class="footer-footer container-fluid d-flex justify-content-around py-3 footer__row-copyright">
            <div class="footer-footer-name" style="font-family:'Courier New', Courier, monospace">
                Copyright ©2020 All rights reserved 
            </div>
        </div>
    </footer>
</body>
</html>