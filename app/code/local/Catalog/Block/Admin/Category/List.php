<?php
class Catalog_Block_Admin_Category_list  extends Core_Block_Template {
    public function __construct() { 
        if($this->findId()){
              $this->setTemplate("catalog/admin/product/view.phtml"); //design
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

    function getCartData() {
        // This is a simplified example; you should replace this with your actual mechanism to retrieve cart data
        // For demonstration purposes, we use a simple JSON file
        if (file_exists('cart_data.json')) {
            $cartData = json_decode(file_get_contents('cart_data.json'), true);
        } else {
            $cartData = array();
        }
        return $cartData;
    }
    public function findId(){
        $requstUri = $_SERVER['REQUEST_URI'];
        $findQues = stristr($requstUri, '?');
        $findQues = substr($findQues, 4);
        return $findQues;
    }

}
?>