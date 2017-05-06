<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MotorsForRentController extends Controller
{
    /**
     * @Route("/motorsForRent")
     * @Template()
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:MotorsForRent');
        $allMotors = $repository->findAll();
        return array ( 'motors' => $allMotors);
    }

    /**
     * @Route("/motorForRent/{id}")
     * @Template()
     */
    public function singleMotorForRentAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:MotorsForRent');
        $motor = $repository->find($id);
        return array('motor' => $motor);
    }

}
