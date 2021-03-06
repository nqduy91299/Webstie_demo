<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add A New Room</title>

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
     <link rel="stylesheet" href="../css/formAdd.css">

    <!--font familly-->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;700&display=swap" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-6 form-add">
                <form action="addRoom.php" method = "POST" enctype="multipart/form-data">
                    <h1 class="text-center">Add a New Room</h1>
                    <br>
                    <div class="name">
                        <label for="roomName">Name of room</label><br>
                        <input type="text" name="nameRoom" id="nameRoom">
                    </div>
                    <br>
        
                    <div class="price">
                        <label for="price">Price</label><br>
                        <input type="number" name="priceRoom" id="priceRoom">
                        <br><br>
                    </div>

                    <div class="type">
                        <label for="type">Type of Room</label><br>
                        <select name="typeRoom" id="typeRoom">
                            <option value="Single Room">Single Room</option>
                            <option value="Deluxe Room">Deluxe Room</option>
                            <option value="Family Room">Family Room</option>
                            <option value="Double Room">Double Room</option>
                        </select>
                        <br><br>
                    </div>
        
                    <div class="mb-3">
					  <label for="fileUpload">Image</label>
					  <div class="input-group">
						<input type="file" id="fileUpload" name="fileUpload" required>
					  </div>
					</div>

                    <div class="button text-right">
                        <a class="btn btn-danger" href="../Admin/index.php">Cancel</a>
                        <button class="btn btn-success" name="add">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
</body>
</html>