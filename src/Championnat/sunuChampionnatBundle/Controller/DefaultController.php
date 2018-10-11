<?php

namespace Championnat\sunuChampionnatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('sunuChampionnatBundle:Default:index.html.twig');
    }
}
