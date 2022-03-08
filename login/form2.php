<?php



// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $usernameErr = $phoneErr = $passwordErr = "";
$name = $email = $gender = $comment = $website = $username = $phone = $password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
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
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  /*if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }*/

  /*if (empty($_POST["username"])) {
    $usernameErr = "User Name is required";
  } else {
    $username = test_input($_POST["username"]);
  }*/
  
  if (empty($_POST["phone"])) {
    $phoneErr = "phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }


  if (empty($_POST["password"])) {
    $password = "";
  } else {
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[*-.]).{6,}$/g',$password)) {
      $password = "Invalid password";
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

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  userName: <input type="text" name="userName" value="<?php echo $user['username'];?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $user['email'];?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  phone: <input type="text" name="phone" value="<?php echo $user['phone'];?>">
  <span class="error">* <?php echo $phoneErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $user['website'];?>">
  <span class="error">* <?php echo $websiteErr;?></span>
  <br><br>
  Password: <input type="text" name="paswword" value="<?php echo $user['password'];?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  
  
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
//require __DIR__.'/users/users.php';
//


?>