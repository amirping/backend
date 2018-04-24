<?php

namespace AppBundle\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;


class ManyController extends FOSRestController
{
    public function getManyAction()
    {
        $data = array("hello" => "worlsssssssssssssssd");
        $view = $this->view($data);
        return $this->handleView($view);
    }
    public function setManyAction(){
        $data = array("hello" => "aaaaaaaaaaaaaaaaaaaeworlsssssssssssssssd");
        $view = $this->view($data);
        return $this->handleView($view);
    } 
    
    /**
    * @Rest\Post("/api/user", name="get_user_data")
    */
    public function postAction(Request $request) { 
        $slug = $request->request->get('name');
        $data = array('token'=>$slug);        
        $view = $this->view($data);
        return $this->handleView($view);
    }
    
    /**
    * @Rest\Get("/api/user")
    */
    public function getAction()
    {
      $restresult = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
       $data = array(); 
        //return $this->handleView($view);
        if ($restresult === null) {
            $data = array("there are no users exist" => Response::HTTP_NOT_FOUND);
            //return new View("there are no users exist", Response::HTTP_NOT_FOUND);
            $view = $this->view($data);
            return $view;
     }
       $view = $this->view($restresult);
       return $view;
    }

    /**
    * @Rest\Post("/api/reclamation")
    */
    public function postReclamation(Request $request) { 
        $slug = $request->request->get('name');
        $data = array('token'=>$slug);        
        $view = $this->view($data);
        return $this->handleView($view);
    }
}
