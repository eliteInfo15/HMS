<?php
require_once 'Database.php';
class InstructionModel{
    private $instructionId;
    private $instruction;
    
    public function getInstructionId() {
        return $this->instructionId;
    }

    public function getInstruction() {
        return $this->instruction;
    }

    public function setInstructionId($instructionId) {
        $this->instructionId = $instructionId;
    }

    public function setInstruction($instruction) {
        $this->instruction = $instruction;
    }

        
    public function __construct() {
        Database::connectDb() ;
    }
    public function getAllInstructions() {
        $get="select * from dosage_instruction";
        return Database::read($get);
    }
    public function addInstruction() {
        $addInstruction="insert into dosage_instruction(instruction) values('$this->instruction')";
        return Database::insert($addInstruction);
    }
    public function removeInstruction() {
        $removeInstruction="delete from dosage_instruction where instruction_id='$this->instructionId'";
        return Database::delete($removeInstruction);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

