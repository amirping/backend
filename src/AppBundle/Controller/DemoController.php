<?php

// src/Acme/ApiBundle/Controller/DemoController.php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class DemoController extends FOSRestController
{
    public function getDemosAction()
    {
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
        
    }
    /*
    * @Route("/profile")
    */
    public function FunctionName()
    {
        $data = array("hello" => "wsssssorld");
        $view = $this->view($data);
        return $this->handleView($view);
    }
    
}
  