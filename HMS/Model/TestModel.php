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
    public function showTestResultToDoctor($patientId,$testId,$doctor) {
        $get="select * from patient_test_result, opd";
    }
    public function removeTestData($testId) {
        $removeTest="delete from tests where test_id='$testId'";
        $removeAttribute="delete from test_attributes where test_id='$testId'";
        Database::delete($removeTest);
      return Database::delete($removeAttribute);
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
    public function denyTest($patientId,$testId,$date) {
        $update="update opd set approval=0 where patient_id='$patientId' and test_id='$testId' ";
        $removeTempResult="delete from temp_patient_test_result where patient_id='$patientId' and test_id='$testId' and date='$date'";
       
        Database::update($update);
      return  Database::delete($removeTempResult); 
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
    public function getPatientTempTestResult($patientId) {
        $get="select attribute_id,value from temp_patient_test_result where patient_id='$patientId'";
       
        $rs= Database::read($get);
        return $rs->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllTestsWithAttributes() {
        $get="select * from tests";
        $tests=Database::read($get);
        $testsArray=$tests->fetchAll(PDO::FETCH_ASSOC);
        $testCompleteData=array();
        foreach ($testsArray as $test){
           
            $qry="select attribute_name from attributes, test_attributes where attributes.attribute_id=test_attributes.attribute_id and test_attributes.test_id='".$test['test_id']."' ";
            $data=Database::read($qry);
            $data=$data->fetchAll(PDO::FETCH_ASSOC);
            $test["attributes"]=$data;
            array_push($testCompleteData, $test);
        }
        return $testCompleteData;
    }
    public function getPatientsForApproval() {
        $get="select distinct temp_patient_test_result.patient_id,temp_patient_test_result.test_id, temp_patient_test_result.date from temp_patient_test_result";
        return Database::read($get);
    }
        public function getAllTestsWithAttributesById($testId) {
        $get="select * from tests where test_id='$testId'";
        $tests=Database::read($get);
        $testsArray=$tests->fetchAll(PDO::FETCH_ASSOC);
        $testCompleteData=array();
        foreach ($testsArray as $test){
           
            $qry="select attribute_name,attributes.attribute_id from attributes, test_attributes where attributes.attribute_id=test_attributes.attribute_id and test_attributes.test_id='".$test['test_id']."'  ";
            $data=Database::read($qry);
            $data=$data->fetchAll(PDO::FETCH_ASSOC);
            $test["attributes"]=$data;
            array_push($testCompleteData, $test);
        }
        return $testCompleteData;
    }
      public function addTestResult($patientId,$testId,$testData,$pathologistArmyNo) {
      
        $data=json_decode($testData);
        
        for ($index = 0; $index < count($data); $index++) {
             $array = json_decode(json_encode($data[$index]),true);
            $attributeId=$array["attribute_id"];
            $attributeValue=$array["value"];
             $add="insert into patient_test_result values('$patientId','$testId','$attributeId','$attributeValue',date(now()),'$pathologistArmyNo')";
             $result=Database::insert($add);
           
             }
          
             return $result;
    }
    public function removeTempTestResult($patientId,$testId) {
        $remove="delete from temp_patient_test_result where patient_id='$patientId'  and test_id='$testId'";
       return Database::delete($remove);
    }
    public function updateTestCompletedStatus($patientId,$testId) {
        $update="update opd set test_completed=1, approval=NULL where patient_id='$patientId' and test_id='$testId' ";
        return Database::update($update);
    }
    public function addTempTestResult($patientId,$testId,$testData,$pathologistArmyNo) {
      
        $data=json_decode($testData);
        
        for ($index = 0; $index < count($data); $index++) {
             $array = json_decode(json_encode($data[$index]),true);
            $attributeId=$array["attribute_id"];
            $attributeValue=$array["value"];
             $add="insert into temp_patient_test_result(patient_id,test_id,attribute_id,value,date,pathologist_army_no) values('$patientId','$testId','$attributeId','$attributeValue',date(now()),'$pathologistArmyNo')";
            $update="update opd set approval=NULL where patient_id='$patientId' and test_id='$testId'";
            Database::update($update);
             $result=Database::insert($add);
             }
        
             return $result;
    }
    public function countTestApplicants($patientId,$testId) {
        $countQuery="select count(*) as n from temp_patient_test_result where patient_id='$patientId' and test_id='$testId'";
        $result=Database::read($countQuery);
        $data=$result->fetch(PDO::FETCH_ASSOC);
        return $data["n"];
        }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

