<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
<?php include('config.php'); 
// REGISTER USER
  if (isset($_POST['signup'])) 
  {
    // receive all input values from the form
    $usern = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $errors = 0;
    
    $pass = md5($password_1);//encrypt the password before saving in the database
    $sql = "INSERT INTO users(username,phone,email,password)VALUES('$usern','$phone','$email','$pass')";

    //$sql = "INSERT INTO person SET first_name = 'John', last_name = 'Doe';
    //$sql = INSERT INTO users "."(username, phone, email, password) "."VALUES"."('$usern', '$phone', '$email', '$password_1')";
    if ($conn->query($sql) === TRUE)
    {
      $_SESSION['user'] = $usern;
      header('location: index.php');
    }
    else{
      echo  "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  else
  {
    echo "<div class='row'>
          </div><br><br>
          <div class='sub-title' style='font-size: 15px;'><p><a href='index.php'>Home</a> <a style='color:var(--purple)'> > Sign up</a></p>
          <hr></div>

          <form class='center1' method='post' action='signup.php'>
            <h2>Sign Up</h2>
            <div class='input-group'>
              <label>Username</label>
              <input type='text' name='username'>
            </div>
            <div class='input-group'>
              <label>Email</label>
              <input type='email' name='email'>
            </div>
            <div class='input-group'>
              <label>Phone No.:</label>
              <input type='text' name='phone'>
            </div>
            <div class='input-group'>
              <label>Password</label>
              <input type='password' name='password_1'>
            </div>
            <div class='input-group'>
              <label>Confirm password</label>
              <input type='password' name='password_2'>
            </div>
            <div class='input-group'>
              <button type='submit' class='btn' name='signup'>SignUp</button>
            </div>
            <p>
              Already a member? <a href='login.php' class='links'>Login</a>
            </p>
          </form>";
  }
?>
<div class="footer">
  <h2>Footer</h2>
</div>
</body>
</html>