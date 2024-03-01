<?php

class Core_Controller_Front
{
    public function init()
    {
        $request = Mage::getModel('core/request');
        $actionName = $request->getActionName() . 'Action';
        $className = $request->getFullControllerClass();
        $controller = new $className();
        $controller->$actionName();
    }
}


