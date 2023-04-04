<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer extends Notification
{
    use Queueable;
    private $smtpserver;
    private $smtpport;
    private $username;
    private $password;
    private $smtpsecurity;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->smtpserver;
        $this->smtpport;
        $this->username;
        $this->password;
        $this->smtpsecurity;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function sendEMailVerificationLink($email, $token)
    {
        $subject = "Email verification link";
        $text = file_get_contents('../resources/views/layouts/email.blade.php');
        $url = url()->to('/') . '/email-verify/' . $token;
        $message = "Thank you for signing up with us.\n Please verify your account by clicking on the button bellow";
        $replace = ['{{ Message }}'=>$message, '{{ Link }}'=>$url, '{{ Button }}'=>'Verify'];
        foreach (array_keys($replace) as $key) {
            $text = str_replace($key,$replace[$key],$text);
        }
        return $this->sendEmail($email, $subject, $text);
    }

    public function sendPasswordRecoveryEmail($email,$token)
    {
        $subject = "Password reset email";
        $text = file_get_contents('../resources/views/layouts/email.blade.php');
        $url = url()->to('/').'/password-reset/'.$token;
        $message = "We have received a password change request from you. \n Click on the button below to change your password. \n If you did not make this reques, please ignore this message.";
        $replace = ['{{ Message }}' => $message, '{{ Link }}' => $url, '{{ Button }}' => 'Reset'];
        foreach (array_keys($replace) as $key) {
            $text = str_replace($key, $replace[$key], $text);
        }
        return $this->sendEmail($email, $subject, $text);
    }

    public function sendEmail($recipient, $subject, $message, $attachment = '', $stringattachment = '', $filename = '')
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtppro.zoho.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'edereva@aakenya.co.ke';
            $mail->Password = 'fH5a&ksz';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('edereva@aakenya.co.ke', 'Automart AA Kenya Limited');
            $mail->addAddress($recipient);

            // if (isset($_FILES['emailAttachments'])) {
            //     for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
            //         $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
            //     }
            // }
            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body    = $message;

            if (!$mail->send()) {
                return $mail->ErrorInfo;
            } else {
                return "success";
            }
        } catch (Exception $e) {
            return $e->getTrace();
        }
    }
}
