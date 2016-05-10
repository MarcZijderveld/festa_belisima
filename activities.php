<?php
    include('session.php');
    include('appointment.php');

    //Check if session exists
    if(!isset($_SESSION['login_user']))
    {
        header("location: login_page.php");
    }
?>
<html>
<head>
    <title>Activities - Festa Bellissima</title>
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
                <input class="navigation-button" id="onPage" onclick="location.href='activities.php'" type="button" value="Activities">
                <input class="navigation-button" onclick="location.href='profile.php'" type="button" value="Account">
                <input class="navigation-button" onclick="location.href='contact.php'" type="button" value="Contact">
                <input class="navigation-button" onclick="location.href='<?php if($logged_in) echo "logout.php"; else echo "login_page.php"; ?>'" type="button" value="<?php echo $text ?>">
            </div>
        </div>

        <div class="container">
            <div class="content">
                <p id="page-head">Planned Activities<p>
                <div id="activities">
                    <p>Below you will find all your scheduled activities and you can see if they have already been confirmed by your assigned wedding planner.</p>
                    <br>
                    <?php
                        //Get admin field from the database
                        $admin = $PDO->query("select moderator from 2015_p2_users WHERE email='$user_check'");
                        $aResult = $admin->fetch();
                        //Get all the appointments from the database
                        $result = $PDO->query("select * from 2015_p2_appointments WHERE email='$user_check'");
                        //If user is a admin get all the appointments from the database
                        if($aResult["moderator"] == "1")
                        {
                            $result = $PDO->query("select * from 2015_p2_appointments");
                        }

                    //Setup the table for the correct person.
                    echo "<table id ='activity_table'><tr>";
                    if($aResult["moderator"] == "1")
                        echo "<th id='activities_table_head'>Email:</th>";

                    echo "<th id='activities_table_head'>Actitity:</th> <th id='activities_table_head'>Date:</th> <th id='activities_table_head'>Confirmed:</th>";

                        if($aResult["moderator"] == "1")
                        {
                            echo "<th id='activities_table_head'>Delete:</th>";
                        }

                        if($aResult["moderator"] == "0")
                            echo "<form action='' method='post'>";
                        echo "</tr>";

                        //Draw all the appointments on the screen through ECHO
                        if($row = $result->rowCount() > 0)
                        {
                            while ($row = $result->fetch())
                            {
                                echo "<tr>";
                                if($aResult["moderator"] == "1")
                                {
                                    echo "<form action='appointment.php'>";
                                    echo "<td id='activities_table_row'>" . $row['email'] . "</td>";
                                }

                                echo "<td id='activities_table_row'>" . $row['activity'] . "</td>";
                                echo "<td id='activities_table_row'>" . $row['date'] . "</td>";
                                $confirmed = "No";

                                //IF its a moderator you can confirm appointments.
                                if($aResult["moderator"] == "1")
                                {
                                    if($row['confirmed'] == 1)
                                    {
                                        $confirmed = "Yes";
                                        echo "<td id='activities_table_row'>" . $confirmed . "</td>";
                                    }
                                    else
                                        echo "<td id='activities_table_row'>" . "<button id='form_button_small' name='confirm' value=". $row["id"] . ">Confirm</button>" . "</td>";
                                }
                                else
                                {
                                    if ($row['confirmed'] == 1)
                                        $confirmed = "Yes";
                                    echo "<td id='activities_table_row'>" . $confirmed . "</td>";
                                }
                                //IF its a moderator you can delete appointments.
                                if($aResult["moderator"] == "1")
                                {
                                    echo "<td id='activities_table_row'>" . "<button id='form_button_small' name='delete' value=" . $row["id"] . ">Delete</button>" . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        else
                            echo "<p>No appointments are scheduled at the moment.</p>";
                        //If you are not a moderator you can make new appointments.
                        if($aResult["moderator"] == "0") {
                            echo "<tr>";
                            echo "<td id='activities_table_row'>" . "<select id='' name='activity'><option value='cake tasting'>Cake Tasting</option><option value='visiting location'>Visiting Location</option><option value='color matching'>Color Matching</option><option value='dress fitting'>Dress Fitting</option><option value='tuxedo fitting'>Tuxedo Fitting</option></select>" . "</td>";
                            echo "<td id='activities_table_row'>" . "<input id='formField' name='date' type='date' value=''>" . "</td>";
                            echo "<td id='activities_table_row'>" . "<input id='form_button_small' name='submit' type='submit' value=' Submit '>" . "</td>";
                            echo "</tr>";
                        }
                        echo "</form>";
                        echo "</table>";
                        echo "<br>";

                        if($aResult["moderator"] == "0")
                            echo "<p>", $error . "</p>";
                    ?>
                    </div>
            </div>
        </div>
    </div>
    <div class="container-footer">
        <span>Copyright FestaBellisima 2015©</span>
    </div>
</body>
</html>