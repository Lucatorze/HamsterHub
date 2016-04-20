<?php

namespace usersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('usersBundle:Default:index.html.twig');
    }
}
