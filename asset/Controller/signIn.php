<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

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
 
     <!-- CSS -->
     <link rel="stylesheet" href="../css/signIn_Up.css">
</head>
<body>
    <!--NAVIGATION-->
    <nav class="navbar navbar-expand-xl  navbar-light bg-light " id="navbar">
        <a class="navbar-brand" href="../../index.php">THE PIRATES</a>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="../../index.php" class="btn btn-success" type="button" style="margin-top: 20px;">Go Home</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6 content">
                <h1 class="text-center">Log In</h1>
                <form action="" method="POST">
                    <label for="Email">Email:</label>
                    <input class="input" type="text" name="email" id="email">

                    <br>
                    <label for="Password">Password:</label>
                    <input class="input" type="password" name="password" id="password">

                    <br>
                    <input type="checkbox" name="rememberPasw" id="rememberPasw">
                    <label for="Remember Password">Remember Me</label>
                    
                    <br>
                    <button class="btn btn-primary btn-login" type="submit">Login</button>
					<?php
					if (isset($_POST["email"]) && isset($_POST["password"])) {
						$email = $_POST["email"];
						$password = $_POST["password"];
						$sql = "SELECT * FROM account_admin WHERE email = '$email' AND password = '$password'";
						require_once("../../conn.php");
						
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							$_SESSION["email"] = $email;
							$_SESSION["name"] = $data[0];
							header("Location: ../Admin/index.php");
						}else {
							$email = $_POST["email"];
							$password = $_POST["password"];
							$sql = "SELECT * FROM account_customer WHERE email = '$email' AND password = '$password'";
							require_once("../../conn.php");
							
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$_SESSION["email"] = $email;
								$_SESSION["name"] = $data[0];
								header("Location: ../../index.php");
							}else{
								echo "Login faile";
							}
						}
					}
					?>
					
                    <hr color="#cccccc">
                    <p class="text-center">Or login with</p>
                    <button class="btn btn-success btn-fb">Facebook</button>
                    <button class="btn btn-success btn-gg">Google</button>
					
					<p class="text-center"><a href = "signUp.php">Create a new account</a></p>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>