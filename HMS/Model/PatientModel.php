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

        public function addPatient($did) {
            $personId= PatientModel::$person->getPersonId();
            $receptionistAmryNo=PatientModel::$receptionist->getArmyNo();
            $currentDate=date('Y-m-d');
       $addPatient="insert into patient(token,date,person_id,receptionist_army_no,did) values('$this->token','$currentDate','$personId','$receptionistAmryNo','$did')";
       //echo $addPatient;
       $result= Database::insert($addPatient);
       return $this->token;
    }
    public function getPatientsByDepartment($didArray) {
    $ids= implode("', '", $didArray);
        $get="select * from patient,department,army_person_relation ,army_serving_person where patient.did=department.did and patient.did in ('$ids') and army_person_relation.person_id=patient.person_id and army_person_relation.army_no=army_serving_person.army_no and patient.date=date(now())";
        $result=Database::read($get);
        return $result;
    }
    public function getAllPatients() {
            $get="select * from patient,army_person_relation,department where patient.person_id=army_person_relation.person_id and date=date(now()) and patient.did=department.did";
            return Database::read($get);
            }
    public function setTokenNumber($did) {
        $numPatientsQuery="select count(*) as n from patient";
        $result=Database::read($numPatientsQuery);
       $result= $result->fetch(PDO::FETCH_ASSOC);
       $numPatients=$result["n"];
       if ($numPatients==0) {
           $this->setToken(1);
       }
       else{
           $getLastToken="select max(token) as last_token from patient where date=date(now()) and did='$did'";
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
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

