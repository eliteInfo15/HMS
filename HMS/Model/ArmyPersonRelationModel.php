<?php
require_once 'Database.php';
require_once 'ArmyServingPersonModel.php';

class ArmyPersonRelationModel{
    private $armyNo;
private $personId;
private $firstName;
private $lastName;
private $dateOfBirth;
private $relation;
private $gender;
static $armyPerson;
public function getArmyNo() {
    return $this->armyNo;
}

public function setArmyNo($armyNo) {
    $this->armyNo = $armyNo;
}


public function getPersonId() {
    return $this->personId;
}

public function getFirstName() {
    return $this->firstName;
}

public function getLastName() {
    return $this->lastName;
}

public function getDateOfBirth() {
    return $this->dateOfBirth;
}

public function getRelation() {
    return $this->relation;
}

public function getGender() {
    return $this->gender;
}

public static function getArmyPerson() {
    return self::$armyPerson;
}

public function setPersonId($personId) {
    $this->personId = $personId;
}

public function setFirstName($firstName) {
    $this->firstName = $firstName;
}

public function setLastName($lastName) {
    $this->lastName = $lastName;
}

public function setDateOfBirth($dateOfBirth) {
    $this->dateOfBirth = $dateOfBirth;
}

public function setRelation($relation) {
    $this->relation = $relation;
}

public function setGender($gender) {
    $this->gender = $gender;
}

public static function setArmyPerson($armyPerson) {
    self::$armyPerson = $armyPerson;
}

  public function addArmyPersonRelation() {
                               $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["relationfile"]["type"],$allowedFileType)){

        $targetPath = $_FILES['relationfile']['name'];
        move_uploaded_file($_FILES['relationfile']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                
                if(isset($Row[0])) {
                    
                    $this->setArmyNo($Row[0]);
                   
                }
                
              
                if(isset($Row[1])) {
                    $this->setRelation($Row[1]);
                }
                
                if(isset($Row[2])) {
                    $this->setFirstName($Row[2]);
                }
               
                if(isset($Row[3])) {
                    $this->setLastName($Row[3]);
                }
                 
                if(isset($Row[4])) {
                    $this->setDateOfBirth($Row[4]);
                }
                if(isset($Row[5])) {
                    $this->setGender($Row[5]);
                }
                
               
               
              $query = "insert into army_person_relation(army_no,relation,relation_fname,relation_lname,relation_date_of_birth,relation_gender) values('$this->armyNo','$this->relation','$this->firstName','$this->lastName','$this->dateOfBirth','$this->gender')";
                  
                    $result = Database::insert($query);
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
                        
                      return $result;
                   }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

