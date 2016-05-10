<?php
    include("connection.php");

    //Check if submit has been pressed.
    if (isset($_POST['submit']))
    {
        //Check if all fields have been filled.
        if (!empty($_POST['password_old']) && !empty($_POST['password_new']) && !empty($_POST['password_new_confirmation']))
        {
            $result = $PDO->query("select password from 2015_p2_users WHERE email='$user_check'");
            $result->setFetchMode(PDO::FETCH_ASSOC);
			$password = $result->fetch();
            if($_POST['password_old'] == $password['password'])
            {
                $query = "UPDATE 2015_p2_users SET password = :password WHERE email='$user_check'";
                $exec = $PDO->prepare($query);
                $exec->bindParam(':password', $_POST['password_new'], PDO::PARAM_STR);
                $exec->execute();
                $error = "Your password has succesfully been changed.";
            }
            else
                $error = "Current password does not match the password currently in the database.";
        }
        //Check if all fields have been filled.
        else if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['street']) && !empty($_POST['house_nr']) && !empty($_POST['zipcode']) && !empty($_POST['town']) && !empty($_POST['phone_nr']) && !empty($_POST['date_of_birth']) && !empty($_POST['email']))
        {
            //Update the fields in the database with the data from the form.
            $query = "UPDATE 2015_p2_users SET first_name = :first_name, last_name = :last_name, street = :street, house_nr = :house_nr, zipcode = :zipcode, town = :town, phone_nr = :phone_nr, date_of_birth = :date_of_birth, email = :email WHERE email='$user_check'";
            $exec = $PDO->prepare($query);
            //Bind the fields to the parameters.
            $exec->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
            $exec->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
            $exec->bindParam(':street', $_POST['street'], PDO::PARAM_STR);
            $exec->bindParam(':house_nr', $_POST['house_nr'], PDO::PARAM_STR);
            $exec->bindParam(':zipcode', $_POST['zipcode'], PDO::PARAM_STR);
            $exec->bindParam(':town', $_POST['town'], PDO::PARAM_STR);
            $exec->bindParam(':phone_nr', $_POST['phone_nr'], PDO::PARAM_STR);
            $exec->bindParam(':date_of_birth', $_POST['date_of_birth'], PDO::PARAM_STR);
            $exec->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            //Execute the Query.
            $exec->execute();
            $error = "Your details have been successfully changed.";
        }
        else
        {
            $error = "Please fill in the required fields. ";
        }
    }
?>