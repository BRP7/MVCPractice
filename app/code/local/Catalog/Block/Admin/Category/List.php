<?php
class Catalog_Block_Admin_Category_list  extends Core_Block_Template {
    public function __construct() { 
        if($this->findId()){
              $this->setTemplate("catalog/admin/product/list.phtml"); //design
        }else{
            $this->setTemplate("catalog/admin/category/list.phtml"); //design
        }
    }
    public function showList() {
        $findQues = $this->findId();
        $productCollection = Mage::getModel('catalog/product')->getCollection();
        if($findQues){ 
            $productCollection = $productCollection->addFieldToFilter("category_id", $findQues);
        }
        return $productCollection;
    }

    public function findId(){
        $requstUri = $_SERVER['REQUEST_URI'];
        $findQues = stristr($requstUri, '?');
        $findQues = substr($findQues, 4);
        return $findQues;
    }

}
?>