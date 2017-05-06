<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MotorsForSaleController extends Controller
{
    /**
     * @Route("/motorsForSale")
     * @Template()
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:MotorsForSale');
        $allMotors = $repository->findAll();
        return array ( 'motors' => $allMotors);
    }

    /**
     * @Route("/motorForSale/{id}")
     * @Template()
     */
    public function singleMotorForSaleAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:MotorsForSale');
        $motor = $repository->find($id);
        return array('motor' => $motor);
    }

}
