<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deluxe Room</title>

    <!--icon-->
    <link rel="shortcut icon" type="icon" href="../../img/icon-hotel.png">

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
    <link rel="stylesheet" href="../../css/detailRoom.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light navbar-custom ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around align-item-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../Controller/deletebangtam.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../aboutUs.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../promotions.php">Promotions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../account.php">Account</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container room-detail">
        <div class="row first-row">
		<?php
								
						if (isset($_GET["id"])) {
							$id = $_GET["id"];
							require_once("../../../conn.php");
							$sql = "SELECT * FROM room WHERE id = $id";
							$result = $conn->query($sql);
							if ($result->num_rows == 1) {
								$row = $result->fetch_assoc();
							
								
							}
					}
		?>
            <div class="col-lg-8 col-12 room-name">
                <h2 id="typeOfRoom">Family Room</h2>
                <span>Room: </span><span id="nameOfRoom"><?php echo $row["name"] ?></span>
                <hr>
                <img id="imgOfRoom" src="../../Uploads/<?php echo $row["image"] ?>"alt="img-deluxe-room">
            </div>
            <div class="col-lg-4 col-12 book-this-room">
					<a href="../../Controller/booking.php?id=<?php echo $row["id"] ?>" class="btn button-link-book" type="button">Book This Room</a>
                <hr>
                <p class="desc_title">Price</p>
                    <ul>
                        <li id="priceOfRoom"><sup>$</sup><?php echo $row["price"] ?></li>
                    </ul>
                <p class="desc_title">Main detail</p>
                <ul>
                    <li>Limit 3 people</li>
                    <li>2m bed</li>
                    <li>Big bathroom</li>
                    <li>Clean room</li>
                </ul>
                <p class="desc_title">Room area</p>
                <ul>
                    <li>40 m<sup>2</sup></li>
                </ul>
            </div>
			<?php
					
			?>
        </div>
        <div class="row">
            <div class="col-12 description">
                <hr>
                <p class="desc_title">Discription</p>
                <p id="description">
                    This room is suitable for couples and children (limit 2 children), or 3 people. 
                    Luxurious interiors, affordable rooms. 
                    Very suitable for businessmen, boss, 
                    This is a quite spacious room, clean and tidy room, 
                    creating excitement when you have the opportunity to 
                    travel and experience our services.The room is full of 
                    essential equipment, you just need to go and 
                    everything else is left to our service.
                </p>
                <p class="desc_title">Convenient</p>
                <div class="d-flex">
                    <ul>
                        <li>Dryer</li>
                        <li>Bathup</li>
                        <li>Fan</li>
                        <li>Air conditioner</li>
                        <li>Sandals for customer</li>
                        <li>Electric water boiling kettle</li>
                    </ul>
                    <ul>
                        <li>Extra bed (1.6 m)</li>
                        <li>High speed wifi</li>
                        <li>Televison</li>
                        <li>Netflix</li>
                        <li>Towels</li>
                        <li>Personal hygiene tools (as gift)</li>
                    </ul>
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