<?php
    session_start();
    include("db.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=$_POST['mail'];
    $password=$_POST['pass'];
    if(!empty($email) && !empty($password)){
        $query="select * from shop_signup where Email = '$email' limit 1";
        $result=mysqli_query($con,$query);
        if($result){
            if($result && mysqli_num_rows($result)>0){
                $user_data=mysqli_fetch_assoc($result);

                if($user_data['Password']==$password) {
            header("location:index.html");
         }else{
           echo "<script type='text/javascript'>alert('PASSWORD IS WRONG')</script>";
         }
        }
}
    }else{
        echo "<script type='text/javascript'>alert('ERROR!!!!!!')</script>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login {
            position: relative;
            height: 350px;
            width: 430px;
            border: 2px black;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding-left: 50px;
            padding-right: 50px;
            border-radius: 10px;
        }
        .login h5 {
            text-align: center;
            font-size: 30px;
            padding: 30px;
        }
        .login .input-container {
            position: relative;
            margin-bottom: 20px;
        }
        .login input {
            width: calc(100% - 45px);
            height: 30px;
            padding-left: 30px;
            margin-bottom: 10px;
            border: none;
            border-bottom: 2px solid black;
        }
        .login .fas {
            position: absolute;
            right: 10px;
            top: calc(50% - 15px);
            color: #333;
            font-size: 20px;
        }
        .login #form1::placeholder,
        .login #form2::placeholder {
            color: black;
        }
        .logindown {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .logindown label {
            align-items: center;
            color: #333;
            font-size: 15px;
        }
        .logindown input[type="checkbox"] {
            width: 17px;
            height: 17px;
            margin-right: 5px;
        }
        .logindown a {
            text-decoration: none;
            color: blue;
        }
        .logindown a:hover {
            text-decoration: underline;
        }
        .button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .wall {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('https://static.vecteezy.com/system/resources/previews/004/299/830/original/shopping-online-on-phone-with-podium-paper-art-modern-pink-background-gifts-box-illustration-free-vector.jpg');
            background-size: cover;
            background-position: center;
        }
        .butwhat {
            margin-top: 10px;
            width: 150px;
            height: 40px;
            font-size: 20px;
            color: white;
            background-color: deeppink;
            border-radius: 10px;
            border: none;
        }
        .butwhat:hover {
            background-color: palevioletred;
            color: #000;
        }
    </style>
</head>
<body>
<div class="wall"></div>
<div class="login">
    <h5>LOGIN ACCOUNT</h5>
    <form method="POST">
        <div class="input-container">
            <input id="form1" name="mail" type="email" placeholder="Enter your email" required>
            <i class="fas fa-user"></i>
        </div>
        <div class="input-container">
            <input id="form2" name="pass" type="password" placeholder="Enter your password" required>
            <i class="fas fa-lock"></i>
        </div>
        <div class="logindown">
            <label><input id="form3" type="checkbox" style="width: 17px; height: 17px;"> Remember me</label>
            <a href="#">Forgot Password?</a>
        </div>
        <div class="button">
            <button type="submit" name="submit" class="butwhat">LOGIN</button>
        </div>
    </form>
</div>
</body>
</html>
