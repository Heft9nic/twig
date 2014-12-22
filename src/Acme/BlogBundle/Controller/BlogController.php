<?php

namespace Acme\BlogBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class BlogController
 * @package Acme\BlogBundle\Controller
 */
class BlogController extends  Controller
{


    /**
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($slug)
    {
        // use the $slug variable to query the database
//        $blog = ...
        $this->get('my_mailer')->testEmail('heft9nic@gmail.com');
        return $this->render('AcmeBlogBundle:Blog:show.html.twig', array(
            'blog' => $slug,
        ));
    }
    public function homepageAction($page)
    {

    }
    public  function stasAction()
    {
               $time = time();
        return $this->render('AcmeBlogBundle:Blog:stas.html.twig', array(
            'blog' => 'stas',
            'time' => $time,
        ));
    }

}