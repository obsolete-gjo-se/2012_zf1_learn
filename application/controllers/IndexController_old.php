<?php

use application\models\ItemService;

class IndexController_old extends Zend_Controller_Action {
    
  public function init() 
  {
     $this->view->doctype('XHTML1_STRICT');
      
     $this->service = new Application_Model_ItemService();     
  }

    /**
     * Retrieve the Doctrine Container.
     *
     * @return Bisna\Application\Container\DoctrineContainer
     */
    public function getDoctrineContainer(){
        return $this->doctrine = Zend_Registry::get('doctrine');
        // return $this->getInvokeArg('bootstrap')->getResource('doctrine');
    }

    public function indexAction(){
        $sitemap = $em->find('Sitemap', 1);
        $this->view->sitemap = $sitemap;
    }
    
    // public function displayAction(){
    
    // $input->setData($this->getRequest()
    // ->getParams());
    
    // try {
    // $stamp_item =
// $em->getRepository('\Square\Entity\StampItem')->find($input->id);
    
    // if(! is_null($stamp_item)) {
    
    // // snip...
    // }
    // } catch (Exception $e) {
    // // snip...
    // }
    // }
}

