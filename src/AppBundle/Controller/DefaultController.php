<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FichePv;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $allstat = array();
        // replace this example code with whatever you need
        $em = $this->getDoctrine()->getManager();
        // stat en ralation avec fiche pv
        $fichepv_stat = array();
        $fichePvs = $em->getRepository('AppBundle:FichePv')->findAll();
        $fichepv_stat['nbr'] = count($fichePvs);
        $total_paye = 0 ;
        foreach ($fichePvs as $pv) {
            if ($pv->getEtatPv() == 1) {
                $total_paye++;
            }
        }
        $fichepv_stat['per_paye'] = ($total_paye * 100)/count($fichePvs);

        // end stat for fiche pv

        $allstat['fichepv'] = $fichepv_stat;
        return $this->render('stat.html.twig', [
            'stat' => $allstat
        ]);
    }
}
