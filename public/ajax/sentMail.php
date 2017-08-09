<?php

require "../../vendor/autoload.php";

if(!empty($_POST)) {

    //get data
    $name = isset($_POST['nameInput']) ? strip_tags(trim($_POST['nameInput'])) : '';
    $email = isset($_POST['emailInput']) ? strip_tags(trim($_POST['emailInput'])) : '';
    $subject = isset($_POST['subjectInput']) ? strip_tags(trim($_POST['subjectInput'])) : '';
    $message = isset($_POST['messageInput']) ? strip_tags(trim($_POST['messageInput'])) : '';

    //validate data
    $formValid = true;
    $formErrors = array();
    $response = array();

    if(empty($name)) {
        $formValid = false;
        $formErrors['nameInput'] = "Veuillez renseigner votre nom complet.";
    } else if(strlen($name) < 4) {
        $formValid = false;
        $formErrors['nameInput'] = "Votre nom doit contenir au moins 4 caractères.";
    }

    if(empty($email)) {
        $formValid = false;
        $formErrors['emailInput'] = "Veuillez renseigner votre adresse email.";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formValid = false;
        $formErrors['emailInput'] = "Veuillez renseigner une adresse email valide.";
    }

    if(empty($subject)) {
        $formValid = false;
        $formErrors['subjectInput'] = "Veuillez renseigner un sujet.";
    } else if(strlen($subject) < 5) {
        $formValid = false;
        $formErrors['subjectInput'] = "Votre sujet doit contenir au moins 5 caractères.";
    }

    if(empty($message)) {
        $formValid = false;
        $formErrors['messageInput'] = "Veuillez renseigner votre message.";
    } else if(strlen($message) < 20) {
        $formValid = false;
        $formErrors['messageInput'] = "Votre message doit contenir au moins 20 caractères.";
    }

    if($formValid) {

        //create msg
        $msgToSend = "Nom: " . $name . "<br> Email: " . $email . "<br> Message: " . $message;

        //send mail
        $mail = new PHPMailer;

        // $mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.gandi.net';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'noreply@decorspartners.lu';                 // SMTP username
        $mail->Password = 'rc24DWUW';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('noreply@decorspartners.lu', '[D&P.lu]');
        $mail->addAddress("decorspartners@gmail.com", 'Decors & Partners');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "[D&P.lu] - " . $subject;
        $mail->Body    = $msgToSend;
        $mail->AltBody = $msgToSend;

        if(!$mail->send()) {
            $response['code'] = 0;
            $response['errorMsg'] = "Votre mail n'a pas pu être envoyé. Réessayer dans un instant.";
        } else {
            $response['code'] = 1;
        }
    } else {
        $response['code'] = 0;
        $response['formErrors'] = $formErrors;
     }

    echo json_encode($response, JSON_PRETTY_PRINT);
}
