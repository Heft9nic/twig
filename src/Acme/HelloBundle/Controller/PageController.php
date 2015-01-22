<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HelloBundle\Entity\Enquiry;
use Acme\HelloBundle\Form\EnquiryType;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AcmeHelloBundle:Page:index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getREquest();
        if ($request->getMethod() == 'POST') {
            $form->binRequest($request);
            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('hello World')
                    ->setFrom('birku1995@rambler.ru')
                    ->setTo('heft9nic@mail.com')
                    ->setBody($this->renderView('AcmeHelloBundle:Page:contactEmail.txt.twig', array('enquiry' =>$enquiry)));
                $this->get('mailer')->send($message);
                $this->get('session')->setFlash('blog', 'ha ha ha ha ha ha ha ha');
                return $this->redirect($this->generateUrl('AcmeHelloBundle_contact'));
            }
        }

        return $this->render('AcmeHelloBundle:Page:contact.html.twig', array('form' => $form->createView()));
    }

    /**
     * @return Response
     */
    public function aboutAction()
    {
        $response = new Response();
        $response->setMaxAge(20);
        $response->setPublic();

        return $this->render('AcmeHelloBundle:Page:about.html.twig', array('rand'=>rand()), $response);
    }

    /**
     * @param $id
     * @return Response
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AcmeHelloBundle:Blog')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        return $this->render('AcmeHelloBundle:Page:show.html.twig', array(
            'post'      => $post, ));
    }

    /**
     * @return Response
     */
    public function adminAction()
    {
        return new Response('Page of admin');
    }

}
