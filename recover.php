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
    background-color: #4CAF50;
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
  <?php
  $new=$_GET['new'];
  if(empty($new)){
  echo "can't change your password";
}
else{
  ?>
  <form action="resetpas.php" method="POST">
  <fieldset>
    Reset password?<br><br>
    <input type="text" name="password" placeholder="new password" required><br>
    <input type="text" name="password1" placeholder="confirm password" required><br>
    <input type="hidden" name="new" value="<?php echo $new;?>">
    <input type="submit" name="but" value="Update password" class="button button1">
  </fieldset><br>
</form>
<?php
}
?>
</body>
</html>