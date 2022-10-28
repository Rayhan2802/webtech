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
$usernameErr = $passwordErr = $nameErr = $emailErr = $confirmpasswordErr = $genderErr = "";
$username = $password = $name = $email = $confirmpassword = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
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
    // check if password is valid
    if (!filter_var($password, FILTER_VALIDATE_RETYPE_PASSWORD)) {
      $passwordErr = "Invalid password format";
    }
  }
  if (empty($_POST["password"])) {
    $confirmpasswordErr = "password is required";
  } else {
    $confirmpassword = test_input($_POST["password"]);
    // check if password is valid
    if (!filter_var($confirmpassword, FILTER_VALIDATE_PASSWORD)) {
      $confirmpasswordErr = "Invalid password format";
    }
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'     =>     $_POST["username"],  
                     'gender'     =>     $_POST["gender"],  
                     'password'     =>     $_POST["password"], 
                     'confirmpassword'     =>     $_POST["confirmpassword"],  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
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
  Confirm Password: <input type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
  <span class="error">* <?php echo $confirmpasswordErr;?></span>
  <br><br>
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  


  <input type="submit" name="submit" value="Submit">  
    <input type="reset" name="reset" value="reset">  

</form>

<?php
echo "<h2>Your Input:</h2>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $confirmpassword;
echo "<br>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
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