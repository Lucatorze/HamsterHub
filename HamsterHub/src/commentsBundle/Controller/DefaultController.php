<?php

namespace commentsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('commentsBundle:Default:index.html.twig');
    }
}
