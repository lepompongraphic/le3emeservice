<?php

    header('Content-Type: text/html; charset=utf-8');

    // Les messages d'erreurs ci-dessous s'afficheront si Javascript est désactivé :

    // Conditions "name" :
    if ( (isset($_POST["name"])) && (strlen(trim($_POST["name"])) > 0) )
    {
        $name = stripslashes(strip_tags($_POST["name"]));
    }
    else
    {
        echo "Merci de saisir votre nom.<br />";
        $name = "";
    }

    // Conditions "email :"
    if ( (isset($_POST["email"])) && (strlen(trim($_POST["email"])) > 0) && (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) )
    {
        $email = stripslashes(strip_tags($_POST["email"]));
    }
    elseif (empty($_POST["email"]))
    {
        echo "Merci de saisir votre email.<br />";
        $email = "";
    }
    else
    {
        echo "Email invalide.(<br />";
        $email = "";
    }

    // Conditions "subject" :
    if ( (isset($_POST["subject"])) && (strlen(trim($_POST["subject"])) > 0) ) {
        $subject = stripslashes(strip_tags($_POST["subject"]));
    }
    else
    {
        echo "Merci de saisir votre sujet.<br />";
        $subject = "";
    }

    // Conditions "message" :
    if ( (isset($_POST["message"])) && (strlen(trim($_POST["message"])) > 0) ) {
        $message = stripslashes(strip_tags($_POST["message"]));
    }
    else
    {
        echo "Merci de saisir votre message.<br />";
        $message = "";
    }

    // Préparation des données :
    $ip = $_SERVER["REMOTE_ADDR"];
    $hostname = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
    $destinataire = "le3emeservice@gmail.com";
    $objet = "[Le 3ème service - Contact] " . $subject;
    $contenu = "Nom de l'expéditeur : " . $name . "\r\n";
    $contenu .= $message . "\r\n\n";
    $contenu .= "Adresse IP de l'expéditeur : " . $ip . "\r\n";
    $contenu .= "DLSAM : " . $hostname;
    $headers = "From: " . $email . "\r\n";
    $headers .= "CC: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=\"ISO-8859-1\"; DelSp=\"Yes\"; format=flowed \r\n";
    $headers .= "Content-Disposition: inline \r\n";
    $headers .= "Content-Transfer-Encoding: 7bit \r\n";
    $headers .= "MIME-Version: 1.0";

    // Si les champs sont mal remplis :
    if ( (empty($name)) && (empty($subject)) && (empty($email)) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (empty($message)) )
    {
        echo '<script type="text/javascript">
        $("#sendmessage").removeClass("show");
        $("#errormessage").addClass("show");
        $("#errormessage").html(msg);
        </script>';
        echo 'Erreur ! Merci de réessayer.';
    }
    // Sinon, encapsulation et envoi des données :
    else
    { 
        mail($destinataire, $objet, utf8_decode($contenu), $headers);
        echo '<script type="text/javascript">
        $("#sendmessage").addClass("show");
        $("#errormessage").removeClass("show");
        $(" .contactForm").find("input, textarea").val("");
        </script>';
        echo 'Message correctement envoyé.';
    }

?>