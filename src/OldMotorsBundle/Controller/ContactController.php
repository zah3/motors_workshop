<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @Route("/contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this
            ->createFormBuilder()
            ->add('name', 'text', array(
                'attr' => array(
                    'placeholder' => 'Imię i nazwisko',
                    'pattern'     => '.{2,}' //minlength
                )
            ))
            ->add('email', 'email', array(
                'attr' => array(
                    'placeholder' => 'Twój e-mail'
                )
            ))
            ->add('subject', 'text', array(
                'attr' => array(
                    'placeholder' => 'Temat wiadomości',
                    'pattern'     => '.{3,}' //minlength
                )
            ))
            ->add('message', 'textarea', array(
                'attr' => array(
                    'cols' => 90,
                    'rows' => 10,
                    'placeholder' => 'Treść wiadomości'
                )
            ))
            ->add('Wyślij', 'submit')
            ->getForm();
        $form->handleRequest($request);


        if ($form->isValid() && $form->isSubmitted()) {
            $data = $form->getData();
            $message = \Swift_Message::newInstance()
                ->setSubject($data['subject'])
                ->setFrom('noreply@motors.com')
                ->setTo('zstaniszewski@edu.cdv.pl')
                ->setBody(
                    $this->renderView(
                        'OldMotorsBundle:Email:contact.html.twig',
                        array('message' => $data['message'],'from' => $data['email'])
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
        }
                return array(
            'form' => $form->createView()
        );

    }

}
