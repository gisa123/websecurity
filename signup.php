<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Web Sec</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="sign.php" method="POST">
	<fieldset style="width: 30%; position: absolute; margin-left: 450px; margin-top: 100px;">
	 <legend>Signup form </legend>
	 <label>Firstname:&nbsp;</label><input type="text" name="fname" class="corn"><br><br>
	 <label>Lastname:&nbsp;</label><input type="text" name="lname" class="corn"><br><br>
	 <label>email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="email" name="email" class="corn"><br><br>
	 <label>username:&nbsp;</label><input type="text" name="uname" class="corn"><br><br>
	 <label>password:&nbsp;</label><input type="password" name="password" class="corn" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 10 or more characters" name="psw" required>
	 <br><br>
	 <input type="submit" name="" value="create account" class="button button1"> <a href="index.php">back</a>
	 </fieldset>
</form>
</div>
  <div id="message">
  <p id="letter" class="invalid"></p>
  <p id="capital" class="invalid"> </p>
  <p id="number" class="invalid"> </p>
  <p id="length" class="invalid"></p>
</div>
</body>
<script type="text/javascript">
	var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 10) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>