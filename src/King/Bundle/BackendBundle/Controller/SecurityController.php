<?php   namespace King\Bundle\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use King\Bundle\BackendBundle\Form\LoginType;

class SecurityController extends Controller{

    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        $form = $this->createForm(new LoginType());
        $lastUsername = '';

        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($request->attributes->has(Security::AUTHENTICATION_ERROR)) {
                $error = $request->attributes->get(Security::AUTHENTICATION_ERROR);
            } elseif (null !== $session && $session->has(Security::AUTHENTICATION_ERROR)) {
                $error = $session->get(Security::AUTHENTICATION_ERROR);
                $session->remove(Security::AUTHENTICATION_ERROR);
            } else {
                $error = '';
            }

            $lastUsername = (null === $session) ? '' : $session->get(Security::LAST_USERNAME);

            if (!empty($error)) {
                $session->getFlashBag()->add('error', $error);
            }
        } else {
            var_dump('<pre>',$form->getErrors());die;
        }

        return $this->render(
            'KingBackendBundle:Security:login.html.twig',
            array(
                'last_username' => $lastUsername,
                'form'          => $form->createView()
            )
        );
    }
}
