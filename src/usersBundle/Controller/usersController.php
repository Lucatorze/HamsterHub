<?php

namespace usersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class usersController extends Controller
{
    public function indexAction()
    {
        return $this->render('usersBundle:Default:index.html.twig');
    }
}
