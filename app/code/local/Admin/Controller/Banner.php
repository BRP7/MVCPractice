<?php

class Admin_Controller_Banner extends Core_Controller_Admin_Action{

    protected $_allowedActions=['form'];

    public function formAction(){
        $layout = $this->getLayout(); //core_block_layout
        // $layout->getChild('head');
        // echo "<pre>";
        // $layout->getChild('head');
        // $layout->getChild('head')->addCss('css/navigation.css');
        // $layout->getChild('head')->addCss('css/page.css');

        $banner = $layout->createBlock('core/template')
                    ->setTemplate('banner/admin/form.phtml');
        $layout->getChild('content')
            ->addChild('banner', $banner);
            // ->addChild('banner1', $banner);
        $layout->toHtml();
    }
    public function listAction(){
        

    }
}