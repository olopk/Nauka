<?php

require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
require_once 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;


    if($_POST['wyslij']=='Wyślij wiadomość')
    {
        if((!empty($_POST['imie'])) && (!empty($_POST['nazwisko'])))
        {

            $html='Imię: '.$_POST['imie'].'<br>';
            $html.='Nazwisko: '.$_POST['nazwisko'].'<br>';
            $html.='Email: '.$_POST['email'].'<br>';

            $mail = new PHPMailer();

            // Uwierzytelnianie do serwera SMTP
            $mail->CharSet = "utf-8";
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'openitczluchow@gmail.com';
            $mail->Password = 'Juliusz15Marca!@#';
            $mail->SMTPSecure = 'tls';

            $mail->setFrom('powiadomienia@openit.pl');

            // Poniżej mamy elementy maila
            $mail->addAddress('leszek@o-it.pl');
            $mail->addReplyTo($_POST['email']);
            $mail->msgHTML($html);
            $mail->Subject = 'Wiadomość z mojej strony domowej';
            $mail->AltBody = 'Wiadmość jest w HTML. Zainstaluj sobie Thunderbirda :) ';


            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $komunikat = '<div class="alert alert-success" role="alert">Wiadomość została wysłana</div>';
            }


        }
        else
        {
            $komunikat = '<div class="alert alert-danger" role="alert">Pole imię i nazwisko powinno być uzupełnione</div>';
        }

    }

?>

<h1>Kontakt</h1>

<p>Dane adresowe</p>

<h2>Formularz kontaktowy</h2>

<?php

    if(!empty($komunikat)){
        echo $komunikat;
    }

?>

<form method="post" action="index.php?strona=kontakt">

<div class="form-group">
    <label for="imie" class="">imię</label>
    <input type="text" name="imie" class="form-control" placeholder="">
</div>

<div class="form-group">
    <label for="nazwisko" class="">Nazwisko</label>
    <input type="text" name="nazwisko" class="form-control" placeholder="">
</div>

<div class="form-group">
    <label for="email" class="">Email</label>
    <input type="email" name="email" class="form-control" placeholder="" required>
</div>

<input role="button" type="submit" name="wyslij" value="Wyślij wiadomość" class="btn btn-danger">

</form>