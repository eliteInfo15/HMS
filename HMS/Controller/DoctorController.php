<?php
require_once '../Model/PatientModel.php';
require_once '../Model/DoctorModel.php';
require_once '../Model/TestModel.php';
class DoctorController{
    public function getPatientsByDepartment($didArray) {
       $patient=new PatientModel();
       return $patient->getPatientsByDepartment($didArray);
       
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
        $test_string=$_POST["test"];
        var_dump($comments);
         $test_array=explode(',', $test_string);
         
         return $doctor->saveOPDData($patient_id, $doctorArmyNo, $test_array, $comments);
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