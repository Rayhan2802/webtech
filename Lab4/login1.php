<!DOCTYPE HTML>  
<html>
<head>
  
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<fieldset>
<?php 

  $x=10;
  $y=5;
  
  echo "<h1>KhutiBD</h1>";


 ?>
 <center><title> KhutiBD </title>
  <a href="http://localhost/lab4/Include-Require/navbar.php">Home</a>
   <a href="http://localhost/lab4/Registration1.php">Registration</a>
  <a href="http://localhost/lab4/login1.php">Login</a>
</center>
 </fieldset>  


<fieldset>
<fieldset>
<?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
    if (!filter_var($password, FILTER_VALIDATE_EMAIL)) {
      $passwordErr = "Invalid password format";
    }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  
  <input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";

?>
</fieldset>
</fieldset>

</body>
</html>
<fieldset>
  <center><?php
echo "<p>Copyright &copy; 1999-" . date("Y");
?></center>
 
</fieldset>