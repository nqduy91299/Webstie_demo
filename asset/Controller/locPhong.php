<?php
	require_once("../../conn.php");
	$sql = "SELECT guest FROM bangtam";
    $result = $conn->query($sql);
	$data = mysqli_fetch_row($result);
	//print_r($data);
	$guest = $data[0];
	//print_r($people);
	
	//
	if($guest<=2){
		?>
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>The Pirates Hotel - Rooms</title>

		<!--icon-->
		<link rel="shortcut icon" type="icon" href="../img/icon-hotel.png">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="../fonts/fontawesome-free-5.13.0-web/css/all.css">
	   
		<!--font familly-->
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;700&display=swap" rel="stylesheet">

		<!--Bootstrap 4-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 
		<!-- CSS -->
		<link rel="stylesheet" href="../css/rooms.css">

		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		</head>
		<body>
			<div class="container-fluid container__brandBG">
				<div class="row justify-content-md-center">
					<div class="col-lg-8 col-md-6 container_brand">
						<h1 class="display-3 brand">Rooms</h1>
					</div>
				</div>
			</div>
			<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top navbar-custom ">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-around align-item-center" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../Controller/deletebangtam.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Rooms</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Promotions</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Account</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-12 title">
						<h2>Rooms list</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12 rooms__list">
						<!-- Deluxe room -->
						<div class="row room__items">
							<?php
								require_once("../../conn.php");
								$sql = "SELECT * FROM room WHERE type='Deluxe Room'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
								
							?>		
							<div class="col-lg-8">
								<a href="../view/rooms/deluxeDetailRoom.php?id=<?php echo $row["id"] ?>">
									<img class="img__room" src="../Uploads/<?php echo $row["image"] ?>" alt="img-delux-room-beachview">
								</a>
							</div>
							<div class="col-lg-4">
								<h3>Deluxe room</h3>
								<sup>$</sup><strong><?php echo $row["price"] ?></strong><span>/ per night</span>
								<ul>Convenient: 
									<li>Beachview <i class="fas fa-umbrella-beach"></i></li>
									<li>30m<sup>2</sup></li>
									<li>1.8m bed <i class="fas fa-bed"></i></li>
									<li>Bathtub <i class="fas fa-bath"></i></li>
									<li>Dryer</li>
									<li>Free coffee <i class="fas fa-mug-hot"></i> ... <a href="../view/rooms/deluxeDetailRoom.php?id=<?php echo $row["id"] ?>">BOOK THIS</a></li>
								</ul>
							</div>
							<?php
									}
								}
							?>
						</div>
						
						<!--single-->
						<div class="row room__items">
							<?php
								require_once("../../conn.php");
								$sql = "SELECT * FROM room WHERE type='Single Room'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
								
							?>		
							<div class="col-lg-8">
								<a href="../view/rooms/singleDetailRoom.php?id=<?php echo $row["id"] ?>">
									<img class="img__room" src="../Uploads/<?php echo $row["image"] ?>" alt="familyDetailRoom">
								</a>
							</div>
							<div class="col-lg-4">
								<h3>Single room</h3>
								<sup>$</sup><strong><?php echo $row["price"] ?></strong><span>/ per night</span>
								<ul>Convenient: 
									<li>Beachview <i class="fas fa-umbrella-beach"></i></li>
									<li>30m<sup>2</sup></li>
									<li>1.8m bed <i class="fas fa-bed"></i></li>
									<li>Bathtub <i class="fas fa-bath"></i></li>
									<li>Dryer</li>
									<li>Free coffee <i class="fas fa-mug-hot"></i> ... <a href="../view/rooms/singleDetailRoom.php?id=<?php echo $row["id"] ?>">BOOK THIS</a></li>
								</ul>
							</div>
							<?php
									}
								}
							?>
						</div>
		</div>
        </div>
        <br/>
        <hr>
    </div>




    <!--FOOTER -->
    <footer>
        <div class="container-fluid superContainer__footer">
            <div class="row row-footer">
                <div class="col-lg-4 col-xl-3 mx-3 footer__aboutUs-contact">
                    <p style="font-size: 24px; text-transform: uppercase;">We are honored to serve you. Have a nice day. </p>
                    <p>Contact me: <span style="font-weight: 900; background-color: black; color:  white; padding: 10px">+84833335699</span></p>
                    <img src="../img/logo-brandName.png" alt="logo-brandName" width="100%">
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer__useFul-link">
                    <h6 class="footer-title">Useful link</h4>
                    <div class="link">
                        <ul class="list-group-flush listgroup-link">
                            <li class="list-group-item link-item">
                                <a href="#">About us</a>
                            </li>
                            <li class="list-group-item link-item">
                                <a href="#">Roons</a>
                            </li>
                            <li class="list-group-item link-item">
                                <a href="#">Promotions</a>
                            </li>
                            <li class="list-group-item link-item">
                                <a href="#">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer__follow-us">
                    <h6 class="footer-title">Social Media</h4>
                    <p style="margin-top: 20px; font-size: 16px;">If you don't want to miss any promotion, please follow us on our social media platform.</p>
                    <div class="icon-area">
                        <a href="#">
                            <i class="fab fa-facebook "></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 mx-3 footer__contact">
                    <h6 class="footer-title">Contact Us</h4>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt" style="margin-top: 22px; margin-right: 5px;"></i>
                        <p style="margin-top: 20px; font-size: 16px; color: black !important;" >19 Đường Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh</p>
                    </div>
                    <div class="contact-item">
                        <i class="far fa-envelope" style="margin-top: 22px; margin-right: 5px;"></i>
                        <p style="margin-top: 20px; font-size: 16px; color: black !important;" >thepirateshotel@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-footer container-fluid d-flex justify-content-around py-3 footer__row-copyright">
            <div class="footer-footer-name" style="font-family:'Courier New', Courier, monospace">
                Copyright ©2020 All rights reserved 
            </div>
        </div>
    </footer>

    
    <script src="../js/rooms.js"></script>
	<?php	
	}
	
	//
	else{
		?>
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>The Pirates Hotel - Rooms</title>

		<!--icon-->
		<link rel="shortcut icon" type="icon" href="../img/icon-hotel.png">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="../fonts/fontawesome-free-5.13.0-web/css/all.css">
	   
		<!--font familly-->
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;700&display=swap" rel="stylesheet">

		<!--Bootstrap 4-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	 
		<!-- CSS -->
		<link rel="stylesheet" href="../css/rooms.css">

		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		</head>
		<body>
			<div class="container-fluid container__brandBG">
				<div class="row justify-content-md-center">
					<div class="col-lg-8 col-md-6 container_brand">
						<h1 class="display-3 brand">Rooms</h1>
					</div>
				</div>
			</div>
			<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top navbar-custom ">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-around align-item-center" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="../Controller/deletebangtam.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Rooms</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Promotions</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Account</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="container">
				<div class="row justify-content-md-center">
					<div class="col-12 title">
						<h2>Rooms list</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12 rooms__list">
						<!-- Deluxe room -->
						<div class="row room__items">
							<?php
								require_once("../../conn.php");
								$sql = "SELECT * FROM room WHERE type='Family Room'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
								
							?>		
							<div class="col-lg-8">
								<a href="../view/rooms/familyDetailRoom.php?id=<?php echo $row["id"] ?>">
									<img class="img__room" src="../Uploads/<?php echo $row["image"] ?>" alt="img-delux-room-beachview">
								</a>
							</div>
							<div class="col-lg-4">
								<h3>Family room</h3>
								<sup>$</sup><strong><?php echo $row["price"] ?></strong><span>/ per night</span>
								<ul>Convenient: 
									<li>Beachview <i class="fas fa-umbrella-beach"></i></li>
									<li>30m<sup>2</sup></li>
									<li>1.8m bed <i class="fas fa-bed"></i></li>
									<li>Bathtub <i class="fas fa-bath"></i></li>
									<li>Dryer</li>
									<li>Free coffee <i class="fas fa-mug-hot"></i> ... <a href="../view/rooms/familyDetailRoom.php?id=<?php echo $row["id"] ?>">BOOK THIS</a></li>
								</ul>
							</div>
							<?php
									}
								}
							?>
						</div>
						
						<!--single-->
						<div class="row room__items">
							<?php
								require_once("../../conn.php");
								$sql = "SELECT * FROM room WHERE type='Double Room'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
								
							?>		
							<div class="col-lg-8">
								<a href="../view/rooms/doubleDetailRoom.php?id=<?php echo $row["id"] ?>">
									<img class="img__room" src="../Uploads/<?php echo $row["image"] ?>" alt="familyDetailRoom">
								</a>
							</div>
							<div class="col-lg-4">
								<h3>Double room</h3>
								<sup>$</sup><strong><?php echo $row["price"] ?></strong><span>/ per night</span>
								<ul>Convenient: 
									<li>Beachview <i class="fas fa-umbrella-beach"></i></li>
									<li>30m<sup>2</sup></li>
									<li>1.8m bed <i class="fas fa-bed"></i></li>
									<li>Bathtub <i class="fas fa-bath"></i></li>
									<li>Dryer</li>
									<li>Free coffee <i class="fas fa-mug-hot"></i> ... <a href="../view/rooms/doubleDetailRoom.php?id=<?php echo $row["id"] ?>">BOOK THIS</a></li>
								</ul>
							</div>
							<?php
									}
								}
							?>
						</div>
		</div>
        </div>
        <br/>
        <hr>
    </div>




    <!--FOOTER -->
    <footer>
        <div class="container-fluid superContainer__footer">
            <div class="row row-footer">
                <div class="col-lg-4 col-xl-3 mx-3 footer__aboutUs-contact">
                    <p style="font-size: 24px; text-transform: uppercase;">We are honored to serve you. Have a nice day. </p>
                    <p>Contact me: <span style="font-weight: 900; background-color: black; color:  white; padding: 10px">+84833335699</span></p>
                    <img src="../img/logo-brandName.png" alt="logo-brandName" width="100%">
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer__useFul-link">
                    <h6 class="footer-title">Useful link</h4>
                    <div class="link">
                        <ul class="list-group-flush listgroup-link">
                            <li class="list-group-item link-item">
                                <a href="#">About us</a>
                            </li>
                            <li class="list-group-item link-item">
                                <a href="#">Roons</a>
                            </li>
                            <li class="list-group-item link-item">
                                <a href="#">Promotions</a>
                            </li>
                            <li class="list-group-item link-item">
                                <a href="#">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer__follow-us">
                    <h6 class="footer-title">Social Media</h4>
                    <p style="margin-top: 20px; font-size: 16px;">If you don't want to miss any promotion, please follow us on our social media platform.</p>
                    <div class="icon-area">
                        <a href="#">
                            <i class="fab fa-facebook "></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 mx-3 footer__contact">
                    <h6 class="footer-title">Contact Us</h4>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt" style="margin-top: 22px; margin-right: 5px;"></i>
                        <p style="margin-top: 20px; font-size: 16px; color: black !important;" >19 Đường Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh</p>
                    </div>
                    <div class="contact-item">
                        <i class="far fa-envelope" style="margin-top: 22px; margin-right: 5px;"></i>
                        <p style="margin-top: 20px; font-size: 16px; color: black !important;" >thepirateshotel@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-footer container-fluid d-flex justify-content-around py-3 footer__row-copyright">
            <div class="footer-footer-name" style="font-family:'Courier New', Courier, monospace">
                Copyright ©2020 All rights reserved 
            </div>
        </div>
    </footer>

    
    <script src="../js/rooms.js"></script>
	<?php	
	}
?>
	