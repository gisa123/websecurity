<?php
session_start();
if(isset($_POST) & !empty($_POST)){
  if(isset($_POST['csrf_token'])){
    if($_POST['csrf_token'] == $_SESSION['csrf_token']){
    }
    else {
      echo"CSRF Validation Failed.";
    }
  }
}
$token = md5(uniqid(rand(), true));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Web Sec</title>
</head>
<body>
	<form method="POST">
		<fieldset>
		<legend> Login Here</legend>
		<label>username:</label><input type="text" name="uname" class="corn" value="<?php if(isset($_COOKIE["uname"])) { echo $_COOKIE["uname"]; } ?>"><br><br>
		<label>Password:</label><input type="password" name="password" class="corn" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="remember" <?php if(isset($_COOKIE["uname"])) { ?> checked <?php } ?>>Keep me Sign In<br><br>
		<input type ="hidden" name="csrf_token" value="<?php echo $token; ?>">
		<input type="submit" value="login" class="button button1"><br>
		verify now <a href="emver.php">clik here</a>
		Don't have an account?<a href="signup.php">Register</a>&nbsp;&nbsp;Forgot password?<a href="forget">Reset</a>
	</fieldset>
	</form>
</body>
</html>