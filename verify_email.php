<!DOCTYPE html>
<html>
<head>
  <title>Web Sec</title>
  <style type="text/css">
    fieldset{
      background-color: #eeeeee;
      text-align: center;
  width: 30%; position: absolute; margin-left: 450px; margin-top: 100px;
    }
    input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #4CAF50;
}
.button{
    background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer
}
.button1 {border-radius: 50%;}
.button1:hover {
  background-color: #555555;
  color: white;
}
p{
  margin-left: 550px; margin-top: 280px;
}

  </style>
</head>
<body>
  <form action="verify.php" method="POST">
  <fieldset>
    code?<br><br>
    <input type="text" name="code" placeholder="code"><br>
    <input type="submit" name="ver" value="verify email" class="button button1">
  </fieldset><br>
</form>
</body>
</html>