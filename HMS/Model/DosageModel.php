<?php
require_once 'Database.php';
class DosageModel{
    private $dosageId;
    private $dosage;
    
    public function getDosageId() {
        return $this->dosageId;
    }

    public function getDosage() {
        return $this->dosage;
    }

    public function setDosageId($dosageId) {
        $this->dosageId = $dosageId;
    }

    public function setDosage($dosage) {
        $this->dosage = $dosage;
    }

        public function __construct() {
        Database::connectDb() ;
    }
    public function getAllDosage() {
        $get="select * from medicine_dosage";
        return Database::read($get);
    }
    public function addDosage() {
        $addDosage="insert into medicine_dosage(dosage) values('$this->dosage')";
        return Database::insert($addDosage);
    }
    public function removeDosage() {
        $removeDosage="delete from medicine_dosage where dosage_id='$this->dosageId'";
        return Database::delete($removeDosage);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

