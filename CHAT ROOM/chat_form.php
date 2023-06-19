<?php

@include 'db.php';

session_start();

if(!isset($_SESSION['passw'])){
   header('Location:Login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT ROOM / MESSAGES</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function aj(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if(req.readyState==4 && req.status==200){
                    document.getElementById('chat').innerHTML=req.responseText;
                }
            }        
        req.open('GET','chat.php',true);
        req.send();
        }
        setInterval(function(){aj()},1000)
    </script>
</head>
<body onload="aj();">
    <div class="banner3">
        <div class="borderer">
            <div id="chat">
            </div>
        </div>
        <div class="online-offline-users">
            <div class="Admin">
                <font class='admin'>Admin : </font>
                <font class='zaki'>ZAKI.AL _ ZAKARIA ALILICHE.</font>
            </div>
            <div class="separator"></div>
            <p style="color:white; margin-top:10px;">
            <div class="Me">
                <font class='me'>Me : </font>
                <font class="my_user_account_name">ZAKARIA ALILICHE 2012 :</font>
                <p class='my_user_account_email'>ZakariaAlilicheProgrammer2012@.gmail.com</p>
            </div>
            <div class="separator"></div>
        </div>
        </div>
        <div class="sending">
            <form action="#" method="post">
                <input type="text" name='my_message' placeholder='Enter Message' required>
                <button name='Button'><i><img src='images/send.png' alt=""></i></button>
            </form>
        </div>
    </div>
    <?php
    
    include ('db.php');

    if(array_key_exists('Button',$_POST)){
        $ema = $_SESSION['emai'];
        $passw = $_SESSION['passw'];
        $selects = "SELECT * FROM test WHERE email = '$ema' && password = '$passw'";
        $select_run = mysqli_query($conn,$selects);

        while($rowa=mysqli_fetch_array($select_run)){
            $f_n = $rowa['first_name'];
            $l_n = $rowa['last_name'];
            $e = $rowa['email'];
            $ps = $rowa['password'];
            $ms = $rowa['msg_text'];
            
            if ($ms > 0){
                $error[] = '';
            }else{
                $m = $_POST['my_message'];
                
                $insert = "INSERT INTO test (first_name,last_name,email,password,msg_text) VALUES ( '$f_n', '$l_n','$e','$ps','$m' )";

                $do_insert = mysqli_query($conn,$insert);

                header('Location: chat_form.php');
            }
        }
    }
    ?>
</body>
</html>