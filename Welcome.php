
Firstname: <?php 
$fname;
if(preg_match("/^([a-zA-Z' ]+)$/",$fname)){
    echo $_POST['fname'];
}else{
    echo 'Invalid name given.';
}
?> <br>

  
   
Lastname: <?php echo $_POST['lname']; ?> <br>
Gender: <?php echo $_POST['gender']; ?> <br>
Date of Birth : <?php echo $_POST['bday']; ?> <br>
Phone: <?php echo $_POST['number']; ?> <br>
E-mail : <?php echo $_POST['email']; ?> <br>
Password : <?php echo $_POST['psw']; ?> <br>
Re typed password : <?php echo $_POST['repsw']; ?>

	
