<?php
namespace AppBundle\Controller;

use AppBundle\Entity\FichePv;
use AppBundle\Entity\Reclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class NotifController extends Controller
{
    public function recentNotifsAction()
    {
        $recs = 0;
        $pvs = 0;
        $today = new \DateTime('now');
        $yestrday = clone $today;
        $yestrday->sub(new \DateInterval('P1D'));
        $em = $this->getDoctrine()->getManager();
        $FichePVRep = $em->getRepository('AppBundle:FichePv');
        $RecRep = $em->getRepository('AppBundle:Reclamation');
        //$recs = count($RecRep->findOneBy(['date'=>$id_train]));
        //$pvs = count($FichePVRep->findAll());

        $queryrec = $em->createQuery(
            'SELECT r
            FROM AppBundle:Reclamation r
            WHERE r.date > :yester'
        )->setParameter('yester', $yestrday);
        
        $querypv = $em->createQuery(
            'SELECT f
            FROM AppBundle:FichePv f
            WHERE f.datePv > :yester'
        )->setParameter('yester', $yestrday);

        $recs = count($queryrec->getResult());
        $pvs = count($querypv->getResult());
        return $this->render(
            'notification.html.twig',
            array('rec' => $recs,'pv'=>$pvs,'pday'=>$yestrday)
        );
    }
}
?>