<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactNotification{

    private $mailer;

    public function __construct(MailerInterface $mailer) {
        $this->mailer = $mailer;
    }
    
    public function notify(Contact $contact)
    {
        $email = (new Email())
                ->from("contact@progica.fr")
                ->to($contact->getEmail())
                ->subject("Demand")
                ->text("New demand from {$contact->getFirstName()} {$contact->getLastName()} for the gite {$contact->getGite()->getID()}" );

                $this->mailer->send($email);
    }
}