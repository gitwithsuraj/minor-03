<?php
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');
  $email = filter_input(INPUT_POST,'email');
  $mobile = filter_input(INPUT_POST,'mobile');
  if (!empty($username)){
  if (!empty($password)){
  if (!empty($email)){
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "prasun";
  // Create connection
  $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

  if (mysqli_connect_error())
  {
    die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
  }
  else
  {
    if($email != "")
    { 
    $res = mysqli_query($conn, "SELECT * from `registration` where email='".$email."'");
    $num_rows= mysqli_num_rows($res);
      if($num_rows>0)
      {
        echo "Email Exists";
        die();
      }
    }



    <!DOCTYPE html>
<html>
    <head>
        <title>Form site</title>
    </head>
    <body bgcolor="skyblue"><br><br>
        <form method="post" action="./connect.php">
            <table align="center"> <caption> Registration Form </caption>
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td>E-Mail : </td><td><input type="email" name="email" placeholder="Enter Email" required></td>
                </tr>
                <tr>
                    <td>Mobile Number : </td>
                    <td><input type="phone" name="mobile" placeholder="Enter Mobile Number" required></td>
    if($mobile !="")
    {
      $res = mysqli_query($conn,"SELECT * FROM `registration` where mob='".$mobile."'");
      $num_rows= mysqli_num_rows($res);
        if($num_rows>1)
        {
          echo "You cannot register the same mobile number thrice";
          die();
        }
    }
    $sql = "INSERT INTO registration (name, password, email, mob) values ('$username','$password','$email','$mobile')";
  
    if ($conn->query($sql))
    {
      echo "New record is inserted sucessfully";
    }
    else
    {
      echo "Error: ". $sql ."
      ". $conn->error;
    }
    $conn->close();
  }
}

  else 
  {
  echo "Email should not be empty";
  die();
  }
}
else
{
  echo "Password should not be empty";
  die();
}
}
else
{
  echo "Username should not be empty";
  die();
}
?>
