<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FichePv;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Fichepv controller.
 *
 * @Route("fichepv")
 */
class FichePvController extends Controller
{
    /**
     * Lists all fichePv entities.
     *
     * @Route("/", name="fichepv_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        if (!($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN'))&&!($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN_COMMERCIAL'))&&!($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN_JUREDIQUE'))) {
            throw $this->createAccessDeniedException('GET OUT!');
        }
        $em = $this->getDoctrine()->getManager();

        $fichePvs = $em->getRepository('AppBundle:FichePv')->findAll();

        return $this->render('fichepv/index.html.twig', array(
            'fichePvs' => $fichePvs,
        ));
    }

    /**
     * Creates a new fichePv entity.
     *
     * @Route("/new", name="fichepv_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fichePv = new Fichepv();
        $form = $this->createForm('AppBundle\Form\FichePvType', $fichePv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fichePv);
            $em->flush();

            return $this->redirectToRoute('fichepv_show', array('id' => $fichePv->getId()));
        }

        return $this->render('fichepv/new.html.twig', array(
            'fichePv' => $fichePv,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fichePv entity.
     *
     * @Route("/{id}", name="fichepv_show")
     * @Method("GET")
     */
    public function showAction(FichePv $fichePv)
    {
        $deleteForm = $this->createDeleteForm($fichePv);
        $em = $this->getDoctrine()->getManager();
        $id = $fichePv->getIdPass();
        $id_train = $fichePv->getNumeroTrain();
        $passager = $em->getRepository('AppBundle:Passager')->findOneBy(['id'=>$id]);
        $train = $em->getRepository('AppBundle:Train')->findOneBy(['id'=>$id_train]);
        return $this->render('fichepv/show.html.twig', array(
            'fichePv' => $fichePv,
            'passager'=> $passager,
            'train'=> $id_train,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fichePv entity.
     *
     * @Route("/{id}/edit", name="fichepv_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FichePv $fichePv)
    {
        $deleteForm = $this->createDeleteForm($fichePv);
        $editForm = $this->createForm('AppBundle\Form\FichePvType', $fichePv);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fichepv_edit', array('id' => $fichePv->getId()));
        }

        return $this->render('fichepv/edit.html.twig', array(
            'fichePv' => $fichePv,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fichePv entity.
     *
     * @Route("/{id}", name="fichepv_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FichePv $fichePv)
    {
        $form = $this->createDeleteForm($fichePv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fichePv);
            $em->flush();
        }

        return $this->redirectToRoute('fichepv_index');
    }

    /**
     * Creates a form to delete a fichePv entity.
     *
     * @param FichePv $fichePv The fichePv entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FichePv $fichePv)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fichepv_delete', array('id' => $fichePv->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * regler pv.
     *
     * @Route("/{id}/payer", name="fichepv_payer")
     * @Method("GET")
     */
    public function payerAction(Request $request, FichePv $fichePv)
    {
        $em = $this->getDoctrine()->getManager();
        $fichePv->setEtatPv(true);
        $em->flush();
        return $this->redirectToRoute('fichepv_index');

    }
}
