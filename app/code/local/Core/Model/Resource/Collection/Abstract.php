<?php

class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null;

    protected $_modelClass = null;
    protected $_select = [];
    protected $_data = [];
    // public function __construct()
    // {
    //     echo 123;
    // }
    public function setResource($resource)
    {
        $this->_resource = $resource;
        return $this;
    }
    public function setModelClass($modelClass)
    {
        $this->_modelClass = $modelClass;
        return $this;
    }
    public function select()
    {
        $this->_select['FROM'] = $this->_resource->getTableName();
        return $this;
    }
    public function addFieldToFilter($field, $value)
    {
        // echo 123;
        // print_r($field);
        // print_r($value);
        $this->_select['WHERE'][$field][] = $value;
        // print_r($this->_select['WHERE']);
        return $this;
    }
    public function load()
    {
        $sql = "SELECT * FROM {$this->_select['FROM']}";  //table name
        if (isset($this->_select["WHERE"])) {  //where condition set hase toh j jase
            $whereCondition = [];
            foreach ($this->_select["WHERE"] as $column => $value) {
                foreach ($value as $_value) {
                    if (!is_array($_value)) {
                        $_value = array('eq' => $_value);
                    }
                    foreach ($_value as $_condition => $_v) {
                        if (is_array($_v)) {
                            $_v = array_map(function ($v) {
                                return "'{$v}'";
                            }, $_v);
                            $_v = implode(',', $_v);
                        }
                        switch ($_condition) {
                            case 'eq':
                                $whereCondition[] = "{$column} = '{$_v}'";
                                break;
                            case 'in':
                                $whereCondition[] = "{$column} IN ({$_v})";
                                break;
                            case 'like':
                                $whereCondition[] = "{$column} LIKE '{$_v}'";
                                break;
                        }
                    }
                }
            }
            $sql .= " WHERE " . implode(" AND ", $whereCondition);
            // print_r($sql);
        }
        // echo $sql;
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $this->_data[] = Mage::getModel($this->_modelClass)->setData($row);
        }
        // print_r($this->_data);
    }
    public function getData()
    {
        $this->load();
        return $this->_data;
    }
}
