<?php
require_once 'Database.php';
require_once 'ReceptionistModel.php';
require_once 'ArmyPersonRelationModel.php';
class PatientModel{
    private $token;
    private $patientId;
    private $date;
    static $receptionist;
    static $person;
    public static function getPerson() {
        return self::$person;
    }

    public static function setPerson($person) {
        self::$person = $person;
    }

        public static function getReceptionist() {
        return self::$receptionist;
    }

    public static function setReceptionist($receptionist) {
        self::$receptionist = $receptionist;
    }

        public function __construct() {
        Database::connectDb();
    }
    public function getToken() {
        return $this->token;
    }

    public function getPatientId() {
        return $this->patientId;
    }

    public function getDate() {
        return $this->date;
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function setPatientId($patientId) {
        $this->patientId = $patientId;
    }

    public function setDate($date) {
        $this->date = $date;
    }

        public function addPatient($did,$doctorId) {
            $personId= PatientModel::$person->getPersonId();
            $receptionistAmryNo=PatientModel::$receptionist->getArmyNo();
            $currentDate=date('Y-m-d');
       $addPatient="insert into patient(token,date,person_id,receptionist_army_no,did,doctor_army_no) values('$this->token','$currentDate','$personId','$receptionistAmryNo','$did','$doctorId')";
       //echo $addPatient;
       $result= Database::insert($addPatient);
       return $this->token;
    }
    public function getPatientsByDepartment($didArray,$doctorArmyNo) {
    $ids= implode("', '", $didArray);
        $get="select * from patient,department,army_person_relation ,army_serving_person where patient.did=department.did and patient.did in ('$ids') and army_person_relation.person_id=patient.person_id and army_person_relation.army_no=army_serving_person.army_no and patient.date=date(now()) and patient.doctor_army_no='$doctorArmyNo'";
        $result=Database::read($get);
        return $result;
    }
    public function getRecommendedTests($personId,$doctorId,$date) {
        $testSuggested="select test_id,test_completed from opd,patient where patient.person_id='$personId' and opd.patient_id=patient.patient_id and opd.doctor_army_no='$doctorId' and opd_date='$date'";
        return Database::read($testSuggested);
    }
    public function getAllPatientHistoryByDoctor($personId,$doctorId) {
         
         $getHistory="select opd.patient_id,army_person_relation.relation_fname,army_person_relation.relation_gender,"
        . "army_person_relation.relation_date_of_birth,army_person_relation.relation_lname,"
        . "army_person_relation.relation,army_person_relation.blood_group,army_person_relation.army_no as "
        . "person_army_no,comments,category,opd.opd_date,patient_medicine_prescription.medicine_id,"
        . "medicines.medicine_name,patient_medicine_prescription.dosage_id,medicine_dosage.dosage,"
        . "patient_medicine_prescription.instruction_id,dosage_instruction.instruction,patient_medicine_prescription.days,"
        . "doctor.doctor_army_no,doctor.dfname,doctor.dlname,doctor.drank, department.dname from patient,opd,doctor,"
        . "department,doctor_speciality,army_person_relation,army_serving_person,medicines,medicine_dosage,"
        . "dosage_instruction,patient_medicine_prescription "
        . "WHERE opd.doctor_army_no=doctor.doctor_army_no and doctor.doctor_army_no=doctor_speciality.army_no and "
        . "department.did=doctor_speciality.did and opd.patient_id=patient.patient_id and "
        . "patient.person_id=army_person_relation.person_id and army_person_relation.person_id='$personId' and "
        . "opd.doctor_army_no='$doctorId' and army_person_relation.army_no=army_serving_person.army_no and "
        . "patient_medicine_prescription.patient_id=opd.patient_id and patient_medicine_prescription.patient_id=opd.patient_id"
        . " and patient_medicine_prescription.medicine_id=medicines.medicine_id and "
        . "patient_medicine_prescription.dosage_id=medicine_dosage.dosage_id and "
        . "patient_medicine_prescription.instruction_id=dosage_instruction.instruction_id";
        $result=Database::read($getHistory);
        return $result;
    }
    public function getPatientReportByDepartment($did) {
       $getPatientsReg="select count(*) as countTotal,dname from patient,department where date=date(now()) and patient.did='$did' and patient.did=department.did";
       $res1=Database::read($getPatientsReg);
       $res1=$res1->fetchAll(PDO::FETCH_ASSOC);
       $getPatientsConsulted="select count(*) as countConsulted,dname from patient,department where date=date(now()) and consulted=1 and patient.did='$did' and patient.did=department.did";
       $res2=Database::read($getPatientsConsulted);
       $res2=$res2->fetchAll(PDO::FETCH_ASSOC);
       $result=array($res1,$res2);
       return $result;
    }
     public function getPatientTestResult($personId,$doctorId,$date,$testIdArray) {
        
       $ids= implode("', '", $testIdArray);
         $get="select tests.test_name,attributes.attribute_name,patient_test_result.value,patient_test_result.date "
                . "from tests,attributes,"
                . "test_attributes,patient_test_result,opd,patient where  patient.person_id='$personId' and "
                . "opd.patient_id=patient.patient_id and opd.doctor_army_no='$doctorId' and opd_date='$date' and "
                . "patient_test_result.patient_id=patient.patient_id and tests.test_id=patient_test_result.test_id and "
                . "attributes.attribute_id=patient_test_result.attribute_id and tests.test_id=test_attributes.test_id and"
                . " attributes.attribute_id=test_attributes.attribute_id and opd.test_id=patient_test_result.test_id and"
                . " opd.test_id=tests.test_id and patient_test_result.test_id in ('$ids')";
       return Database::read($get);
    }
    public function getNameByTestId($pendingTestIdArray){
         $ids= implode("', '", $pendingTestIdArray);
         $get="select test_name from tests where test_id in('$ids')";
         return Database::read($get);
    }
public function getAllPatientsAnalysis() {
       $getPatientsReg="select count(*) as countTotal from patient where date=date(now())";
       $res1=Database::read($getPatientsReg);
       $res1=$res1->fetchAll(PDO::FETCH_ASSOC);
       $getPatientsConsulted="select count(*) as countConsulted from patient where date=date(now()) and consulted=1";
       $res2=Database::read($getPatientsConsulted);
       $res2=$res2->fetchAll(PDO::FETCH_ASSOC);
       $res=array($res1,$res2);
       return $res;
    }
    public function getNumberPatientsAnalysis($doctorId) {
       $getPatientsReg="select count(*) as countTotal from patient where doctor_army_no='$doctorId' and date=date(now())";
       $res1=Database::read($getPatientsReg);
       $res1=$res1->fetchAll(PDO::FETCH_ASSOC);
       $getPatientsConsulted="select count(*) as countConsulted from patient where doctor_army_no='$doctorId' and date=date(now()) and consulted=1";
       $res2=Database::read($getPatientsConsulted);
       $res2=$res2->fetchAll(PDO::FETCH_ASSOC);
       $res=array($res1,$res2);
       return $res;
    }
    public function getAllPatients() {
            $get="select * from patient,army_person_relation,department,doctor where doctor.doctor_army_no=patient.doctor_army_no and patient.person_id=army_person_relation.person_id and date=date(now()) and patient.did=department.did";
            return Database::read($get);
            }
    public function setTokenNumber($did,$doctorId) {
        $numPatientsQuery="select count(*) as n from patient";
        $result=Database::read($numPatientsQuery);
       $result= $result->fetch(PDO::FETCH_ASSOC);
       $numPatients=$result["n"];
       if ($numPatients==0) {
           $this->setToken(1);
       }
       else{
           $getLastToken="select max(token) as last_token from patient where date=date(now()) and did='$did' and  doctor_army_no='$doctorId'";
           $result=Database::read($getLastToken);
           if ($result)
           {
               $result= $result->fetch(PDO::FETCH_ASSOC);
               $lastToken=$result["last_token"];
               $lastToken++;
               $this->setToken($lastToken);
           }
           else{
               $this->setToken(1);
           }
       }
    }
    public function getDepartmentWiseNumberOfPatients() {
        $get="SELECT count(*) as n,dname FROM patient,department where patient.did=department.did and month(patient.date)=month(date(now())) group BY patient.did";
        $result=Database::read($get);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
     public function getDepartmentWiseNumberOfPatientsByMonth($month) {
        $get="SELECT count(*) as n,dname FROM patient,department where patient.did=department.did and month(patient.date)='$month' group BY patient.did";
        $result=Database::read($get);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

