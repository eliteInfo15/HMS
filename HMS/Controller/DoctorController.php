<?php
require_once '../Model/PatientModel.php';
require_once '../Model/DoctorModel.php';
require_once '../Model/TestModel.php';
require_once '../Model/OPDModel.php';
class DoctorController{
    public function getNumberOfPatientsAnalysis($doctorId) {
        $patient=new PatientModel();
       return $patient->getNumberPatientsAnalysis($doctorId);
    }
    public function getNameByTestId($pendingTestIdArray){
         $patient=new PatientModel();
       $rs=$patient->getNameByTestId($pendingTestIdArray);
       return $rs->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRecommendedTests($personId,$doctorId,$date) {
        $patient=new PatientModel();
        $recommendedTests = $patient->getRecommendedTests($personId, $doctorId, $date);
        return $recommendedTests;
    }
    public function getPatientTestResult($personId,$doctorId,$date,$testIdArray) {
       $patient= new PatientModel();
     return  $patient->getPatientTestResult($personId, $doctorId, $date, $testIdArray);
    }
    public function prescribeMedicine() {
     $doctor=new DoctorModel();
     $patientId=htmlspecialchars($_POST["patientId"]);
       $medicineId=htmlspecialchars($_POST["medicineId"]);
         $dosageId=htmlspecialchars($_POST["dosageId"]);
           $instructionId=htmlspecialchars($_POST["instructionId"]);
             $doctorId=htmlspecialchars($_POST["doctorId"]);
               $days=htmlspecialchars($_POST["days"]);
    return $doctor->prescribeMedicine($patientId, $medicineId, $dosageId, $instructionId, $days, $doctorId);
    }
    public function getPatientsByDepartment($didArray,$doctorArmyNo) {
       $patient=new PatientModel();
       return $patient->getPatientsByDepartment($didArray,$doctorArmyNo);
       
    }
     public function getAllPatientsByDepartment($didArray,$doctorArmyNo) {
       $patient=new PatientModel();
       return $patient->getAllPatientsByDepartment($didArray,$doctorArmyNo);
       
    }
    public function getDepartmentByDoctor($armyNo) {
        $doctor=new DoctorModel();
       return $doctor->getDepartmentByDoctor($armyNo);
    }
    public function getAllTests() {
      $test=  new TestModel();
      return $test->getAllTests();
    }
    public function addOPDData() {
        $doctor=new DoctorModel();
        $patient_id=htmlspecialchars($_POST["patient_id"]);
        $doctorArmyNo=htmlspecialchars($_POST["doctorArmyNo"]);
        $comments=htmlspecialchars($_POST["comments"]);
        $category=htmlspecialchars($_POST["category"]);
        $medicine=htmlspecialchars($_POST["medicine"]);
        $status=0;
        $test_array=array();
        if (isset($_POST["test"])) {
           $test_string=$_POST["test"];
       
         $test_array=explode(',', $test_string);  
        }
       
         
         return $doctor->saveOPDData($patient_id, $doctorArmyNo, $test_array, $comments,$category,$status,$medicine);
    }
    public function getPatientHistoryByDoctor($personId,$doctorId) {
        $patient=new PatientModel();
       return $patient->getAllPatientHistoryByDoctor($personId, $doctorId);
    }
    public function getAllConsultedPatientsByDoctor($doctorId) {
        $opd=new OPDModel();
      return  $opd->getAllConsultedPatientsByDoctor($doctorId);
    }
     public function getAllConsultedPatients() {
        $opd=new OPDModel();
      return  $opd->getAllConsultedPatients();
    }
    public function getAllTestedPatients() {
        $opd=new OPDModel();
      return  $opd->getAllTestedPatients();
    }
    public function changeDoctorPassword() {
       $currentPassword= $_POST["currentPassword"];
        $newPassword= $_POST["newPassword"];
        $doctorId= $_POST["doctorId"];
        $doctor=new DoctorModel();
       return $doctor->changePassword($doctorId,$currentPassword,$newPassword);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["saveOPD"])) {
   $doctor= new DoctorController();
  echo $doctor->addOPDData();
}
if (isset($_POST["prescribeMedicine"])) {
   $doctor= new DoctorController();
  echo $doctor->prescribeMedicine();
}
if (isset($_POST["changePassword"])) {
   $doctor= new DoctorController();
  echo $doctor->changeDoctorPassword();
}
