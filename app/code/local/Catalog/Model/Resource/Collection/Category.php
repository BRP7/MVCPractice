<?php
class Catalog_Model_Resource_Collection_Category extends Core_Model_Resource_Collection_Abstract{

     public function getStatus()
    {
        $mapping = [
            1 => "E",
            0 => "D"
        ];

        if(isset($mapping[$this->_data["status"]]))
            return $mapping[$this->_data['status']];
    }

}

