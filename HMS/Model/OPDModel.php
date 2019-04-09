<?php
require_once 'Database.php';
class OPDModel{
    public function __construct() {
        Database::connectDb();
    }
    public function getTestPatients() {
        $get="select * from opd,army_person_relation,doctor,tests,patient,army_serving_person where test_completed=0 and army_serving_person.army_no=army_person_relation.army_no and opd.test_id is not null and opd.patient_id=patient.patient_id and opd.test_id=tests.test_id and opd.doctor_army_no=doctor.army_no and patient.person_id=army_person_relation.person_id";
        return Database::read($get);
    }
    public function getTestPatientsById($patientId,$testId) {
        $get="select * from opd,army_person_relation,doctor,tests,patient,army_serving_person where patient.patient_id='$patientId' and opd.test_id='$testId' and army_serving_person.army_no=army_person_relation.army_no and opd.test_id is not null and opd.patient_id=patient.patient_id and opd.test_id=tests.test_id and opd.doctor_army_no=doctor.army_no and patient.person_id=army_person_relation.person_id";
        return Database::read($get);
    }
    public function getPatientBloodGroup($personId) {
        $get="select blood_group from army_person_relation where person_id='$personId'";
        $result=Database::read($get);
        $data=$result->fetch(PDO::FETCH_ASSOC);
        return $data["blood_group"];
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

