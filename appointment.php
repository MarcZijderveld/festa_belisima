<?php
    include("connection.php");

    $confirmed = "0";

    if (isset($_POST['submit']))
    {
        if (!empty($_POST['activity']) && !empty($_POST['date']))
        {
            //Insert the activity into the database for the logged in user.
            $query = "INSERT INTO 2015_p2_appointments (email , activity , date , confirmed) VALUES (?,?,?,?)";
            $exec = $PDO->prepare($query);
            $exec->bindParam(':email', $login_session , PDO::PARAM_STR);
            $exec->bindParam(':activity', $_POST['activity'], PDO::PARAM_STR);
            $exec->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
            $exec->bindParam(':confirmed', $confirmed, PDO::PARAM_STR);
            $exec->execute(array($login_session, $_POST['activity'], $_POST['date'], $confirmed));
            $error = "Your appointment has successfully been added.";
        }
        else
        {
            $error = "Please fill in the required fields. ";
        }
    }
    else if(!empty($_GET['delete']))
    {
        //Delete selected appointment from the database.
        $query = "DELETE FROM 2015_p2_appointments WHERE id=". $_GET['delete'];
        $exec = $PDO->prepare($query);
        $exec->execute();
        header("location: activities.php");
    }
    else if(!empty($_GET['confirm']))
    {
        //Update or confirm the status of the selected appointment.
        $confirmed = 1;
        $query = "UPDATE 2015_p2_appointments SET confirmed =:confirmed WHERE id=". $_GET['confirm'];
        $exec = $PDO->prepare($query);
        $exec->bindParam(':confirmed', $confirmed , PDO::PARAM_STR);
        $exec->execute();
        header("location: activities.php");
    }
    else
    {
        $error = "Please fill in the required fields. ";
    }
?>
