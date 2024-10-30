<?php
   session_start();
   include("db.php"); 

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = $_POST['mail'];
      $name = $_POST['username'];
      $password = $_POST['pass'];
      $mobile = $_POST['num'];

      if(!empty($email) && !empty($name) && !empty($mobile) && !empty($password)){
         $query = "INSERT INTO shop_signup (Email, UserName, Password, MobileNo) VALUES ('$email', '$name', '$password', '$mobile')";
         $result = mysqli_query($con, $query);

         if($result){
            echo "<script type='text/javascript'>alert('Registration Successful!')</script>";
            echo "<script>window.location.href = 'index.html';</script>";
            exit;
         } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
         }
      } else {
         echo "All fields are required.";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fashion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: "Roboto";
            background-size: cover;
            background-repeat: no-repeat;
            height:auto;
            width:auto;
        }
        .wall{
            background-position: bottom;
            background-image: url('https://static.vecteezy.com/system/resources/previews/002/623/464/non_2x/concept-of-shopping-online-with-smart-phone-on-blue-sky-background-vector.jpg');
            background-size: cover;
            height:700px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login{
            height: 400px;
            width: 400px;
            border: 2px black;
            text-align: center;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }
        .login h5{
            font-size: 30px;
            margin-bottom: 20px;
        }
        .login input {
            width: calc(87% - 50px);
            height: 30px;
            margin-bottom: 15px;
            padding-left: 30px;
            border: none;
            border-bottom: 2px solid black;
        }
        .login .input-container {
            position: relative;
        }
        .login .fas {
            position: absolute;
            right: 5px;
            top: calc(50% - 10px);
            color: #333;
            font-size: 20px;
        }
        .button button{
            margin-top: 10px;
            width: 150px;
            height: 40px;
            font-size: 20px;
            color: white;
            background-color: #0099ff;
            border-radius: 10px;
            border: none;
        }
        .button button:hover{
            background-color: lavender;
            color: #000;
        }
        .last{
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .last a{
            margin-left: 10px;
            color: blue;
            text-decoration: none;
        }
        .last a:hover{
            text-decoration: underline;
        }
        .home-btn {
            width: 80px;
            height: 30px;
            font-size: 20px;
            color: black;
            background-color: lightblue;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }
        .home-btn:hover{
            background-color: lavender;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="wall">
        <div class="login">
            <h5>SIGN UP</h5>
            <form method="POST">
                <div class="input-container">
                    <input id="form1" name="mail" type="email" placeholder="Enter your email"required>
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="input-container">
                    <input id="form3" name="username" type="text" placeholder="Enter your username"required>
                    <i class="fas fa-user"></i>
                </div>
                <div class="input-container">
                    <input id="form2" name="pass" type="password" placeholder="Enter password"required>
                    <i class="fas fa-lock"></i>
                </div>
                <div class="input-container">
                    <input id="form4" name="num" type="text" placeholder="Enter your phone number"required>
                    <i class="fas fa-phone"></i>
                </div>
                <div class="button">
                    <button type="submit">SIGN UP</button>
                </div>
            </form>
            <div class="last">
                <h4>Already have an account?</h4>
                <a href="login.php">LOGIN</a>
            </div>
            <br>
            <form action="openingpage.html">
                <button class="home-btn" type="submit">Home</button>
            </form>
        </div>
    </div>
</body>
</html>
