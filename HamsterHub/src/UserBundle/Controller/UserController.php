<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType ;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class UserController extends Controller
{

    public function getGlobals() {
        return array(
            'session'   => $_SESSION,
        ) ;
    }

    public function loginAction()
    {

        $login = new User();

        $formBuilder = $this->get('form.factory')->createBuilder('form', $login);

        $formBuilder
            ->add('nickname',    TextType::class)
            ->add('password',    PasswordType::class)
            ->add('login',      SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        return $this->render('UserBundle:User:login.html.twig', array(
            'loginForm' => $form->createView(),
        ));

    }

    public function registerAction(Request $request)
    {
        $register = new User();

        $formBuilder = $this->get('form.factory')->createBuilder('form', $register);

        $formBuilder
            ->add('nickname',    TextType::class, array('label' => 'Pseudo : '))
            ->add('password',    PasswordType::class, array('label' => 'Mot de passe : '))
            ->add('email',    EmailType::class, array('label' => 'E-Mail : '))
            ->add('date',      BirthdayType::class, array('label' => 'Date de naissance : '))
            ->add('avatar',      FileType::class, array('label' => 'Avatar : '))
            ->add('register',      SubmitType::class, array('label' => 'S\'inscrire'))
        ;

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($register);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'utilisateur inscrit.');

                return $this->redirectToRoute('video_homepage');
            }
        }

        return $this->render('UserBundle:User:register.html.twig', array(
            'registerForm' => $form->createView(),
        ));
    }

    public function userListAction()
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('UserBundle:User');
        $userList = $repository->findAll();

        return $this->render('UserBundle:User:userList.html.twig', array(
            'userList' => $userList,
        ));

    }

    public function userProfileAction($slug)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('UserBundle:User');
        $userInfo = $repository->find($slug);

        return $this->render('UserBundle:User:profile.html.twig', array(
            'userInfo' => $userInfo,
        ));
    }
}
