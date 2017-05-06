<?php

namespace OldMotorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class OfferController extends Controller
{
    /**
     * @Route("/offers")
     * @Template()
     */
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('OldMotorsBundle:Offer');
        $offers = $repository->findAll();
        return array ( 'offers' => $offers );
    }

}
