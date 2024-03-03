<?php
class Sales_Controller_Quote extends Core_Controller_Front_Action{

    

    public function addAction() {
        // Get the product ID from the GET parameter
      $this->linkActionProceed();
    }
    public function removeAction(){
        $this->removeActionProceed(); 
    }
    
    public function postdataAction() {  
        $this->postdataActionProceed();
     }
}