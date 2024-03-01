<?php

class Admin_Block_List extends Core_Block_Template{
    public function __construct(){
         $this->setTemplate("admin/list.phtml");
    }
    function showList()
    {
        $requstUri = $_SERVER['REQUEST_URI'];
        $findQues = stristr($requstUri, '?');
        $findQues = substr($findQues, 4);
        $productCollection = Mage::getModel('catalog/product')->getCollection()
            ->addFieldToFilter("category_id", $findQues);
            return $productCollection;   
    }
}