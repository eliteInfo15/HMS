<?php
//
//
//
//
//select opd.patient_id,army_person_relation.relation_fname,army_person_relation.relation_lname,army_person_relation.relation,army_person_relation.army_no,comments,category,opd.opd_date,doctor.doctor_army_no,doctor.dfname,doctor.dlname,doctor.drank, department.dname,patient_test_result.test_id,tests.test_name,patient_test_result.attribute_id,attributes.attribute_name,patient_test_result.value,patient_test_result.date from patient,opd,doctor,department,doctor_speciality,army_person_relation,army_serving_person,patient_medicine_prescription,patient_test_result,tests,attributes,test_attributes WHERE opd.doctor_army_no=doctor.doctor_army_no and doctor.doctor_army_no=doctor_speciality.army_no and department.did=doctor_speciality.did and opd.patient_id=patient.patient_id and patient.person_id=army_person_relation.person_id and army_person_relation.person_id='35' and opd.doctor_army_no='9191' and army_person_relation.army_no=army_serving_person.army_no and patient_medicine_prescription.patient_id=opd.patient_id and tests.test_id=test_attributes.test_id and attributes.attribute_id=test_attributes.attribute_id and patient_test_result.patient_id=patient.patient_id and opd.test_id=patient_test_result.test_id and tests.test_id=patient_test_result.test_id and patient_test_result.attribute_id=test_attributes.attribute_id;
//select opd.patient_id,army_person_relation.relation_fname,army_person_relation.relation_lname,army_person_relation.relation,army_person_relation.army_no,comments,category,opd.opd_date,doctor.doctor_army_no,doctor.dfname,doctor.dlname,doctor.drank, department.dname,patient_test_result.test_id,tests.test_name,patient_test_result.attribute_id,attributes.attribute_name,patient_test_result.value,patient_test_result.date from patient,opd,doctor,department,doctor_speciality,army_person_relation,army_serving_person,patient_medicine_prescription,patient_test_result,tests,attributes,test_attributes WHERE opd.doctor_army_no=doctor.doctor_army_no and doctor.doctor_army_no=doctor_speciality.army_no and department.did=doctor_speciality.did and opd.patient_id=patient.patient_id and patient.person_id=army_person_relation.person_id and army_person_relation.person_id='35' and opd.doctor_army_no='9191' and army_person_relation.army_no=army_serving_person.army_no and patient_medicine_prescription.patient_id=opd.patient_id and tests.test_id=test_attributes.test_id and attributes.attribute_id=test_attributes.attribute_id and patient_test_result.patient_id=patient.patient_id and opd.test_id=patient_test_result.test_id and tests.test_id=patient_test_result.test_id and patient_test_result.attribute_id=test_attributes.attribute_id;

$qry="select opd.patient_id,army_person_relation.relation_fname,army_person_relation.relation_lname,"
        . "army_person_relation.relation,army_person_relation.blood_group,army_person_relation.army_no as "
        . "person_army_no,comments,category,opd.opd_date,patient_medicine_prescription.medicine_id,"
        . "medicines.medicine_name,patient_medicine_prescription.dosage_id,medicine_dosage.dosage,"
        . "patient_medicine_prescription.instruction_id,dosage_instruction.instruction,patient_medicine_prescription.days,"
        . "doctor.doctor_army_no,doctor.dfname,doctor.dlname,doctor.drank, department.dname,patient_test_result.test_id,"
        . "tests.test_name,patient_test_result.attribute_id,attributes.attribute_name,"
        . "patient_test_result.value,patient_test_result.date as test_result_date from patient,opd,doctor,"
        . "department,doctor_speciality,army_person_relation,army_serving_person,medicines,medicine_dosage,"
        . "dosage_instruction,patient_medicine_prescription,patient_test_result,tests,attributes,test_attributes "
        . "WHERE opd.doctor_army_no=doctor.doctor_army_no and doctor.doctor_army_no=doctor_speciality.army_no and "
        . "department.did=doctor_speciality.did and opd.patient_id=patient.patient_id and "
        . "patient.person_id=army_person_relation.person_id and army_person_relation.person_id='$personId' and "
        . "opd.doctor_army_no='$doctorId' and army_person_relation.army_no=army_serving_person.army_no and "
        . "patient_medicine_prescription.patient_id=opd.patient_id and tests.test_id=test_attributes.test_id and "
        . "attributes.attribute_id=test_attributes.attribute_id and patient_test_result.patient_id=patient.patient_id and "
        . "opd.test_id=patient_test_result.test_id and tests.test_id=patient_test_result.test_id and "
        . "patient_test_result.attribute_id=test_attributes.attribute_id and patient_medicine_prescription.patient_id=opd.patient_id"
        . " and patient_medicine_prescription.medicine_id=medicines.medicine_id and "
        . "patient_medicine_prescription.dosage_id=medicine_dosage.dosage_id and "
        . "patient_medicine_prescription.instruction_id=dosage_instruction.instruction_id";
?>