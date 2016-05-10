<?php
include('session.php');
include('send.php');

if(!isset($_SESSION['login_user']))
{
    header("location: login_page.php");
}
?>
<html>
<head>
    <title>Contact - Festa Bellissima</title>
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
                <input class="navigation-button" id="onPage" onclick="location.href='contact.php'" type="button" value="Contact">
                <input class="navigation-button" onclick="location.href='<?php if($logged_in) echo "logout.php"; else echo "login_page.php"; ?>'" type="button" value="<?php echo $text ?>">
            </div>
        </div>

        <div class="container">
            <div class="content">
                <p id="page-head">Contact<p>
                <div id="activities">
                    If you have any questions or remarks concerning our service or your wedding please fill in the form below and we will get back to you within 24 hours.
                    <div id="contactField">
                        <form action="" method="post">
                            <p>Your name: <input id="formfield" name="name" type="text" value="">
                            <p>Your email: <input id="formfield" name="email" type="text" value="<?php echo $login_session ?>">
                            <p>Subject: <input id="formfield" name="subject" type="text" value="">
                            <p><label>Your Message:</label>
                            <p><textarea id="messageField" spellcheck="true" name="message" placeholder="Type your text here..."></textarea>
                            <p><input id="form_button" type="submit" name="submit" value="Send Message">
                        </form>
                        <?php echo "<p>" . $error; ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="container-footer">
        <span>Copyright FestaBellisima 2015©</span>
    </div>
</body>
</html>