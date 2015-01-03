<?php

namespace King\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use King\Bundle\CommonBundle\Entity\User;
use King\Bundle\FrontBundle\Form\UserType;

/**
 * Security controller
 */
class SecurityController extends Controller
{
    /**
     * Create new user
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * 
     * @return void
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isValid())
            {
                $now = new \DateTime('now');
                $passwordEncoded = $this->container->get('security.password_encoder')->encodePassword($user, $form->getData()->getPassword());
                
                $user->setPassword($passwordEncoded);
                $user->setCreated($now);
                $user->setModified($now);
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();
                
                return $this->redirect($this->generateUrl('king_front_homepage'));
            }
        }
        
        return $this->render('KingFrontBundle:Security:register.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
}
