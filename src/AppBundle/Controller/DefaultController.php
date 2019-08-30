<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('default/contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/sendemail", name="sendemail")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function sendEmailAction(Request $request)
    {
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $subject = $request->request->get('subject');
        $message = $request->request->get('message');
        $mail = \Swift_Message::newInstance()
            ->setSubject("No responder")
            ->setFrom($email)
            ->setTo('fedechiappero06@gmail.com')
            ->setBody(
                $this->renderView(
                    'Email/consulta.html.twig',
                    array('name' => $name,
                        'email' => $email,
                        'subject' => $subject,
                        'message'=>$message)
                ),
                'text/html'
            );

        $this->get('mailer')->send($mail);

        return $this->redirect($this->generateUrl('homepage'));
    }
}
