<?php

class Catalog_ItemController extends Zend_Controller_Action {

  protected $em = null;

  public function init(){
      $this->em = \Zend_Registry::get('doctrine')->getEntityManager();
  }

  // action to display a catalog item
  public function displayAction(){
      $input->setData($this->getRequest()->getParams());

      try {
         $stamp_item = $em->getRepository('\Square\Entity\StampItem')->find($input->id);
         if (!is_null($stamp_item)) {
             // snip...
         }
      }
       catch (Exception $e) {
                    // snip...
    }
  }
}