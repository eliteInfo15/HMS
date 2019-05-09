<?php
require_once '../Model/PatientModel.php';
require_once '../Model/ArmyPersonRelationModel.php';
require_once '../Model/ReceptionistModel.php';
require_once '../Model/DepartmentModel.php';
require_once '../Model/DoctorModel.php';
class ReceptionistController{
    public function getDoctorsByDepartment() {
        $did=htmlspecialchars($_POST["did"]);
        $doctor=new DoctorModel;
        return $doctor->getDoctorsByDepartment($did);
    }
    public function changeReceptionistPassword() {
       $currentPassword= $_POST["currentPassword"];
        $newPassword= $_POST["newPassword"];
        $receptionistId= $_POST["receptionistId"];
        $reception=new ReceptionistModel();
       return $reception->changePassword($receptionistId,$currentPassword,$newPassword);
    }
      public function getAllDepartments() {
      $department=new DepartmentModel();
      return $department->getAllDepartments();
    }
    public function getAllPatients() {
        $patient=new PatientModel();
        return $patient->getAllPatients();
    }
    public function addPatient() {
        
       $patient=new PatientModel();
       $person=new ArmyPersonRelationModel();
       $receptionist=new ReceptionistModel();
       
       $person->setPersonId($_POST["personId"]);
       $patient->setPerson($person);
       $receptionist->setArmyNo($_POST["receptionistArmyNo"]);
       $patient->setReceptionist($receptionist);
      
       $patient->setTokenNumber(htmlspecialchars($_POST["did"]),htmlspecialchars($_POST["doctorId"]));
       
       $result=$patient->addPatient(htmlspecialchars($_POST["did"]),htmlspecialchars($_POST["doctorId"]));
return $result;
       
    }
    public function getDependents() {
       $army= new ArmyServingPersonModel();
       $army->setArmyNo($_POST["army_no"]);
       $result=$army->getArmyPersonDependents();
       $data=$result->fetchALL(PDO::FETCH_ASSOC);
       echo json_encode($data);
    }
     public function getRelationInfo() {
       $army= new ArmyServingPersonModel();
       $army->setArmyNo($_POST["army_no"]);
       
       $result=$army->getRelationInfo(htmlspecialchars($_POST["person_id"]));
       $data=$result->fetchALL(PDO::FETCH_ASSOC);
       echo json_encode($data);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["addPatient"]))
{
    $r=new ReceptionistController();
$rs=$r->addPatient();
echo $rs;
}
if (isset($_POST["getDependents"])) {
  $r=new ReceptionistController();
$r->getDependents();  
}
if (isset($_POST["getInfo"])) {
  $r=new ReceptionistController();
$r->getRelationInfo();

}
if (isset($_POST["getdoctors"])) {
  $r=new ReceptionistController();
echo json_encode($r->getDoctorsByDepartment());

}
if (isset($_POST["changePassword"])) {
   $reception= new ReceptionistController();
  echo $reception->changeReceptionistPassword();
}