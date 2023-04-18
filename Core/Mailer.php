<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ROOT . 'vendor/autoload.php';


class Mailer
{
    private $phpmail;
    private $smtpAccount;
    private $smtpPassword;
    private $smtpName;

    public function __construct($account, $password, $name)
    {
        $this->phpmail = new PHPMailer(false);
        $this->smtpAccount = $account;
        $this->smtpPassword = $password;
        $this->smtpName = $name;
    }



    public function loadTemplate($template, $data)
    {
            $template = file_get_contents(ROOT . 'templates/mail/' . $template . '.php');
            foreach ($data as $key => $value) {
                $template = str_replace('{{' . $key . '}}', $value, $template);
            }
            return $template;
    }


    public function send($to, $subject, $body)
    {
        try {
            $this->phpmail->SMTPDebug = 0;
            $this->phpmail->isSMTP();
            $this->phpmail->Host = 'smtp.gmail.com';
            $this->phpmail->SMTPAuth = true;
            $this->phpmail->Username = $this->smtpAccount;
            $this->phpmail->Password = $this->smtpPassword;
            $this->phpmail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->phpmail->Port = 587;

            $this->phpmail->setFrom($this->smtpAccount, $this->smtpName);
            $this->phpmail->addAddress($to);

            $this->phpmail->isHTML(true);
            $this->phpmail->Subject = $subject;
            $this->phpmail->Body    = $body;
            $this->phpmail->AltBody = strip_tags($body);

            $this->phpmail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
