<?php
    include("connection.php");

    if (isset($_POST['submit']))
    {
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']))
        {
            // Check if the "Sender's Email" input field is filled out
            $email=$_POST['email'];
            // Sanitize E-mail Address
            $email =filter_var($email, FILTER_SANITIZE_EMAIL);
            // Validate E-mail Address
            $email= filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$email){
                $error = "Invalid email address.";
            }
            else
            {
                //Form the email and send it to the admin of the website.
                $subject = "[FestaBellisima - Contact Request] - " . $_POST['subject'];
                $message = $_POST['message'];
                $headers = 'From:'. $email . "\r\n";
                $headers .= 'Cc:'. $email . "\r\n";
                $message = wordwrap($message, 70);
                mail("0898095@hr.nl", $subject, $message, $headers);
                $error = "Your message has been send, you will hear back from us as soon as possible.";
            }
        }
        else
            $error = "Please fill in the required fields. ";
    }
?>