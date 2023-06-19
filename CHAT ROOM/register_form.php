<?php
    error_reporting(0);

    $msg = "";

    @include 'db.php';

    if(isset($_POST['submit'])){
        $f_name = $_POST['first_name'];
        $l_name = $_POST['last_name'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);

        $select = "SELECT * FROM test WHERE password = '$pass'";

        $result = mysqli_query($conn,$select);

        if (mysqli_num_rows($result) > 0){
            $error[] = 'Error, User Already Exists';
        }else{
            if ($pass != $cpass){
                $error[] = 'Error, The Password Is Not Equal To The Password';
            }else{
                $insert = "INSERT INTO test (first_name,last_name,email,password,msg_text) VALUES('$f_name','$l_name','$email','$pass','')";
                
                $insert_result = mysqli_query($conn,$insert);
            
                header('Location: login_form.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CHAT ROOM / SIGN UP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner2">
        <div class="box">
            <div class="title">
                <p>R e g i s t e r F o r m</p>
            </div>
            <div class="box-info">
                <form action="#" method='POST' enctype="multipart/form-data">
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<p class="error-msg">'.$error.'</p>';
                            }
                        }
                    ?>
                    <input type="text" name="first_name" placeholder='First Name' required>
                    <input type="text" name="last_name" placeholder='Last Name' required>
                    <input type="email" name="email" placeholder='Email or PhoneNumber' required>
                    <input type="password" name="password" placeholder='Password' required>
                    <input type="password" name="cpassword" placeholder='Confirm Password' required>
                    <button name="submit">SIGN UP</button>
                    <p>already have an account? <a href="login_form.php">login now!</a></p>
                </form>
            </div>
        </div>
</body>
</html>