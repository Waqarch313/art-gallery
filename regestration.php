<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>تسجيل</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/login.css"/>
      
</head>
<body>
<?php
    require('con.php');
  
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
 
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        
        $query="SELECT `email` FROM `users` WHERE  `email` ='$email'";
    $result   = mysqli_query($con, $query);
        if (mysqli_num_rows($result) >0) {    
        "<div class='alert alert-danger' style='width:100%;height:100% ;text-align:center;'>
                  هذه البريد مستخدم من قبل
                  <p class='link'>اضغط هنا <a href='registration.php'>ادخل الان</a> لا التسجل</p>
                  </div>";
}else {


        $query = "INSERT INTO `users`( username, password, email)
                   VALUES ('$username', '" . md5($password) . "', '$email')";
        $result =mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form alert alert-info'>
                  <h3 class='text-cnter'>تم التسجيل بنجاح</h3><br/>
                  <p class='link text-cnter'>اضغط هنا <a href='login.php'>ادخل الان</a></p>
                  </div>
                                <script>
                    setTimeout(function(){window.location.href='login.php';},4000)     
                               </script>
                    ";
        } else {
            echo "<div class='form alert alert-info'>
                  <h3> Required fields are missing.</h3><br/>
                  <p class='link'>اضغط هنا <a href='registration.php'>سجل</a> اعد التسجيل</p>
                  </div>";
        }
   }} else {
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
					<i class="login__icon fas fa-user"></i>
                    <label for="floatingInput" required>email</label>
					<input type="email" class="form-control" name="email" placeholder="email">
                    
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
