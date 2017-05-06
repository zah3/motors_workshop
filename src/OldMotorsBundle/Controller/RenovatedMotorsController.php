<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OldMotorsBundle\Entity\RenovatedMotors;

class RenovatedMotorsController extends Controller
{
    /**
     * @Route("/renovatedMotors")
     * @Template()
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:RenovatedMotors');
        $all = $repository->findAll();
        return array ( 'all' => $all);
    }

    /**
     * @Route("/renovatedMotor/{id}")
     * @Template()
     */
    public function singleRenovatedMotorAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:RenovatedMotors');
        $renovatedMotor = $repository->find($id);
        return array('renovatedMotor' => $renovatedMotor);
    }

}
