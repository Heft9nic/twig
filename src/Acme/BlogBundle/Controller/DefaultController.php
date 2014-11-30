<?php

namespace Acme\BlogBundle\Controller;

use Acme\BlogBundle\Entity\Car;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends  Controller
{
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

    public function showAction($id)
    {
        $car = $this->getDoctrine()
            ->getRepository('AcmeBlogBundle:Car')
            ->find($id);

        if (!$car) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        // ... do something, like pass the $product object into a template
    }
}
