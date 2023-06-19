<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT ROOM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="register_form.php">SIGN UP</a></li>
                    <li><a href="login_form.php">LOG IN</a></li>
                    <li onclick='alert("404 Page Not Found.")'><a href="">ABOUT</a></li>
                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>CHAT ROOM</h1>
            <p>Welcome to Dark Chat, open a topic and start chatting with your friends all over the world.</p>
            <div class="buttons">
                <button onclick="document.location = 'register_form.php'" type="button"><span></span>SIGN UP</button>
                <button onclick="document.location = 'login_form.php'" type="button"><span></span>LOG IN</button>
            </div>
        </div>
    </div>
</body>
</html>