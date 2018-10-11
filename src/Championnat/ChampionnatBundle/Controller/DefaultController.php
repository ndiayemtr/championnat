<?php

namespace Championnat\ChampionnatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ChampionnatBundle:Default:index.html.twig');
    }
}
