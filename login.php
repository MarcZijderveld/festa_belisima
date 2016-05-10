<?php
include("connection.php");

//Start the session.
session_start();


if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is incorrect. ";
    }
    else
    {
        //Select the user and check if the user is in the database.
        $query = mysql_query("select * from 2015_p2_users where password='$password' AND email='$username'", $connection);
        $rows = mysql_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user']=$username;
            header("location: profile.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
        mysql_close($connection); // Closing Connection
    }
}
?>