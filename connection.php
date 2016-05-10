<?php
    // Define $username and $password
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    // Establish server connection.
    $connection = mysql_connect("localhost", "*******", "*********");
    // Project the injection for security purposes.
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    // Database
    $db = mysql_select_db("*********", $connection);
    $PDO = new PDO('mysql:host=localhost;dbname=******;charset=utf8', '********', '*******');
    $error='';
?>