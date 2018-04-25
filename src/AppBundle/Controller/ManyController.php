<?php

namespace AppBundle\Controller;
 
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;
use AppBundle\Entity\Reclamation;


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
    public function getAction(Request $request)
    {
        $data = array(); 
        $token = $request->get('token');
        $em = $this->getDoctrine()->getManager();
        $access_token = $em->getRepository('AppBundle:AccessToken');
        $user = $access_token->findOneBy(['token'=>$token])->getUser()->getRoles();
        $auth = "no";
        if($user[0] == "ROLE_USER"){
            $auth = "yes";
        }
        $data = array("auth"=>$auth);
        $view = $this->view($data);
        return $view;
    }

    /**
    * @Rest\Post("/api/reclamation")
    */
    public function postReclamation(Request $request) { 
        $contenu = $request->request->get('contenu');
        $date = $request->request->get('date');
        $lieu = $request->request->get('lieu');
        $data = array();
        $token = $request->get('token');
        
        
        if($contenu && $date && $lieu && $token){
            // basicly get user id from token
            $em = $this->getDoctrine()->getManager();
            $reclamationRep = $em->getRepository('AppBundle:Reclamation');
            $em = $this->getDoctrine()->getManager();
            $access_token = $em->getRepository('AppBundle:AccessToken');
            $user = $access_token->findOneBy(['token'=>$token])->getUser(); 
            //$userRepo = $em->getRepository('AppBundle:User');
            //$user = $userRepo->findOneBy(['id'=>'1']);
            $reclam = new Reclamation();
            $reclam->setLieu($lieu);
            $reclam->setContenu($contenu);
            $reclam->setDate(new \DateTime($date));
            $reclam->setIdControler($user);
            $em->persist($reclam);
            $em->flush();
            $data = array("stat"=>true,"msg"=>"done");
        }
        else{
            $data = array("stat"=>false,"msg"=>"missing arguments");
        }

        //$data = array('token'=>$slug);        
        $view = $this->view($data);
        return $this->handleView($view);
    }
}
