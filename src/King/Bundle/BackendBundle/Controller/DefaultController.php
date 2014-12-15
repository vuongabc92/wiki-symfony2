<?php namespace King\Bundle\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KingBackendBundle:Default:index.html.twig', array(

        ));
    }
}
