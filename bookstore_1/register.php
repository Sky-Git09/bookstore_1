<?php

$conn = mysqli_connect('localhost','root','','shopo') or die('connection failed');


if(isset($_POST['Submit'])){

   $Username = mysqli_real_escape_string($conn, $_POST['Username']);
   $Email = mysqli_real_escape_string($conn, $_POST['Email']);
   $Phno = mysqli_real_escape_string($conn, $_POST['Phno']);
   $Ppassword = mysqli_real_escape_string($conn, md5($_POST['Ppassword']));
   $Cpassword = mysqli_real_escape_string($conn, md5($_POST['Cpassword']));
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);

   $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE Email = '$Email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
     $message[] = 'user already exist!';
   } else {
     if($Ppassword != $Cpassword){
       $message[] = 'confirm password not matched!';
     } else {
       // insert new user into the database
       mysqli_query($conn, "INSERT INTO `user`(Username, Email, Phno, Ppassword, gender) VALUES('$Username', '$Email', '$Phno', '$Cpassword', '$gender')") or die('query failed');
       $message[] = 'registered successfully!';
       header('location:login.php');
     }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <?php
    if(isset($message)){
       foreach($message as $message){
          echo '
          <div class="message">
             <span>'.$message.'</span>
                <ion-icon name="close" class="i" onclick="this.parentElement.remove();" ></ion-icon>
          </div>
          ';
       }
    }
    ?>
    <div class="container">
        <div class="content">
            
            <div class="card">
                <h2>REGISTER</h2>
                <form action="#" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <input type="text" class="inputbox" required name="Username">
                            <span class="details">Username</span>
                            <i></i>
                        </div>
                        <div class="input-box">
                            <input type="Email" class="inputbox" required name="Email">
                            <span class="details">Email</span>
                            <i></i>
                        </div>
                        <div class="input-box">
                            <input type="number" class="inputbox" required name="Phno">
                            <span class="details">Phone no.</span>
                            <i></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="inputbox" id="pwd" required name="Ppassword">
                            <span class="details">Password</span>
                            <span class="eye" onclick="myfunction()">
                                <ion-icon name="eye" class="aac" id="hide1"></ion-icon>
                                <ion-icon name="eye-off" class="aac" id="hide2"></ion-icon>
                            </span>
                            <i></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="inputbox" id="cpwd" required name="Cpassword">
                            <span class="details">Confirm Password</span>
                            <span class="eye" onclick="myfunction1()">
                                <ion-icon name="eye" class="aac" id="hide3"></ion-icon>
                                <ion-icon name="eye-off" class="aac" id="hide4"></ion-icon>
                            </span>
                            <i></i>
                        </div>
                        <div id="showerror"></div>
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="gender" id="dot-1" value="m" required>
                        <input type="radio" name="gender" id="dot-2" value="f" required>
                        <input type="radio" name="gender" id="dot-3" value="o" required>
                        <span class="gen-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="gender">Prefer not to say</span>
                           </label>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn" name="Submit"> 
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span> 
                                    Submit</button><br>
                    
                </form>
                <p>Already have an account?<a href="login.php"> Login</a></p>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html> 
