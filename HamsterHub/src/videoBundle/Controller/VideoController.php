<?php

namespace videoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use videoBundle\Entity\Video;

class VideoController extends Controller
{
    public function createAction(Request $request)
    {
        $video = new Video();

        $formBuilder = $this->get('form.factory')->createBuilder('form', $video);

        $formBuilder
            ->add('author',    TextType::class, array('label' => 'Auteur : '))
            ->add('name',    TextType::class, array('label' => 'Nom de la vidéo : '))
            ->add('preview',      FileType::class, array('label' => 'Image de preview : '))
            ->add('link',      TextType::class, array('label' => 'https://www.youtube.com/embed/'))
            ->add('content',      TextareaType::class, array('label' => 'Description : '))
            ->add('Envoyer',      SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($video);
                $em->flush();

                return $this->redirectToRoute('video_homepage');
            }
        }

        return $this->render('videoBundle:video:newVideo.html.twig', array(
            'videoForm' => $form->createView(),
        ));
    }

    public function viewAction($slug){

        $repository = $this->getDoctrine()->getManager()->getRepository('videoBundle:Video');
        $viewVideo = $repository->find($slug);

        $repository2 = $this->getDoctrine()->getManager()->getRepository('commentsBundle:Comments');
        $viewComments = $repository2->findBy(array('videoId' => $slug));

        return $this->render('videoBundle:video:viewVideo.html.twig', array(
           'videoInfo' => $viewVideo,
           'viewComments' => $viewComments,
        ));

    }
}
