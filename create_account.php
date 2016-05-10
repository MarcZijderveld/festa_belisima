<?php
include('create.php');
?>
<html>
<head>
    <title>Home - Festa Bellissima</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type=text/css href="css/style.css"/>
    <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
</head>

<body class="body">

<div class="container-header">
    <img src="img/header.png" id="banner">
</div>
    <div class="wrapper">
        <div class="container-menu-bar">
            <div class="container-menu">
                <input class="navigation-button" onClick="location.href='index.php'" type="button" value="My Wedding">
                <input class="navigation-button" onclick="location.href='activities.php'" type="button" value="Activities">
                <input class="navigation-button" onclick="location.href='profile.php'" type="button" value="Account">
                <input class="navigation-button" onclick="location.href='contact.php'" type="button" value="Contact">
                <input class="navigation-button" onclick="location.href='login_page.php" type="button" value="Login">
            </div>
        </div>

        <div class="container">
            <div class="content">
                <p id="page-head">Create Account<p>
                <div id="create-account">
                    <?php
                        echo "<form action='' method='post'>";
                        echo "<p>" , "First name: " , "<p><input id='formField' name='first_name' type='text'></p>";
                        echo "<p>" , "Last name: " , "<p><input id='formField' name='last_name' type='text'></p>";
                        echo "<p>" , "Street: " , "<p><input id='formField' name='street' type='text'></p>";
                        echo "<p>" , "House Number: " , "<p><input id='formField' name='house_nr' type='text'></p>";
                        echo "<p>" , "Zipcode: " , "<p><input id='formField' name='zipcode' type='text'></p>";
                        echo "<p>" , "Town: " , "<p><input id='formField' name='town' type='text'></p>";
                        echo "<p>" , "Phone Number: " , "<p><input id='formField' name='phone_nr' type='text'></p>";
                        echo "<p>" , "Date of Birth: " , "<p><input id='formField' name='date_of_birth' type='date'></p>";
                        echo "<p>" , "Email: " , "<p><input id='formField' name='email' type='email'</p>";
                        echo "<p>" , "Password:" , "<p><input id='formField' name='password' type='password'</p>";
                        echo "<input id='form_button' name='submit' type='submit' value=' Create Account '>";
                        echo "<p>" , $error . "</p>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-footer">
        <span>Copyright FestaBellisima 2015©</span>
    </div>
</body>
</html>