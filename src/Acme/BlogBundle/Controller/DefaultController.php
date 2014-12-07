<?php

namespace Acme\BlogBundle\Controller;

use Acme\BlogBundle\Entity\Car;
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
            ->add('dueDate', 'datetime')
            ->add('save', 'submit', array('label' => 'Creat Task'))
            ->add('saveAndAdd', 'submit', array('label' => 'Save and Add'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

          //  return $this->redirect($this->generateUrl('task_success'));
        }


        return $this->render('AcmeBlogBundle:Default:show.html.twig', array(
            'form' => $form->createView(),
        ));
    }



    public function createAction()
    {
        $car = new Car();
        $car->setName('A Foo Bar');
        $car->setPrice('19.99');
        $car->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getManager();
        $em->persist($car);
        $em->flush();

        return new Response('Created product id '.$car->getId());
    }


    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository('AcmeBlogBundle:Car')->find($id);

        if (!$car) {
            throw $this->createNotFoundException('NO product  found for id'.$id);
        }
    $car->setName('New product name!');
    $em->flush();

        return $this->redirect($this->generateUrl1('show_page'));
    }
}
