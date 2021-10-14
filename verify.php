<?php
session_start();


require_once('database.php');

// LOGIN USER
if (isset($_POST['ver'])) {
  /*$username=$_SESSION['username'];
    $password=$_SESSION['pwd'];
    */
    $email=$_SESSION['email'];
    $code=$_POST['code'];

    
   $query = "SELECT * FROM system_user WHERE code=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i',$code);
    if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
  if($num_rows > 0){
      $query = "UPDATE system_user SET status='Verified' WHERE email=? ";
  $stmti = $conn->prepare($query);
$stmti->bind_param('s',$email);
$stmti->execute();
$stmti->close();
header('location:index.php');

    }
  else{
    echo "Wrong activation code ";
  }

  }

//..........................................
  //Verify after creating an account




?>