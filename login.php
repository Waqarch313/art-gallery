<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/login.css"/>

</head>
<body>
<?php
    require('con.php');
    if(isset($_POST['username'])){
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM `users` WHERE username ='$username' AND password ='" .md5($password)."'";
        $result = mysqli_query($con, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            $_SESSION['username']== $username;
            header("location: upload.php");
        }else{
            echo
            "<div class='form alert aleart.info'>
                <h3>error in username or password</h3>
                <p class='link'>click her<a href='login.php'>login again</a></p>
                </div>";
        }
    }else{    
?>
<main class="form-singin">
    <div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="form" method="post" name="login">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
                    <label for="floatingInput" required>username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
                    
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <label for="floatingpassword" required>password</label><br>
					<input type="password" class="from-control" name="password" id="floatingPassword" placeholder="Password">
                    
				</div>
				<button class="button login__submit" name="submit" type="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
                    
				</button>		
                <p class="link"> dont have account!<a href="regestration.php">Register a new member</a>		
			</form>
			<div class="social-login">
				<h3>log in via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</main>
    <?php
    }
    ?>
</body>
</html>