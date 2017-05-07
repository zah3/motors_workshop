<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use OldMotorsBundle\Entity\News;
use OldMotorsBundle\Entity\RenovatedMotors;
use OldMotorsBundle\Entity\MotorsForSale;
use OldMotorsBundle\Entity\Offer;

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
    public function allNewsAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:News');
        $allNews = $repository->findAll();

        $news = new News();
        $news->setDate(new \DateTime('now'));

        $form = $this
            ->createFormBuilder($news)
            ->add('date', 'datetime')
            ->add('title', 'text')
            ->add('content','textarea')
            ->add('Dodaj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $news = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('oldmotors_admin_allnews');
        }
        return array ( 'news' => $allNews,'form' => $form->createView() );
    }

    /**
     * @Route("/news/edit/{id}")
     * @Template("OldMotorsBundle:Admin/News:edit.html.twig")
     */
    public function editNewsAction($id, Request $request)
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
            ->setAction($this->generateUrl('oldmotors_admin_editnews', ['id' => $news->getId()]))
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

    /**
     * @Route("/news/delete/{id}")
     */
    public function deleteNewsAction($id)
    {
        $news = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:News')
            ->find($id);
        if(!$news){
            throw $this
                ->createNotFoundException('Nie znaleziono aktualności');
        }
        $em = $this
            ->getDoctrine()
            ->getManager();
        $em->remove($news);
        $em->flush();
        return $this->redirectToRoute('oldmotors_admin_deletenews');
    }

    // Renovated motors
    /**
     * @Route("/renovatedMotors")
     * @Template("OldMotorsBundle:Admin/RenovatedMotors:all.html.twig")
     */
    public function allRenovatedMotorsAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:RenovatedMotors');
        $allMotors = $repository->findAll();

        $motor = new RenovatedMotors();

        $form = $this
            ->createFormBuilder($motor)
            ->add('renovationDate', 'datetime')
            ->add('productionDate', 'datetime')
            ->add('name', 'text')
            ->add('mileage', 'integer')
            ->add('color', 'text')
            ->add('name', 'text')
            ->add('description','textarea')
            ->add('Dodaj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $motor = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($motor);
            $em->flush();

            return $this->redirectToRoute('oldmotors_admin_allrenovatedmotors');
        }
        return array ( 'all' => $allMotors,'form' => $form->createView() );
    }

    /**
     * @Route("/renovatedMotors/edit/{id}")
     * @Template("OldMotorsBundle:Admin/RenovatedMotors:edit.html.twig")
     */
    public function editRenovatedMotorAction($id, Request $request)
    {
        $motor = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:RenovatedMotors')
            ->find($id);
        if(!$motor){
            throw $this->createNotFoundException('Motor nie został znaleziony');
        }
        $form= $this
            ->createFormBuilder($motor)
            ->add('renovationDate', 'datetime')
            ->add('productionDate', 'datetime')
            ->add('name', 'text')
            ->add('mileage', 'integer')
            ->add('color', 'text')
            ->add('name', 'text')
            ->add('description','textarea')
            ->add('Edytuj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this
                ->getDoctrine()
                ->getManager();
            $em->flush();
            return $this->redirectToRoute('oldmotors_admin_allrenovatedmotors');
        }
        return [ 'form' => $form->createView()];
    }

    /**
     * @Route("/renovatedMotors/delete/{id}")
     */
    public function deleteRenovatedMotorsAction($id)
    {
        $motor = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:RenovatedMotors')
            ->find($id);
        if(!$motor){
            throw $this
                ->createNotFoundException('Nie znaleziono takiego motoru.');
        }
        $em = $this
            ->getDoctrine()
            ->getManager();
        $em->remove($motor);
        $em->flush();
        return $this->redirectToRoute('oldmotors_admin_allrenovatedmotors');
    }

    //motors for sale
    /**
     * @Route("/motorsForSale")
     * @Template("OldMotorsBundle:Admin/MotorsForSale:all.html.twig")
     */
    public function allMotorsForSaleAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:MotorsForSale');
        $allMotors = $repository->findAll();

        $motor = new MotorsForSale();

        $form = $this
            ->createFormBuilder($motor)
            ->add('price', 'integer')
            ->add('productionDate', 'datetime')
            ->add('name', 'text')
            ->add('mileage', 'integer')
            ->add('color', 'text')
            ->add('name', 'text')
            ->add('description','textarea')
            ->add('Dodaj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $motor = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($motor);
            $em->flush();

            return $this->redirectToRoute('oldmotors_admin_allmotorsforsale');
        }
        return array ( 'all' => $allMotors,'form' => $form->createView() );
    }

    /**
     * @Route("/motorsForSale/edit/{id}")
     * @Template("OldMotorsBundle:Admin/MotorsForSale:edit.html.twig")
     */
    public function editMotorForSaleAction($id, Request $request)
    {
        $motor = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:MotorsForSale')
            ->find($id);
        if(!$motor){
            throw $this->createNotFoundException('Motor nie został znaleziony');
        }
        $form= $this
            ->createFormBuilder($motor)
            ->add('price', 'integer')
            ->add('productionDate', 'datetime')
            ->add('name', 'text')
            ->add('mileage', 'integer')
            ->add('color', 'text')
            ->add('name', 'text')
            ->add('description','textarea')
            ->add('Edytuj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this
                ->getDoctrine()
                ->getManager();
            $em->flush();
            return $this->redirectToRoute('oldmotors_admin_allmotorsforsale');
        }
        return [ 'form' => $form->createView()];
    }

    /**
     * @Route("/motorsForSale/delete/{id}")
     */
    public function deleteMotorForSaleAction($id)
    {
        $motor = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:MotorsForSale')
            ->find($id);
        if(!$motor){
            throw $this
                ->createNotFoundException('Nie znaleziono takiego motoru.');
        }
        $em = $this
            ->getDoctrine()
            ->getManager();
        $em->remove($motor);
        $em->flush();
        return $this->redirectToRoute('oldmotors_admin_allmotorsforsale');
    }

    // offer
    /**
     * @Route("/offers")
     * @Template("OldMotorsBundle:Admin/Offer:all.html.twig")
     */
    public function allOfferAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:Offer');
        $offers = $repository->findAll();

        $offer = new Offer();

        $form = $this
            ->createFormBuilder($offer)
            ->add('name', 'text')
            ->add('price', 'integer')
            ->add('description','textarea')
            ->add('Dodaj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $offer = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($offer);
            $em->flush();

            return $this->redirectToRoute('oldmotors_admin_alloffer');
        }
        return array ( 'offers' => $offers,'form' => $form->createView() );
    }

    /**
     * @Route("/offers/edit/{id}")
     * @Template("OldMotorsBundle:Admin/Offer:edit.html.twig")
     */
    public function editOfferAction($id, Request $request)
    {
        $offer = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:Offer')
            ->find($id);
        if(!$offer){
            throw $this->createNotFoundException('Usługa nie została znaleziona');
        }
        $form= $this
            ->createFormBuilder($offer)
            ->add('name', 'text')
            ->add('price', 'integer')
            ->add('description','textarea')
            ->add('Edytuj', 'submit')
            ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this
                ->getDoctrine()
                ->getManager();
            $em->flush();
            return $this->redirectToRoute('oldmotors_admin_alloffer');
        }
        return [ 'form' => $form->createView()];
    }

    /**
     * @Route("/offers/delete/{id}")
     */
    public function deleteOfferAction($id)
    {
        $offer = $this
            ->getDoctrine()
            ->getRepository('OldMotorsBundle:Offer')
            ->find($id);
        if(!$offer){
            throw $this
                ->createNotFoundException('Nie znaleziono takiego motoru.');
        }
        $em = $this
            ->getDoctrine()
            ->getManager();
        $em->remove($offer);
        $em->flush();
        return $this->redirectToRoute('oldmotors_admin_alloffer');
    }

}
