<?php

$conn = mysqli_connect('localhost','root','','shopo') or die('connection failed');
session_start();

if(isset($_POST['Submit'])){

   $Email = mysqli_real_escape_string($conn, $_POST['Email']);
   $Ppassword = mysqli_real_escape_string($conn, md5($_POST['Ppassword']));

   $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE Email = '$Email' AND Ppassword = '$Ppassword'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);
      $_SESSION['Username'] = $row['Username'];
      $_SESSION['Email'] = $row['Email'];
      $_SESSION['id'] = $row['id'];
      header('location:home.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index2.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <div class="content1">
        <div class="card1">
        <h2>LOGIN</h2>
                        <form action="login.php" method="post">
                            <div class="input-box">
                                <input type="email" class="inputbox" required name="Email">
                                <span class="ab">Email</span>
                                <i></i>
                            </div><br><br>
                            <div class="input-box">
                                <input type="password" class="inputbox" required id="pwd1" name="Ppassword">
                                <span class="abc">Password</span>
                                <span class="eye" onclick="myfunction2()">
                                    <ion-icon name="eye-outline" class="fa" id="hide5"></ion-icon>
                                    <ion-icon name="eye-off-outline" class="fa" id="hide6"></ion-icon>
                                </span>
                                <i></i>
                            </div>
                            <button type="submit" class="submit-btn" name="Submit"> 
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span> 
                                Submit</button><br>
                            <input type="checkbox" class="input-box"><span class="ac">Remember me</span>
                        </form><br>
                        <p>Don't have an account? <a href="register.php">  register</a></p>  
                        <a href="#" class="aa">Forgot password?</a>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>