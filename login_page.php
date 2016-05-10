<?php
    include('login.php'); // Includes Login Script

    if(isset($_SESSION['login_user']))
    {
        header("location: profile.php");
    }
?>

<html>
<head>
    <title>Login - Festa Bellissima</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type=text/css href="css/style.css"/>
    <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
</head>

<body class="body">
    <div class="wrapper">
        <div class="container-header">
            <img src="img/header.png" id="banner">
        </div>

        <div class="container-menu-bar">
            <div class="container-menu">
                <input class="navigation-button" onClick="location.href='index.php'" type="button" value="My Wedding">
                <input class="navigation-button" onclick="location.href='activities.php'" type="button" value="Activities">
                <input class="navigation-button" onclick="location.href='profile.php'" type="button" value="Account">
                <input class="navigation-button" onclick="location.href='contact.php'" type="button" value="Contact">
                <input class="navigation-button" onclick="location.href='login_page.php'" type="button" value="Login">
            </div>
        </div>

        <div class="container">
            <div class=="container-content">
                <div id="login">
                    <h2>Login</h2>
                    <form action="" method="post">
                        <label>Email:</label>
                    <input id="loginField" name="username" placeholder="username" type="text">
                        <label>Password:</label>
                    <input id="loginField" name="password" placeholder="**********" type="password">
                    <input id= "login_button" name="submit" type="submit" value=" Login ">
                    <span><?php echo $error; ?></span>

                    <span>Don't have a account with us yet? <a href="create_account.php" target="_self">Click here to register</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-footer">
        <span>Copyright FestaBellisima 2015©</span>
    </div>
</body>
</html>