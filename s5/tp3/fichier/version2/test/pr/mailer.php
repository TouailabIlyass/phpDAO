<?php
function sendMail($email,$nom,$num)
{
$to = $email;
$subject = "Confirmer-email";


$message = "
<html>
<head>
<title>Confirmer-email</title>
</head>
<body>
<p>Confirmation de votre compte !</p>
<p>Chèr(e) $nom , <br/></p>
<p> Vous avez saisi $to comme adresse électronique de contact pour la création de votre compte</p>
<p>Pour vérifier qu’il s’agit bien de votre adresse électronique.</p>
<p>entrez le code suivant :</p>
<h3>$num</h3>
<p>Merci<br/>
L’équipe : <br>
-ZAAZAA OUSSAMA.<br>
-ILYASE TOUAILAB.
</p>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$headers .= 'From: <XXXX@hotmail.com>' . "\r\n";
$send=mail($to,$subject,$message,$headers);

return $send; 

}
