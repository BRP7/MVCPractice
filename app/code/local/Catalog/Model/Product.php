<?php

class Catalog_Model_Product extends Core_Model_Abstract
{

    public function init()
    {
        $this->_resourceClass = 'Catalog_Model_Resource_Product';
        $this->_collectionClass = 'Catalog_Model_Resource_Collection_Product';
        // $this->_modelClass = 'catalog/product';
    }
    public function getStatus()
    {
        $mapping = [
            1 => "E",
            0 => "D"
        ];

        if(isset($mapping[$this->_status]))
            return $mapping[$this->_data['status']];
    }

    public function getNameFromKey(){
        
    }

}