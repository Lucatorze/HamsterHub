<?php

namespace videoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('videoBundle:Video');
        $videoList = $repository->findAll(array(), array('id' => 'desc'));

        return $this->render('videoBundle:Default:index.html.twig', array(
            'videoList' => $videoList,
        ));

    }
}
