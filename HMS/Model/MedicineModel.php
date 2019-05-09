<?php
require_once 'Database.php';
class MedicineModel{
    private $medicineId;
    private $medicineName;
    
    public function getMedicineId() {
        return $this->medicineId;
    }

    public function getMedicineName() {
        return $this->medicineName;
    }

    public function setMedicineId($medicineId) {
        $this->medicineId = $medicineId;
    }

    public function setMedicineName($medicineName) {
        $this->medicineName = $medicineName;
    }

    public function __construct() {
        Database::connectDb() ;
    }
    public function getAllMedicines() {
        $get="select * from medicines";
        return Database::read($get);
    }
    public function addMedicine() {
        $addMedicine="insert into medicines(medicine_name) values('$this->medicineName')";
        return Database::insert($addMedicine);
    }
    public function removeMedicine() {
        $removeMedicine="delete from medicines where medicine_id='$this->medicineId'";
        return Database::delete($removeMedicine);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

