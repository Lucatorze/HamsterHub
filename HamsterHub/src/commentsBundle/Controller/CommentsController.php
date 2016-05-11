<?php

namespace commentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use commentsBundle\Entity\Comments;

class CommentsController extends Controller
{
    public function createAction(Request $request, $slug)
    {
        $comments = new Comments();

        $formBuilder = $this->get('form.factory')->createBuilder('form', $comments);

        $formBuilder
            ->add('author',    TextType::class, array('label' => 'Auteur : '))
            ->add('content',      TextareaType::class, array('label' => 'Votre commentaire : '))
            ->add('videoId', HiddenType::class, array('data' => $slug))
            ->add('envoyer',      SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($comments);
                $em->flush();

                return $this->redirectToRoute('video_view', array('slug' => $slug));
            }
        }

        return $this->render('commentsBundle:comments:newComments.html.twig', array(
            'commentsForm' => $form->createView(),
        ));
    }
}
