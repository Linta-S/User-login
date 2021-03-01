<!DOCTYPE HTML>  
<html>
<head>
<style>
 .error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$fnameErr=$lnameErr = $emailErr = $genderErr =$usernameErr =$pswErr =$remailErr = "";
$fname=$lname = $email = $gender = $username = $psw = $remail= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
  }


   
  if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
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
    
  

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  // 2nd field

  if (empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }





  if (empty($_POST["remail"])) {
    $remailErr = "Email is required";
  } else {
    $remail = test_input($_POST["remail"]);
    // check if e-mail address is well-formed
    if (!filter_var($remail, FILTER_VALIDATE_EMAIL)) {
      $remailErr = "Invalid email format";
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

<?php
       
       $myfile = fopen("open.txt", "r");
       fwrite($myfile, $fname);
       echo "<br>";
       fwrite($myfile, $lname);
       echo "<br>";
       fwrite($myfile, $email);
       echo "<br>";
       fwrite($myfile, $gender);
       echo "<br>";
       fwrite($myfile, $username);
       echo "<br>";
       fwrite($myfile, $psw);
       echo "<br>";
       fwrite($myfile, $remail);
       echo "<br>";
       fclose($myfile);

     ?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

   <fieldset>
 
    <legend>Basic information</legend>
  FirstName: <input type="text" name="fname">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>
  LastName: <input type="text"  name="lname">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
 
</fieldset>


<fieldset>
 
   <legend>User Account Information</legend>

 

    <label for="username">Username/userid:</label>
    <input type="text" id="username" name="username" required>
    <span class="error">* <?php echo $usernameErr;?></span>
   <br>
   <br>
    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
     <br>
     
  
</div>

<br>

Recovery Email Address: <input type="text" name="remail">
  <span class="error">* <?php echo $remailErr;?></span>
<br>
   
     
<input type="submit" name="submit" value="Submit"> 

</fieldset>

</form>

<?php
echo "<h2>Basic information:</h2>";
echo "Name: ". $fname .$lname;
echo "<br>";
echo "Email". $email;
 
 
echo "<br>";
echo "Gender:  "  .$gender;

echo "<h2>User Account Information:</h2>";
echo "Recovered-Email: ". $remail;
echo "<br>";
echo "User Name: ".$username;
echo"<b></b>";
?>
</body>
</html>