<?php
class Admin_Controller_Catalog_Category extends Core_Controller_Admin_Action
{


    // public function setFormCss()
    // {
    //     $layout = $this->getLayout();
    //     $layout->getChild('head')
    //         ->addCss('category.css');
    // }
    public function formAction()
    {
        $layout = $this->getLayout();
        $this->setFormCss('form');
        $child = $layout->getChild('content'); //object j return krse content no layout ma create block ma ena class no objec t malse
        $productForm = $layout->createBlock('catalog/admin_category_form');
        $child->addChild('form', $productForm);
        $layout->toHtml();
    }


    public function saveAction()
    {
        $data = $this->getRequest()->getparams("catalog_category");
        Mage::getModel("catalog/category")
            ->setData($data)
            ->save();
    }
    public function deleteAction()
    {
        Mage::getModel('catalog/category')
            ->setId($this->getRequest()->getParams('id'))
            ->delete();
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getchild('content'); //core_block_layout
        $productForm = $layout->createBlock('catalog/admin_category_list');
        $child->addchild('list', $productForm);
        $layout->toHtml();
    }

    public function view(){
        
    }


}

?>