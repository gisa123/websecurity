
<?php
include "database.php";
session_start();
   
    if(!isset($_SESSION['uname'],$_SESSION['password'])){
  header("location:index.php");
}
$username = $_POST["uname"];
$check=0;
$sql = "SELECT * FROM system_user";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
   $uname =$row["username"];
   $password =$row["password"];
   if($_POST['uname']===$uname && sha1($_POST['password'])===$password){
        $check=1;
    }
    }}

 
    if($check==1){
        $_SESSION['uname'] = $uname;
        $_SESSION['password'] =$password;
        echo "<script>alert ('welcome!')</script>";
        ?>
        <br>
<title>Web Sec</title>
        <style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background: #eeeeee;
}

/* Header/logo Title */
.header {
  padding: 1px;
  text-align: center;
  background: #4CAF50;/*#1abc9c;*/
  color: white;
}
.header h1 {
  font-size: 40px;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}
.navbar a.right {
  float: right;
}
.navbar a:hover {
  background-color: #4CAF50;
  color: black;
}
.navbar a.active {
  background-color: #666;
  color: white;
}
.row {  
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

.side {
  -ms-flex: 30%;
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
}

@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
  <h1><?php
  echo "hello ".$username;
  ?></h1>
  <p>You are welcome here!.</p>
</div>

<div class="navbar">
  <a href="#" class="active">Dashboard</a>
  <a href="#">All users</a>
  <a href="#">Add user</a>
  <a href="logout.php" class="right">Logout</a>
</div>
        <br><br><br>
        <fieldset style="width: 10%; position: absolute;">
          All Users<br>
          <?php
                                            $query = "SELECT COUNT(*) totaluser FROM system_user;";
                                                $result = mysqli_query( $conn, $query );
                                                $totaluser = mysqli_fetch_assoc( $result );
                                                echo $totaluser['totaluser'];
                                            ?>
        </fieldset><br><br><br>
        <?php
        if(!empty($_POST["remember"])) {
            setcookie ("uname",$_POST["uname"],time()+ 3600);
            setcookie ("password",$_POST["password"],time()+ 3600);

    }}
    else{
        echo "<script>alert ('username or password incorrect!')</script>";
        echo "<script>location.href='index.php'</script>";
    }
    
mysqli_close($conn);
?>
