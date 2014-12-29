<?php

namespace Acme\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class TransController extends Controller
{
    /**
     * @Template()
     */
    public  function mesAction()
    {
        $hello = $this->get('translator')->trans('hello');

        return array('mes' => $hello, );
    }
}
