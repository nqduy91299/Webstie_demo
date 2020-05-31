<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <!--icon-->
    <link rel="shortcut icon" type="icon" href="../img/icon-hotel.png">
        
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <!-- Font Awesome -->
     <link rel="stylesheet" href="../fonts/fontawesome-free-5.13.0-web/css/all.css">

     <!--font familly-->
     <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;700&display=swap" rel="stylesheet">
 
     <!-- Jquery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../css/booking.css">
</head>
<body>
    <!--NAVIGATION-->
    <nav class="navbar navbar-expand-xl  navbar-light bg-light " id="navbar">
        <a class="navbar-brand" href="deletebangtam.php">THE PIRATES</a>
    </nav>
	<form id="formconfirm" action="checkInfo.php" method="POST" enctype="multipart/form-data" novalidate>
    <div class="container">
		<?php
						if (isset($_GET["id"])) {
							$id = $_GET["id"];
							require_once("../../conn.php");
							$sql = "SELECT * FROM room,bangtam WHERE id = $id";
							$result = $conn->query($sql);
							if ($result->num_rows ==1) { 
								$row = $result->fetch_assoc();
								$checkin = $row["checkIn"];
								$checkout = $row["checkOut"];
								$ngay = ((int)substr( $checkout,0,2))-((int)substr( $checkin,0,2));
							}
					}
		?>
        <div class="row content">
            <div class="col-lg-8 col-12" style="padding: 0 10px;">
                <h1 style="font-weight: 300;">The Last step to get your room</h1>
                <hr>
                <p class="text-center">Confirm your information!</p>
                <hr>

                <!-- SHOW ROOM'S NAME -->
                <div class="showNameOfRoom">
                    <p>Your room you're going to book is: </p> <span id="nameOfRoom">
						<input name="type" value="<?php echo $row["type"]?>"readonly></span>
                </div>
				<br>
                <img src="../Uploads/<?php echo $row["image"] ?>" alt="">
                <hr>

                <!-- CHECK IN _ CHECK OUT -->
                <div class="check-in-out">
                    <div class="check-in">
                        <p>Check-in: </p> <span id="check-in-room">
							<input name="checkIn" value="<?php echo $row["checkIn"]?>" readonly>
						</span> <p>2:00 PM</p>
                    </div>
                    <div class="check-out">
                        <p>Check-out: </p> <span id="check-out-room">
							<input name="checkout" value="<?php echo $row["checkOut"]?>" readonly>
						</span> <p>12:00 PM</p>
                    </div>
                </div>
                <br>
                <!-- TOTAL PRICE -->
                <div class="card total-price">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="showRoom ">
                                        <p>Room: </p> <span id="room-name">
											<input name="nameRoom" value="<?php echo $row["name"]?>" readonly>
										</span>
                                    </div>
                                    <div class="showRoom">
                                        <p>Total rooms:</p> <span id="total-room">
										<input name="room" value="<?php echo $row["room"]?>" readonly>
										</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="showRoom">
                                        <p>Price of this room:</p> <span id="price-room">
										<input name="priceRoom" value="<?php echo $row["price"]?>" readonly>
										</span><span>$</span>
                                    </div>
                                    <div class="showRoom ">
                                        <p>Total days: </p> <span id="total-day">
										<input name="ngay" value="<?php echo $ngay?>" readonly>
										</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex" style="justify-content: space-between; font-size: 25px;"> 
                        Price ($):
                        <span>
							<input name="price" value="<?php echo ($row["price"])*($row["room"])*$ngay?>" readonly>
						</span>
                    </div>
                  </div>
            </div>
			<!--Kiểm tra nếu có session sẽ tự thêm thông tin vào-->	
				
					
					<?php
					if (isset($_SESSION["email"])){
						$user = $_SESSION['email'];
						require_once("../../conn.php");
						$sql = "SELECT * FROM account_customer WHERE email='$user'";
						$result = $conn->query($sql);
						if($result->num_rows ==1){
							$row = $result->fetch_assoc();

					?>	<div class="col-lg-4 col-12" style="padding: 0 10px;">
						<hr>
						<div class="card customer-info">
							<div class="card-header">Confirm your information</div>
							<div class="card-body">
								<form action="">
									<label for="name">Your name:</label>
									<input type="text" name="nameUser" id="customer-name" value="<?php echo $row["name"] ?>" readonly required>

									<label for="email">Your email:</label>
									<input type="email" name="email" id="customer-email" value="<?php echo $row["email"]?>" readonly required>
									
									<label for="phone">Your phone:</label>
									<input type="tel" pattern=".{10}" name="phone" value="<?php echo $row["phone"] ?>" id="customer-phone" readonly required>

									<button class="btn btn-book">Book</button>
									
								</form>
							</div>
						</div>
						<hr>
						<div class="card">
							<div class="card-header">Related Infomation</div>
							<div class="card-body rel-info">
								<a href="../View/aboutUs.php" class="btn btn-success" role="button" target="_blank">Hotel rules</a>
								<a href="../View/aboutUs.php" class="btn btn-info" role="button" target="_blank">Booking regulations</a>
							</div>
						</div>
					</div>
						<?php
						}
						
						}else{
						?>
							<div class="col-lg-4 col-12" style="padding: 0 10px;">
								<hr>
								<div class="card customer-info">
									<div class="card-header">Confirm your information</div>
									<div class="card-body">
										<form action="">
											<label for="name">Your name:</label>
											<input type="text" name="nameUser" id="customer-name"  required>

											<label for="email">Your email:</label>
											<input type="email" name="email" id="customer-email"   required>
											
											<label for="phone">Your phone:</label>
											<input type="tel" pattern=".{10}" name="phone" required>

											<button class="btn btn-book">Book</button>
											
										</form>
									</div>
								</div>
								<hr>
								<div class="card">
									<div class="card-header">Related Infomation</div>
									<div class="card-body rel-info">
										<a href="../View/aboutUs.php" class="btn btn-success" role="button">Hotel rules</a>
										<a href="../View/aboutUs.php" class="btn btn-info" role="button">Booking regulations</a>
									</div>
								</div>
							</div>
					<?php
					}
			?>
		
        </div>
    </div>
	</form>
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