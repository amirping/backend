<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FichePv;
use AppBundle\Entity\User;
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
        $agent_stat = array();
        $fichePvs = $em->getRepository('AppBundle:FichePv')->findAll();
        $agents = $em->getRepository('AppBundle:User')->findAll();
        $fichepv_stat['nbr'] = count($fichePvs);
        $agent_stat['nbr'] = count($agents);
        $total_paye = 0 ;
        $montant = 0 ;
        foreach ($fichePvs as $pv) {
            $montant+=$pv->getMontantPv();
            if ($pv->getEtatPv() == 1) {
                $total_paye++;
            }
        }
        $fichepv_stat['montant'] = $montant;
        $fichepv_stat['per_paye'] = ($total_paye * 100)/count($fichePvs);
        // end stat for fiche pv

        $allstat['fichepv'] = $fichepv_stat;
        $allstat['agent'] = $agent_stat;
        return $this->render('stat.html.twig', [
            'stat' => $allstat
        ]);
    }

}
