<?php
    include('session.php');
    if(session_destroy()) // Destroying All Sessions
    {
        header("Location: login_page.php"); // Redirecting To Home Page
    }
?>
