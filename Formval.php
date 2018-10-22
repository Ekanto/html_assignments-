<!DOCTYPE html>
<html>
<head>
  <style>
    .error {color : #FF0000;}
  </style>
  <title></title>
</head>
<body style="background: green">
  <h1 style="font-style: italic;">Your informations are:</h1>
  <?php
  $nameErr = $emailErr = $genderErr = $passErr = $cpassErr= $cnpassErr = $phoneErr = $bdayErr = $phoneErr = "";
$firstname = $lastname = $email = $gender = $bday= $password = $cpassword = $phone =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["fname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $nameErr = "Only letters and white space allowed";
    }
    else{ echo "Your firstname is :"  . $firstname; echo "<br> <br>";}
  }


  if (empty($_POST["lname"])) {
    $nameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $nameErr = "Only letters and white space allowed";
    }
    else{ echo "Your lastname is :"  . $lastname; echo "<br><br>";}
  }

  if(empty($_POST["bday"])){
  $bdayErr = "Birthday required";
} else{
  $bday = $_POST["bday"];
  echo "Your date of birth is: " .$bday; echo "<br><br>";
}


 if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
    echo "Your gender is :"  . $gender; echo "<br><br>";
  }


   if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
    else{echo "Your email is :"  . $email; echo "<br><br>";}
  }

   if(empty($_POST["phone"])){
  $phoneErr = "Phone number required";
} else{
  $phone = $_POST["phone"];
  echo "Your phone number is: " .$phone; echo "<br><br>"; 
}

  



  if(empty($_POST["password"])){
  $passErr = "Password is required";
}else{
  $password = test_input($_POST["password"]);
  if($_POST["password"] != $_POST["cpassword"]){
  $cnpassErr = "Password doesn't match";
} 
  else{echo "Your Password is :"  . $password; echo "<br><br>";}
}

  
  

if(empty($_POST["cpassword"])){
  $cpassErr = "Password is required";
}else{
  $cpassword = test_input($_POST["cpassword"]);
  if($_POST["password"] != $_POST["cpassword"]){
  $cnpassErr = "Password doesn't match";
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
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset style="color: red">
      <legend>E-mail Signup</legend>
    Firstname: <input type="text" name="fname">
    <span class="error">*<?php echo $nameErr;?></span>
    <br> <br>
    Lastname: <input type="text" name="lname">
    <span class="error">*<?php echo $nameErr;?></span>
    <br> <br>
    Date of Birth:<br>
        <input type="date" name="bday"  min="1900-01-01" max="2016-12-31" >
        <br><br>
    Gender: <br>
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") ?> value="Male" checked >Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") ;?> value="Female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") ;?> value="other">Other  
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Phone number: <input type="text" name="phone">
    <span class="error">*<?php echo $phoneErr;?></span>
    <br> <br>
    Password:<br>
    <input type="password" name="password"> 
    <span class="error">*<?php echo $passErr;?></span>
    <br><br>
    Confirm Password:<br>
    <input type="password" name="cpassword"> 
    <span class="error">*<?php echo $cpassErr; echo $cnpassErr;?></span>
    <br><br>  
    <input type="submit" name="Submit">
    </fieldset>
  </form>
</body>
</html>