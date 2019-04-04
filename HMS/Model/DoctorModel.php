<?php 
require_once 'Database.php';
require_once 'LoginModel.php';
require_once 'DepartmentModel.php';
class DoctorModel{
	private $armyNo;
	private $firstName;
	private $lastName;
	private $gender;
	private $email;
	private $mobileNo;
	private $rank;
	private $dateOfBirth;
                  private $dateOfJoining;
                  public static $department;
                  public static $login;
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

    public static function getDepartment() {
        return self::$department;
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

    public static function setDepartment($department) {
        self::$department = $department;
    }

    
        public function addDoctor() {
        $addDoctorQuery="insert into doctor values ('$this->armyNo','$this->firstName','$this->lastName','$this->mobileNo','$this->gender','$this->email','$this->rank','$this->dateOfJoining','$this->dateOfBirth');";
        $result=Database::insert($addDoctorQuery);
        DoctorModel::$login->addLoginInfo();
        $departmentIdArray=DoctorModel::$department->getDepartmentId();
        //var_dump($departmentIdArray);
        foreach ($departmentIdArray as $departmentId) {
            $addDoctorSpeciality="insert into doctor_speciality values('$this->armyNo','$departmentId');";
            Database::insert($addDoctorSpeciality);
        }
        return $result;
        }
        public function getAllDoctors() {
            $getAllDoctors="select * from doctor";
            $result=Database::read($getAllDoctors);
            return $result;
        }
        public function getDepartmentByDoctor($armyNo) {
            $get="select did from doctor_speciality where army_no=$armyNo";
            return Database::read($get);
        }
        public function removeDoctor() {
            $removeDoctor="delete from doctor where army_no='$this->armyNo'";
            $result=Database::delete($removeDoctor);
            if ($result){
                $removeLoginInfo="delete from login where army_no='$this->armyNo'";
                $result=Database::delete($removeLoginInfo);
            }
            return $result;
        }

        public function saveOPDData($patient_id,$doctor_id,$tests,$comments) {
            foreach ($tests as $test) {
               $save="insert into opd values('$patient_id','$doctor_id','$test','$comments')";
               $result=Database::insert($save);
            }
            return $result;
        }
        
            }


 ?>