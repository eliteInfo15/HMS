<?php
require_once 'Database.php';
require_once 'AttributeModel.php';
class TestModel{
    private $testId;
    private $testName;
    static $testAttributes;
    public function __construct() {
        Database::connectDb();
    }
    public function getTestId() {
        return $this->testId;
    }

    public function getTestName() {
        return $this->testName;
    }

    public static function getTestAttributes() {
        return self::$testAttributes;
    }

    public function setTestId($testId) {
        $this->testId = $testId;
    }

    public function setTestName($testName) {
        $this->testName = $testName;
    }

    public static function setTestAttributes($testAttributes) {
        self::$testAttributes = $testAttributes;
    }

    public function addTest($attributesArray) {
     $addTest="insert into tests(test_name) values('$this->testName')";
     $result=Database::insert($addTest);
     foreach ($attributesArray as $attribute) {
         $insertAttribute="insert into attributes(attribute_name) values('$attribute')";
         Database::insert($insertAttribute);
     }
     $attributeIdArray=$this->getAttributeIdArray($attributesArray);
     $testId=$this->getLastTestId();
     
     foreach ($attributeIdArray as $attributeId) {
         $addTestAttributes="insert into test_attributes values('$testId','$attributeId')";
         $result=Database::insert($addTestAttributes);
     }
     return $result;
    }
    private function getAttributeIdArray($attributesArray){
         $ids= implode("', '", $attributesArray);
        $get="select attribute_id from attributes where attribute_name in ('$ids')";
        $result=Database::read($get);
        $attributeIdArray=array();
        while($data=$result->fetch(PDO::FETCH_ASSOC)){
            array_push($attributeIdArray, $data["attribute_id"]);
        }
        return $attributeIdArray;
    }
    private function getLastTestId() {
        $get="select max(test_id) as id from tests";
        $result=Database::read($get);
        $data=$result->fetch(PDO::FETCH_ASSOC);
        return $data["id"];
    }
    public function getAllTests() {
        $get="select * from tests";
        $result=Database::read($get);
        return $result;
    }
    public function removeTest() {
        $removeTest="delete from tests where test_id='$this->testId'";
        return Database::delete($removeTest);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

