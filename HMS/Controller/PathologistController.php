<?php
require_once '../Model/OPDModel.php';
require_once '../Model/TestModel.php';
require_once '../Model/PathologistModel.php';
class PathologistController{
    public function getPatientsForTest() {
      $opd=  new OPDModel();
      return $opd->getTestPatients();
    }
    public function getPatientsForTestById($patientId,$testId) {
      $opd=  new OPDModel();
      return $opd->getTestPatientsById($patientId,$testId);
    }
    public function getPathologistRole($armyNo) {
         $pathologist=new PathologistModel();
                                         $pathologistData=$pathologist->getPathologistRoleByArmyNo($armyNo);
                                         $pathologistData=$pathologistData->fetch(PDO::FETCH_ASSOC);
                                         $pathologistRole=$pathologistData["role"];
                                        // var_dump($pathologistRole);
                                         return $pathologistRole;
    }
    public function getPatientsForApproval() {
         $test=new TestModel();
        return $test->getPatientsforApproval();
    }
    public function getPatientBloodGroup($personId) {
      $opd=  new OPDModel();
      return $opd->getPatientBloodGroup($personId);
    }
    public function getTestById($testId) {
        $test=new TestModel();
        return $test->getAllTestsWithAttributesById($testId);
    }
    public function getPatientTempTestResult() {
        $patientId=htmlspecialchars($_POST["patientId"]);
        $test=new TestModel();
        return $test->getPatientTempTestResult($patientId);
    }
    public function addTempResult() {
        $test=new TestModel();
        $patientId=htmlspecialchars($_POST["patient_id"]);
         $testId=htmlspecialchars($_POST["test_id"]);
         $pathologistArmyNo=htmlspecialchars($_POST["pathologistArmyNo"]);
        $testJson= $_POST["testResultJson"];
       // $testData=json_decode($testJson);
       $testData = json_decode(json_encode($testJson),true);
       return $test->addTempTestResult($patientId, $testId, $testData, $pathologistArmyNo);
    }
    public function denyTestResult() {
        $test=new TestModel();
       $patientId= htmlspecialchars($_POST["patient_id"]);
       $testId= htmlspecialchars($_POST["test_id"]);
      $testDate= htmlspecialchars($_POST["test_date"]);
      return $test->denyTest($patientId,$testId,$testDate);
    }
     public function addTestResult() {
        $test=new TestModel();
        $patientId=htmlspecialchars($_POST["patient_id"]);
         $testId=htmlspecialchars($_POST["test_id"]);
         $pathologistArmyNo=htmlspecialchars($_POST["pathologistArmyNo"]);
        $testJson= $_POST["testResultJson"];
       // $testData=json_decode($testJson);
       $testData = json_decode(json_encode($testJson),true);
       $rs=$test->addTestResult($patientId, $testId, $testData, $pathologistArmyNo);
       $rs=$test->removeTempTestResult($patientId, $testId);
       $test->updateTestCompletedStatus($patientId,$testId);
       return $rs;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST["addTempResult"])) {
   $p= new PathologistController();
   $r=$p->addTempResult();
   print_r($r);
}
if (isset($_POST["addTestResult"])) {
   $p= new PathologistController();
   $r=$p->addTestResult();
   print_r($r);
}
if (isset($_POST["getTempResult"])) {
   $p= new PathologistController();
   $r=$p->getPatientTempTestResult();
  echo json_encode($r);
}
if (isset($_POST["denyTest"])) {
   $p= new PathologistController();
   $r=$p->denyTestResult();
  echo $r;
}