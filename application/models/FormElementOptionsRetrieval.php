<?php
namespace application\models;

//interface FormElementPopulator {
interface FormElementOptionsRetrieval {
    
    //--public function getDefaultMultiOptions(\Zend_Form_Element_Multi $element);
     public function getDefaultMultiOptions($e);
}

?>
