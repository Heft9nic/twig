<?php
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
