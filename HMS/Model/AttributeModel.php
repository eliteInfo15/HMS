<?php
require_once 'Database.php';
class AttributeModel{
    private $attributeId;
    private $attributeName;
    public function getAttributeId() {
        return $this->attributeId;
    }

    public function getAttributeName() {
        return $this->attributeName;
    }

    public function setAttributeId($attributeId) {
        $this->attributeId = $attributeId;
    }

    public function setAttributeName($attributeName) {
        $this->attributeName = $attributeName;
    }

    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

