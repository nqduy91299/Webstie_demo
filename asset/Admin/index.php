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
    <title>Admin</title>

    <!--icon-->
    <link rel="shortcut icon" type="icon" href="../img/icon-hotel.png">
    

     <!--Bootstrap 4-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <!-- Font Awesome -->
    <link rel="stylesheet" href="../fonts/fontawesome-free-5.13.0-web/css/all.css">
    
     <!-- CSS -->
     <link rel="stylesheet" href="../css/main-admin.css">

    <!--font familly-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;700&display=swap" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-sm  navbar-light bg-light" id="navbar">
        <a class="navbar-brand" href="#">THE PIRATES</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../Controller/logout.php">Log out</a>
            </li>
        </ul>
    </nav>


    <!-- CONTENT -->
    <div class="container-fluis">
        <div style="margin: 0;" class="row">
            <div style="padding: 0; height: 100%;" class="col-lg-2">
                <div class="tab">
                    <button id="defaultOpen" class="tablinks" onclick="openTab(event, 'Rooms')">Rooms</button>
                    <button class="tablinks" onclick="openTab(event, 'Booking')">Booking</button>
                    <button class="tablinks" onclick="openTab(event, 'Statistical')">Statistical</button>
                    <!--<button class="tablinks" onclick="openTab(event, 'Promotions')">Promotions</button>-->
                    <button class="tablinks" onclick="openTab(event, 'Accounts')">Accounts</button>
                </div>
            </div>
            <div style="padding: 0;" class="col-lg-10">
                <div class="main-contain">

                    <!-- TAB ROOMS -->
                    <div id="Rooms" class="tabcontent">
                        <h1 class="text-center">Rooom Management</h1>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-success" href = "../Controller/addNewRoom.php"><i class="fas fa-home"></i><br>Add a new room</a>
                        </div>
                        <div class="table-content">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
									<th scope="col">Hình ảnh</th>
                                    <th cope="col">Name</th>
                                    <th cope="col">Price ($)</th>
                                    <th scope="col">Type</th>
									<th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
										require_once("../../conn.php");
										$sql = "SELECT * FROM room";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										
										?>		
												<tr class="item">
													<td><img src="../uploads/<?php echo $row["image"] ?>" style="max-height: 80px"></td>
													<td><?php echo $row["name"]?></td>
													<td><?php echo $row["price"]?></td>
													<td><?php echo $row["type"]?></td>
													<td>
														<a href="../Controller/deleteroom.php?id=<?php echo $row["id"] ?>" class="delete" 
															data-target="#deleteModal"><i class="fas fa-trash"></i></a>

													</td>
												</tr>
										<?php 
											}
										}
									?>
				
									<tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
										<td colspan="5">
											<p>Số lượng phòng: <?= $result->num_rows?></p>
										</td>
									</tr>

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- TAB BOOKING -->
                    <div id="Booking" class="tabcontent">
                        <h1 class="text-center">Booking Management</h1>
                        <hr>
                        <div class="table-content">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Price ($)</th>
                                    <th scope="col">Phone</th>	
                                    <th scope="col">Check in</th>
                                    <th scope="col">Check out</th>
                                   
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
										require_once("../../conn.php");
										$sql = "SELECT * FROM info";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										
										?>		
												<tr class="item">
													<td><?php echo $row["nameUser"] ?></td>
													<td><?php echo $row["email"]?></td>
													<td><?php echo $row["price"]?></td>
													<td><?php echo $row["phone"]?></td>
													<td><?php echo $row["checkin"]?></td>
													<td><?php echo $row["checkout"]?></td>
												</tr>
										<?php 
											}
										}
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                    <!-- TAB STATISTICAL -->
                    <div id="Statistical" class="tabcontent">
                        <h1 class="text-center">Statistical Management</h1>
                        <hr>

                        <div class="table-content">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Total Booking</th>
                                    <th scope="col">Total Money ($)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
										require_once("../../conn.php");
										$sql = "SELECT SUM(price), COUNT(id_info) FROM info";
										$result = $conn->query($sql);
										$data = mysqli_fetch_row($result);
										//print_r($data);
										if ($result->num_rows > 0) {
											
											$sum = $data[0];
											$count = $data[1];
										?>		
												<tr class="item">
													<td><?php echo $count?></td>	
													<td><?php echo $sum?>$</td>	
												</tr>
										<?php 
										}
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- TAB PROMOTIONS -->
                    

                    <div id="Accounts" class="tabcontent">
                        <h1 class="text-center">Account Management</h1>
                        <hr>

                        <div class="table-content">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
										require_once("../../conn.php");
										$sql = "SELECT * FROM account_customer";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										
										?>		
												<tr class="item">
													<td><?php echo $row["name"]?></td>
													<td><?php echo $row["email"]?></td>
													<td><?php echo $row["password"]?></td>
													<td><?php echo $row["phone"]?></td>
													
													<td>
														<a href="../Controller/deleteaccount.php?id=<?php echo $row["id"] ?>" class="delete" 
															data-target="#deleteModal"><i class="fas fa-trash"></i></a>

													</td>
												</tr>
										<?php 
											}
										}
									?>
									<tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
										<td colspan="5">
											<p>Số lượng tài khoản: <?= $result->num_rows?></p>
										</td>
									</tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    
    

    <script src="../js/main-admin.js"></script>
</body>
</html>