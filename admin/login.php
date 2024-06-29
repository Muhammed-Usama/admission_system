<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if($_SESSION["isadmin"]==1){
    header("Location:admin/dashboard.php");
  }elseif($_SESSION["already_registered"]==1){

    header("Location:profile.php");

  }else{
  header("location: index.php");
  exit;}
}
 
// Include config file
include("./include/db/db.php");
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; 

                            // Check if the user is an admin
                            $sql_isadmin = "SELECT isadmin FROM users WHERE username = ?";
                            if ($stmt_isadmin = mysqli_prepare($con, $sql_isadmin)) {
                                mysqli_stmt_bind_param($stmt_isadmin, "s", $param_username);
                                mysqli_stmt_execute($stmt_isadmin);
                                mysqli_stmt_bind_result($stmt_isadmin, $isadmin);
                                mysqli_stmt_fetch($stmt_isadmin);
                                $_SESSION["isadmin"] = $isadmin;
                                mysqli_stmt_close($stmt_isadmin);
                            }
                            $sql_already_registered = "SELECT already_registered FROM users WHERE username = ?";
                            if ($stmt_already_registered = mysqli_prepare($con, $sql_already_registered)) {
                                mysqli_stmt_bind_param($stmt_already_registered, "s", $param_username);
                                mysqli_stmt_execute($stmt_already_registered);
                                mysqli_stmt_bind_result($stmt_already_registered, $sql_already_registered);
                                mysqli_stmt_fetch($stmt_already_registered);
                                $_SESSION["already_registered"] = $sql_already_registered;
                                mysqli_stmt_close($stmt_already_registered);
                            }
                            
                            // Redirect user to appropriate page
                            if($_SESSION["isadmin"] == 1){
                                header("location: admin/dashboard.php");
                            } elseif($_SESSION["already_registered"]==1){
                                header("location: profile.php");
                            }else{
                                header("location: index.php");

                            }
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>NMU Admission  </title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./include/assets/css/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="signup.php" method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" id="name" name="name">
			<input type="text" placeholder="Email" id="username" name="username" required>
			<input type="password" placeholder="Password" id="password" name="password" required>		
			<button id="submit" name="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<!--input type="email" placeholder="Email" id="username" name="Username" -->
			<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="username" placeholder="Email" id="username" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div> 
			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" placeholder="Password" id="password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
			<a href="#">Forgot your password?</a>
			<button id="submit" name="submit">Sign In</button>
		
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- partial -->
  <script  src="include/assets/js/script.js"></script>

</body>
</html>
