<?php

namespace King\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KingFrontBundle:Default:index.html.twig', array());
    }
}
