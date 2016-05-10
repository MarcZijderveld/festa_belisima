<?php
    include('connection.php');
    session_start();
    //Defines
    $user_check = null;
    $text = "";
    $logged_in = null;
    //check if user is logged in.
    if(array_key_exists('login_user',$_SESSION))
    {
        $user_check = $_SESSION['login_user'];
        $text = "Logout";
        $logged_in = 1;
    }
    else {
        $text = "Login";
        $logged_in = 0;
    }
    // Query to select the emailadress of the user and store it in the session.
    $ses_sql=mysql_query("select email from 2015_p2_users where email='$user_check'", $connection);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session =$row['email'];




?>