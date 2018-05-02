<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Train;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Train controller.
 *
 * @Route("train")
 */
class TrainController extends Controller
{
    /**
     * Lists all train entities.
     *
     * @Route("/", name="train_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trains = $em->getRepository('AppBundle:Train')->findAll();

        return $this->render('train/index.html.twig', array(
            'trains' => $trains,
        ));
    }

    /**
     * Creates a new train entity.
     *
     * @Route("/new", name="train_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $train = new Train();
        $form = $this->createForm('AppBundle\Form\TrainType', $train);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($train);
            $em->flush();

            return $this->redirectToRoute('train_show', array('id' => $train->getId()));
        }

        return $this->render('train/new.html.twig', array(
            'train' => $train,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a train entity.
     *
     * @Route("/{id}", name="train_show")
     * @Method("GET")
     */
    public function showAction(Train $train)
    {
        $deleteForm = $this->createDeleteForm($train);

        return $this->render('train/show.html.twig', array(
            'train' => $train,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing train entity.
     *
     * @Route("/{id}/edit", name="train_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Train $train)
    {
        $deleteForm = $this->createDeleteForm($train);
        $editForm = $this->createForm('AppBundle\Form\TrainType', $train);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('train_edit', array('id' => $train->getId()));
        }

        return $this->render('train/edit.html.twig', array(
            'train' => $train,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a train entity.
     *
     * @Route("/{id}", name="train_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Train $train)
    {
        $form = $this->createDeleteForm($train);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($train);
            $em->flush();
        }

        return $this->redirectToRoute('train_index');
    }

    /**
     * Creates a form to delete a train entity.
     *
     * @param Train $train The train entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Train $train)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('train_delete', array('id' => $train->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
