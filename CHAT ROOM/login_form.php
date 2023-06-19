<?php

    @include 'db.php';
    
    session_start();
    
    if(isset($_POST['submit'])){
        
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $passwd = md5($_POST['passwds']);
    
       $select = " SELECT * FROM test WHERE email = '$email' && password = '$passwd'";
    
       $result = mysqli_query($conn, $select);
    
       if(mysqli_num_rows($result) > 0){
        
        while($row=mysqli_fetch_array($result)){
                $f_name = $row['first_name'];
                $l_name = $row['last_name'];

                $in = "INSERT INTO test (first_name,last_name,email,password,msg_text) VALUES ('$f_name','$l_name','$email','$passwd','Has Joined To The Chat Room At : ')";
        
                mysqli_query($conn,$in);

            }
        $_SESSION['emai'] = $email;
        $_SESSION['passw'] = $passwd;
        header('location:chat_form.php');
       }else{
          $error[] = 'incorrect password or email.';
       }
    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT ROOM / LOG IN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner2">
        <div class="box">
            <div class="title">
                <p>L o g I n F o r m</p>
            </div>
            <div class="box-info">
                <form action="" method='POST' enctype="multipart/form-data">
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<p class="error-msg">'.$error.'</p>';
                            }
                        }
                    ?>
                    <input type="email" name="email" placeholder='Email' required>
                    <input type="password" name="passwds" placeholder='Password' required>
                    <input type="submit" value="LOG IN" name="submit">
                    <p>don't have an account? <a href="register_form.php">register now!</a></p>
                </form>
            </div>
        </div>
</body>
</html>