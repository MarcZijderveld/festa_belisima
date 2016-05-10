<?php
    include('session.php');
?>
<html>
    <head>
        <title>Home - Festa Bellissima</title>
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
                    <input class="navigation-button" id="onPage" onClick="location.href='index.php'" type="button" value="My Wedding">
                    <input class="navigation-button" onclick="location.href='activities.php'" type="button" value="Activities">
                    <input class="navigation-button" onclick="location.href='profile.php'" type="button" value="Account">
                    <input class="navigation-button" onclick="location.href='contact.php'" type="button" value="Contact">
                    <input class="navigation-button" onclick="location.href='<?php if($logged_in) echo "logout.php"; else echo "login_page.php"; ?>'" type="button" value="<?php echo $text ?>">
                </div>
            </div>

            <div class="container">
                <div class="content">
                    <p id="page-head">MyWedding Portal<p>
                    <div id="activities">
                        <p>Welcome to Festa Bellisima's MyWedding portal, within this portal you and your wedding planner have the ability to track all the details concerning your wedding.
                            Whether it be design, planning or management, we will make this wonderful experience as pleasant and stress free as possible for you.</p>
                        <br>
                        <p>With our wide range of locations and partners we have the ability to host a wedding for everyones preference, in virtually anywhere in the Netherlands, and parts of the East Coast of the United States of America.</p>
                        <br>
                        <img src="img/flowers.jpg" id="image">
                        <p>It is our goal to keep you in touch with your wedding and keep you in control of every last detail where possible. Our experienced staff will guide you with ease through planning your special day and making it one you will never forget.</p>
                        <br>
                        <p>Within the portal, using the contact form, this enables you to contact us directly 24/7 with all questions small or big, and we guarantee we will contact you back within 24 hours. What more do you want? Apply today!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-footer">
            <span>Copyright FestaBellisima 2015©</span>
        </div>
    </body>
</html>