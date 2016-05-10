<?php
    include("connection.php");
    //Check if the form has been submit.
    if (isset($_POST['submit']))
    {
        //Check if all the fields are filled.
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['street']) && !empty($_POST['house_nr']) && !empty($_POST['zipcode']) && !empty($_POST['town']) && !empty($_POST['phone_nr']) && !empty($_POST['date_of_birth']) && !empty($_POST['email']) && !empty($_POST['password']))
        {
            //Insert the data into the database.
            $query = "INSERT INTO 2015_p2_users (first_name , last_name , street , house_nr , zipcode, town, phone_nr, date_of_birth, email, password) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $exec = $PDO->prepare($query);
            //Bind the parameters to the PDO execution.
            $exec->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);
            $exec->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR);
            $exec->bindParam(':street', $_POST['street'], PDO::PARAM_STR);
            $exec->bindParam(':house_nr', $_POST['house_nr'], PDO::PARAM_STR);
            $exec->bindParam(':zipcode', $_POST['zipcode'], PDO::PARAM_STR);
            $exec->bindParam(':town', $_POST['town'], PDO::PARAM_STR);
            $exec->bindParam(':phone_nr', $_POST['phone_nr'], PDO::PARAM_STR);
            $exec->bindParam(':date_of_birth', $_POST['date_of_birth'], PDO::PARAM_STR);
            $exec->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $exec->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
            //If the execution was successfull your account has been created.
            if($exec->execute(array($_POST['first_name'], $_POST['last_name'], $_POST['house_nr'] , $_POST['house_nr'], $_POST['zipcode'], $_POST['town'], $_POST['phone_nr'], $_POST['date_of_birth'], $_POST['email'], $_POST['password'])))
                $error = "Your account has been created.";
            else
            {
                $error = "Email address already in use.";
            }
        }
        else
        {
            $error = "Please fill in the required fields. ";
        }
    }
?>