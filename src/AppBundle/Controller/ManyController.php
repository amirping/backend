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
use AppBundle\Entity\Passager;
use AppBundle\Entity\FichePv;
use AppBundle\Entity\Train;
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
        $data = array(); 
        $token = $request->request->get('token');
        $em = $this->getDoctrine()->getManager();
        $access_token = $em->getRepository('AppBundle:AccessToken');
        $user = $access_token->findOneBy(['token'=>$token])->getUser();
        if($user){
            $user_data = array();
            $user_data = array(
                'nom'=>$user->getNom(),
                'prenom'=>$user->getPrenom(),
                'adresse'=>$user->getAdresse(),
                'tel'=>$user->getTel(),
                'matricule'=>$user->getMatricule()
            );
            $data = array("stat"=>true,"data"=>$user_data);
        }
        else{
            $data = array("stat"=>false,"msg"=>"no data");
        }
        $view = $this->view($data);
        return $view;
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
            if($user){
                $reclam = new Reclamation();
            $reclam->setLieu($lieu);
            $reclam->setContenu($contenu);
            $reclam->setDate(new \DateTime($date));
            $reclam->setIdControler($user);
            $em->persist($reclam);
            $em->flush();
            $data = array("stat"=>true,"msg"=>"done");
            }
            $data = array("stat"=>false,"msg"=>"not valid token");
        }
        else{
            $data = array("stat"=>false,"msg"=>"missing arguments");
        }

        //$data = array('token'=>$slug);        
        $view = $this->view($data);
        return $this->handleView($view);
    }


    //API Fiche PV
    /**
    * @Rest\Post("/api/FichePV")
    */
    public function postFichePv(Request $request) { 
        $cin_pass = $request->request->get('cin_pass');
        $nom_pass = $request->request->get('nom_pass');
        $prenom_pass = $request->request->get('prenom_pass');
        $adresse_pass = $request->request->get('adresse_pass');
        
        $date_pv = $request->request->get('date_pv');
        $num_train = $request->request->get('num_train');
        $montant_pv = $request->request->get('montant_pv');
        $lieu_controle = $request->request->get('lieu_controle');
        $classe = $request->request->get('classe');
        $destination_reele = $request->request->get('destination_reele');
        $type_abonn = $request->request->get('type_abonn');
        $dure_stationnement = $request->request->get('dure_stationnement');
        $date_fin_abon = $request->request->get('date_fin_abon');
        $type = $request->request->get('type');
        $data = array();
        $token = $request->get('token');       
        if(!empty($cin_pass) && !empty($nom_pass) && !empty($prenom_pass) && !empty($adresse_pass) && !empty($date_pv) && !empty($num_train) && !empty($montant_pv) && !empty($lieu_controle)  && !empty($type) && !empty($token)){
            // basicly get user id from token
            $em = $this->getDoctrine()->getManager();
            $PassagerRep = $em->getRepository('AppBundle:Passager');
            $FichePVRep = $em->getRepository('AppBundle:FichePv');
            $trainRep = $em->getRepository('AppBundle:Train');
            //$em = $this->getDoctrine()->getManager();
            $access_token = $em->getRepository('AppBundle:AccessToken');
            $user = $access_token->findOneBy(['token'=>$token])->getUser(); 
            if($user){
                $matricule = $user->getMatricule();
            //$userRepo = $em->getRepository('AppBundle:User');
            //$user = $userRepo->findOneBy(['id'=>'1']);
            // if the passager cin not in table add him and get the id * else add him then get id 
            $passager = $PassagerRep->findOneBy(['cin'=>$cin_pass]);
            $train = $trainRep->findOneBy(['numero'=>$num_train]);
            $newtrain = new Train();
            $newpassager = new Passager();
            if(!$passager){
                //$newpassager = new Passager();
                $newpassager->setCin($cin_pass);
                $newpassager->setNom($nom_pass);
                $newpassager->setPrenom($prenom_pass);
                $newpassager->setAdresse($adresse_pass);
                $em->persist($newpassager);
                $em->flush();
                $passager = $newpassager;
            }
            if(!$train){
                $newtrain->setNumero($num_train);
                $em->persist($newtrain);
                $em->flush();
                $train = $newtrain;
            }

            $fichepv = new FichePv ();
            //$fichepv->setCinPass($cin_pass);
            //$fichepv->setNomPass($nom_pass);
            //$fichepv->setPrenomPass($prenom_pass);
            //$fichepv->setAdressePass($adresse_pass);
            $fichepv->setIdPass($passager);
            $fichepv->setDatePv(new \DateTime($date_pv));
            $fichepv->setNumeroTrain($train);
            $fichepv->setMontantPv($montant_pv);
            $fichepv->setLieuControle($lieu_controle);
            $fichepv->setClasse($classe);
            $fichepv->setDestinationReele($destination_reele);
            $fichepv->setTypeAbonn($type_abonn);
            $fichepv->setDureStationnement($dure_stationnement);
            $fichepv->setDateFinAbon(new \DateTime($date_fin_abon));
            $fichepv->setType($type);
            $fichepv->setMatriculeCont($matricule);
            $em->persist($fichepv);
            $em->flush();
            $data = array("stat"=>true,"msg"=>"done");            
            }else{
                $data = array("stat"=>false,"msg"=>"not valid token");
            }
        }
        else{
            $data = array("stat"=>false,"msg"=>"missing arguments");
            //,"data"=>[$cin_pass ,$nom_pass ,$prenom_pass ,$adresse_pass, $date_pv ,$num_train ,$montant_pv , $lieu_controle,   $type, $token],"help"=>$cin_pass && $nom_pass && $prenom_pass && $adresse_pass && $date_pv && $num_train && $montant_pv && $lieu_controle  && $type && $token
        }
        //$data = array('token'=>$slug);        
        $view = $this->view($data);
        return $this->handleView($view);
    }
}
