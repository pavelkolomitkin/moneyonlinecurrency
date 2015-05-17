<?php

namespace MoneyOnlineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MoneyOnlineBundle:Default:index.html.twig', array('name' => $name));
    }
}
