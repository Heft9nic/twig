<?php

namespace Acme\BlogBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\BlogBundle\Entity\Task;


class DefaultController extends  Controller
{
    public function showAction(Request $request)

    {
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('name', 'text')
            ->add('dueDate', 'datetime')
            ->add('saveAndAdd', 'submit', array('label' => 'Go add'))

            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            //return $this->redirect($this->generateUrl('show_bd'));
        }


        return $this->render('AcmeBlogBundle:Default:show.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}



