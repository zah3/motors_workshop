<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use OldMotorsBundle\Entity\News;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class NewsController extends Controller
{

    /**
     * @Route("/")
     * @Template("OldMotorsBundle:News:all.html.twig")
     *
     */
    public function allNewsAction()
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:News');
        $allNews = $repository->findAll();
        return array ( 'news' => $allNews);
    }

}
