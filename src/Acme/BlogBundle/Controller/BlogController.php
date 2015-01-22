<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
        $this->get('my_mailer')->testEmail('heft9nic@gmail.com');
        return $this->render('AcmeBlogBundle:Blog:show.html.twig', array(
            'blog' => $slug,
        ));
    }

    public function homepageAction()
    {
        return $this->render('AcmeBlogBundle:Blog:home.html.twig');

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
