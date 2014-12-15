<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/hello/{name}", name="_demo_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/contact", name="_demo_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $mailer = $this->get('mailer');

            // .. setup a message and send it
            // http://symfony.com/doc/current/cookbook/email.html

            $request->getSession()->getFlashBag()->set('notice', 'Message sent!');

            return new RedirectResponse($this->generateUrl('_demo'));
        }

        return array('form' => $form->createView());
    }

    /**
     * Start challenge when link approved
     *
     * @param Digitas\Catendrier\Entity\Link $link Link object
     * @param Silex\Application $em
     *
     * @return void
     */
    public function addChallengeWhenApproveLink($link, $em){

        $challenge = $em->getRepository('Digitas\Catendrier\Entity\Challenge')->findOneBy(array(
            'chosenDate' => $link->getChosenDate()
        ));

        $token = $app['security']->getToken();
        $currentUser = '';
        if (null !== $token) {
            $user = $token->getUser();
            $currentUser = $user->getUsername();
        }
        $now = new \DateTime('now');

        if (is_null($challenge)) {

            //Insert Challenge
            $challenge = new Challenge();
            $challenge->setChosenDate($link->getChosenDate());
            $challenge->setCreatedDate($now);
            $challenge->setCreatedBy($currentUser);
            $em->persist($challenge);
            $em->flush();
        }

        //Insert Challenge Duration
        $challengeDuration = $em->getRepository('Digitas\Catendrier\Entity\ChallengeDuration')->getLatestDuration($challenge->getId());

        if (is_null($challengeDuration) && !count($challengeDuration)) {


            $chosenDate = clone $now;
            $durationConfig = $app['config']['duration_interval'];
            $challengeDurationTime = $chosenDate->add(new \DateInterval('PT' . $durationConfig . 'S'));

            $challengeDuration = new ChallengeDuration();
            $challengeDuration->setStartDate($now);
            $challengeDuration->setEndDate($challengeDurationTime);

            $challengeDuration->setChallenge($challenge);
            $em->persist($challengeDuration);
            $em->flush();
        }
    }
}
