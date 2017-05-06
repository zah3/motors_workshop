<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 */
class AdminController extends Controller
{
    /**
     * @Route("/")
     * @Template("OldMotorsBundle:Admin:home.html.twig")
     */
    public function startAction()
    {
    }

    /**
     * @Route("/news")
     * @Template("OldMotorsBundle:Admin/News:all.html.twig")
     */
    public function allNewsAction()
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:News');
        $allNews = $repository->findAll();
        return array ( 'news' => $allNews);
    }
    /**
     * @Route("/news/edit/{id}")
     * @Template("OldMotorsBundle:Admin/News:edit.html.twig")
     */
    public function editAction($id, Request $request)
    {
        $news = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:News')
            ->find($id);
        if(!$news){
            throw $this->createNotFoundException('Aktualność nie została znaleziona');
        }
        $form= $this
            ->createFormBuilder($news)
            ->setAction($this->generateUrl('oldmotors_admin_edit', ['id' => $news->getId()]))
            ->add('date', 'datetime')
            ->add('title', 'text')
            ->add('content','textarea')
            ->add('Edytuj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this
                ->getDoctrine()
                ->getManager();
            $em->flush();
            return $this->redirectToRoute('oldmotors_admin_allnews');
        }
        return [ 'form' => $form->createView()];
    }
}
