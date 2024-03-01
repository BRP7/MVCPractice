<?php
class Catalog_Model_Category extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Catalog_Model_Resource_Category';
        $this->_collectionClass = 'Catalog_Model_Resource_Collection_Category';
        // $this->_modelClass = 'catalog/category';
    }
    // public function getArrayOfIDs(){
    //     //array -> block/category->id to name mapping getNameFromId define
    //     //product/model->getNameFromId ->call getModel(catalog/category) obj
    // }
    public function getCategoryIdName()
    {
        $categoryCollection = $this->getCollection();
        $categorys = [];
        foreach ($categoryCollection->getData() as $category) {
            $categorys[$category->getCategoryId()] = $category->getCategoryName();
        }
        return $categorys;
    }
    public function getCategoryNameById($mapping, $product)
    {
        $productData = $product->getData();
        if (isset($productData['category_id'])) {
            return $mapping[$productData['category_id']];
        }
    }

    //public

}
?>