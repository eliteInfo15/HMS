<?php
require_once 'Database.php';
require_once 'LoginModel.php';
class PathologistModel{
    	private $armyNo;
	private $firstName;
	private $lastName;
	private $gender;
	private $email;
	private $mobileNo;
	private $rank;
	private $dateOfBirth;
                  private $dateOfJoining;
                  private $pathologistRole;
                  public static $login;
                  
                  public function getPathologistRole() {
                      return $this->pathologistRole;
                  }

                  public function setPathologistRole($pathologistRole) {
                      $this->pathologistRole = $pathologistRole;
                  }

                      public function __construct()
    {
        Database::connectDb();	
    }
    public static function getLogin() {
        return self::$login;
    }

    public static function setLogin($login) {
        self::$login = $login;
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



    public function getGender() {
        return $this->gender;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMobileNo() {
        return $this->mobileNo;
    }

    public function getRank() {
        return $this->rank;
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



    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMobileNo($mobileNo) {
        $this->mobileNo = $mobileNo;
    }

    public function setRank($rank) {
        $this->rank = $rank;
    }

    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function setDateOfJoining($dateOfJoining) {
        $this->dateOfJoining = $dateOfJoining;
    }

    public function addPathologist() {
        $addPathologist="insert into pathologist values ('$this->armyNo','$this->firstName','$this->lastName','$this->mobileNo','$this->gender','$this->email','$this->rank','$this->dateOfJoining','$this->dateOfBirth','$this->pathologistRole');";
        $result=Database::insert($addPathologist);
        $result= PathologistModel::$login->addLoginInfo();
        return $result;
        }
        public function getPathologistRoleByArmyNo($armyNo) {
            $get="select role from pathologist where army_no='$armyNo'";
            return Database::read($get);
        }
        public function getAllPathologists() {
          $getAllPathologists="select * from pathologist";
         $result= Database::read($getAllPathologists);
         return $result;
        }
         public function removePathologist() {
            $removePathologist="delete from pathologist where army_no='$this->armyNo'";
            $result=Database::delete($removePathologist);
            if ($result){
                $removeLoginInfo="delete from login where army_no='$this->armyNo'";
                $result=Database::delete($removeLoginInfo);
            }
            return $result;
        }
        
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

