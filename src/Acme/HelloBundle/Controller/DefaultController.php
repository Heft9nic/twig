<?php

namespace Acme\HelloBundle\Controller;

use Acme\HelloBundle\Entity\Enquiry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HelloBundle\Form\EnquiryType;

class DefaultController extends Controller
{
    public  function okAction()
    {
      return $this->render('AcmeHelloBundle:Default:ok.html.twig');
    }
    public function indexAction()
    {
        return $this->render('AcmeHelloBundle:Default:index.html.twig');
    }

    public function contact_1Action()
    {
        return $this->render('AcmeHelloBundle:Default:contact.html.twig');
    }

    public function  guestsAction()
    {
       return $this->render('AcmeHelloBundle:Default:guests.html.twig');
    }

    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                return $this->redirect($this->generateUrl('BlogerBlogBundle_ok'));
            }
        }

        return $this->render('AcmeHelloBundle:Default:ok.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
