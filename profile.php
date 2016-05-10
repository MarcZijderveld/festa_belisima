<?php
    include('session.php');
    include('edit.php');

    if(!isset($_SESSION['login_user']))
    {
        header("location: login_page.php");
    }

    //defines
    $edit = false;
    $password = false;

    //USer has clicked the edit link.
    if(isset($_GET['edit']) && isset($_SESSION['login_user']))
    {
        $edit = true;
    }
    //User has checked the password link.
    if(isset($_GET['pwedit']) && isset($_SESSION['login_user']))
    {
        $password = true;
    }
?>
<html>
<head>
    <title>Account - Festa Bellissima</title>
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
                <input class="navigation-button" id="onPage" onclick="location.href='profile.php'" type="button" value="Account">
                <input class="navigation-button" onclick="location.href='contact.php'" type="button" value="Contact">
                <input class="navigation-button" onclick="location.href='<?php if($logged_in) echo "logout.php"; else echo "login_page.php"; ?>'" type="button" value="<?php echo $text ?>">
            </div>
        </div>

        <div class="container">
            <div class="content">
                <p id="page-head">Account<p>
                <div id="activities">
                    <p>Below you will find your account details, you are able to change them by clicking on the links on the right of the page.</p>

                    <div id="profile-details">
                        <?php

                            //Form the query for selecting the users data.
                            $result = $PDO->query("select * from 2015_p2_users WHERE email='$user_check'");
                            $result->setFetchMode(PDO::FETCH_ASSOC);

                            //IF the user clicked the edit link on the right side.
                            if($edit)
                            {
                                echo "<h2>Edit Details</h2>";
                                //Draw the edit fields for the personal data
                                while ($row = $result->fetch())
                                {
                                    echo "<form action='' method='post'>";
                                    echo "<p>" , "First name: " , "<p><input id='formField' name='first_name' type='text' value='" , $row['first_name'] , "'></p>";
                                    echo "<p>" , "Last name: " , "<p><input id='formField' name='last_name' type='text' value='" , $row['last_name'] , "'></p>";
                                    echo "<p>" , "Street: " , "<p><input id='formField' name='street' type='text' value='" , $row['street'] , "'></p>";
                                    echo "<p>" , "House Number: " , "<p><input id='formField' name='house_nr' type='text' value='" , $row['house_nr'] , "'></p>";
                                    echo "<p>" , "Zipcode: " , "<p><input id='formField' name='zipcode' type='text' value='" , $row['zipcode'] , "'></p>";
                                    echo "<p>" , "Town: " , "<p><input id='formField' name='town' type='text' value='" , $row['town'] , "'></p>";
                                    echo "<p>" , "Phone Number: " , "<p><input id='formField' name='phone_nr' type='text' value='" , $row['phone_nr'] , "'></p>";
                                    echo "<p>" , "Date of Birth: " , "<p><input id='formField' name='date_of_birth' type='text' value='" , $row['date_of_birth'] , "'></p>";
                                    echo "<p>" , "Email: " , "<p><input id='formField' name='email' type='text' value='" , $row['email'] , "'></p>";
                                    echo "<input id='form_button' name='submit' type='submit' value=' Submit '>";
                                    echo "<p>" , $error . "</p>";
                                }
                            }
                            //IF the user clicked the edit password link on the right side.
                            else if($password)
                            {
                                //Draw the edit fields for the users password
                                echo "<h2>Change Password</h2>";
                                echo "<form action='' method='post'>";
                                echo "<p></p><label>Current Password:</label>";
                                echo "<input id='formField' name='password_old' placeholder='**********' type='password''>";
                                echo "<p></p><label>New Password:</label>";
                                echo "<input id='formField' name='password_new' placeholder='**********' type='password''>";
                                echo "<P></P><label>New Password Confirmation:</label>";
                                echo "<input id='formField' name='password_new_confirmation' placeholder='**********' type='password''>";
                                echo "<input id='form_button' name='submit' type='submit' value=' Change Password '>";
                                echo "<p>" , $error . "</p>";
                            }
                            else
                            {
                                //Show the personal details.
                                echo "<h2>Personal Details</h2>";
                                while ($row = $result->fetch())
                                {
                                    echo "<p>" , "First name: " , $row['first_name'] , "</p>";
                                    echo "<p>" , "Last name: " , $row['last_name'] , "</p>";
                                    echo "<p>" , "Street: " , $row['street'] , "</p>";
                                    echo "<p>" , "House number: " , $row['house_nr'] , "</p>";
                                    echo "<p>" , "Zipcode: " , $row['zipcode'] , "</p>";
                                    echo "<p>" , "Town: " , $row['town'] , "</p>";
                                    echo "<p>" , "Phone Number: " , $row['phone_nr'] , "</p>";
                                    echo "<p>" , "Date of Birth: " , $row['date_of_birth'] , "</p>";
                                    echo "<p>" , "Email Adress: " , $row['email'] , "</p>";
                                }
                            }
                        ?>
                    </div>
                    <div id="profile-details">
                        <p><h3>Welcome : <?php echo $login_session; ?></h3></p>
                        <br>
                        <p></p><b id=""><a href="?edit">Edit Details</a></b>
                        <p></p><b id=""><a href="?pwedit">Change Password</a></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-footer">
        <span>Copyright FestaBellisima 2015©</span>
    </div>
</body>
</html>