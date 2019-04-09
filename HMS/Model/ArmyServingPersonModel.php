<?php
require_once 'Database.php';
require_once 'ExcelReader/excel_reader2.php';
require_once 'ExcelReader/SpreadsheetReader.php';
require_once 'ArmyPersonRelationModel.php';
class ArmyServingPersonModel{
                  private $armyNo;
                  private $firstName;
	private $lastName;
	private $rank;
                  private $unit;
	private $email;
	private $gender;
	private $mobileNo;
	private $dateOfBirth;
                  private $dateOfJoining;
                  static $armyPersonRelation;
                  private $bloodGroup;
                  public static function getArmyPersonRelation() {
                      return self::$armyPersonRelation;
                  }

                  public static function setArmyPersonRelation($armyPersonRelation) {
                      self::$armyPersonRelation = $armyPersonRelation;
                  }

                  
                                    public function __construct() {
                      Database::connectDb();
                  }
                  public function getArmyNo() {
                      return $this->armyNo;
                  }

                  public function getFirstName() {
                      return $this->firstName;
                  }

                  public function getLastName() {
                      return $this->lastName;
                  }

                  public function getRank() {
                      return $this->rank;
                  }

                  public function getUnit() {
                      return $this->unit;
                  }

                  public function getEmail() {
                      return $this->email;
                  }

                  public function getGender() {
                      return $this->gender;
                  }

                  public function getMobileNo() {
                      return $this->mobileNo;
                  }

                  public function getDateOfBirth() {
                      return $this->dateOfBirth;
                  }

                  public function getDateOfJoining() {
                      return $this->dateOfJoining;
                  }

                  public function setArmyNo($armyNo) {
                      $this->armyNo = $armyNo;
                  }

                  public function setFirstName($firstName) {
                      $this->firstName = $firstName;
                  }

                  public function setLastName($lastName) {
                      $this->lastName = $lastName;
                  }

                  public function setRank($rank) {
                      $this->rank = $rank;
                  }

                  public function setUnit($unit) {
                      $this->unit = $unit;
                  }

                  public function setEmail($email) {
                      $this->email = $email;
                  }

                  public function setGender($gender) {
                      $this->gender = $gender;
                  }

                  public function setMobileNo($mobileNo) {
                      $this->mobileNo = $mobileNo;
                  }

                  public function setDateOfBirth($dateOfBirth) {
                      $this->dateOfBirth = $dateOfBirth;
                  }

                  public function setDateOfJoining($dateOfJoining) {
                      $this->dateOfJoining = $dateOfJoining;
                  }

                  public function addArmyPerson() {
                    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                
                if(isset($Row[0])) {
                    
                    $this->armyNo = $Row[0];
                   
                }
                
               
                if(isset($Row[1])) {
                    $this->firstName= $Row[1];
                }
               
                if(isset($Row[2])) {
                    $this->lastName =$Row[2];
                }
            
                if(isset($Row[3])) {
                    $this->rank = $Row[3];
                }
                
                if(isset($Row[4])) {
                    $this->unit = $Row[4];
                }
                
                if(isset($Row[5])) {
                    $this->email = $Row[5];
                }
                
                if(isset($Row[6])) {
                    $this->gender=$Row[6];
                }
               
                if(isset($Row[7])) {
                    $this->mobileNo =$Row[7];
                }
                
                if(isset($Row[8])) {
                    $this->dateOfBirth= $Row[8];
                   
                }
              
                if(isset($Row[9])) {
                    $this->dateOfJoining = $Row[9];
                    
                }
                if(isset($Row[10])) {
                    $this->bloodGroup=$Row[10];
                    
                }
              $query = "insert into army_serving_person values('$this->armyNo','$this->firstName','$this->lastName','$this->rank','$this->unit','$this->email','$this->gender','$this->mobileNo','$this->dateOfBirth','$this->dateOfJoining','$this->bloodGroup')";
              echo $query;  
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
                     
  $armyPersonRelation=new ArmyPersonRelationModel();
  ArmyServingPersonModel::setArmyPersonRelation($armyPersonRelation);

 
  $result=ArmyServingPersonModel::$armyPersonRelation->addArmyPersonRelation();
  
                      return $result;
                   }
                   
                   public function getArmyPersonDependents() {
                       $get="select * from army_serving_person,army_person_relation where army_serving_person.army_no=army_person_relation.army_no and army_serving_person.army_no='$this->armyNo'";
                       $result=Database::read($get);
                       return $result;
                   }       
                   public function getRelationInfo($person_id) {
                       $get="select * from army_serving_person,army_person_relation where army_serving_person.army_no=army_person_relation.army_no and army_serving_person.army_no='$this->armyNo' and person_id='$person_id'";
                       $result=Database::read($get);
                       return $result;
                   }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

