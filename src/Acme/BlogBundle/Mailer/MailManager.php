<?php

namespace Acme\BlogBundle\Mailer;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;


class MailManager
{
    protected $mailer;
    protected $templateEngine;

    public function __construct(EngineInterface $templateEngine, $mailer)
    {
        $this->templateEngine = $templateEngine;
        $this->mailer = $mailer;
     }

    protected  function setMail( $subject, $toEmail, $body, $parameters)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setTo($toEmail)
            ->setBody($this->templateEngine->render(
                'AcmeBlogBundle:Mail:' . $body . '.html.twig',
                $parameters
            ));
        $this->mailer->send($message);
    }

    public function testEmail($toEmail)
    {
       $this->setMail('test', $toEmail, 'test', array());
    }
}

