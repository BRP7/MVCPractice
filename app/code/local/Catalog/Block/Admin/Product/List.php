<?php
class Catalog_Block_Admin_Product_list  extends Core_Block_Template {
    public function __construct() { 
         $this->setTemplate("catalog/admin/product/list.phtml"); //design
    }
    public function showList() {
        $requstUri = $_SERVER['REQUEST_URI'];
        $findQues = stristr($requstUri, '?');
        $findQues = substr($findQues, 4);
        $productCollection = Mage::getModel('catalog/product')->getCollection();
        if($findQues){ 
            $productCollection = $productCollection->addFieldToFilter("product_id", $findQues);
        }
        return $productCollection;
    }

}
?>