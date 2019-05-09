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

    
        public function addDoctor($previousDoctor,$previousDoctorRank) {
        $addDoctorQuery="insert into doctor values ('$this->armyNo','$this->firstName','$this->lastName','$this->mobileNo','$this->gender','$this->email','$this->rank','$this->dateOfJoining','$this->dateOfBirth','$previousDoctor','$previousDoctorRank');";
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
        public function getDoctorsByDepartment($did) {
            $get="select doctor.doctor_army_no,dfname,dlname,drank from doctor,doctor_speciality where doctor.doctor_army_no=doctor_speciality.army_no and doctor_speciality.did='$did'";
            $rs= Database::read($get);
             return $rs->fetchAll(PDO::FETCH_ASSOC);   
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

        public function saveOPDData($patient_id,$doctor_id,$tests,$comments,$category,$status) {
            $currentDate=date('Y-m-d');
            if (count($tests)>0) {
              foreach ($tests as $test) {
               $save="insert into opd(patient_id,doctor_army_no,test_id,comments,category,test_completed,opd_date) values('$patient_id','$doctor_id','$test','$comments','$category','$status','$currentDate')";
               $result=Database::insert($save);
               
            }  
           
            }
            else{
                $save="insert into opd(patient_id,doctor_army_no,comments,category,opd_date) values('$patient_id','$doctor_id','$comments','$category',' $currentDate')";
               $result=Database::insert($save);
            }
             $update="update patient set consulted=1 where patient_id='$patient_id' ";
             echo $update;
            Database::update($update);
            return $result;
        }
        
        public function prescribeMedicine($patientId,$medicineId,$dosageId,$instructionId,$days,$doctorId) {
            $prescribeMedicineQuery="insert into patient_medicine_prescription values('$patientId','$medicineId','$dosageId','$instructionId','$doctorId','$days')";
            return Database::insert($prescribeMedicineQuery);
            } 
            
            public function changePassword($doctorId,$currentPassword,$newPassword) {
               $matchCurrentPassword="select password from login where role='doctor' and army_no='$doctorId'";
              $result= Database::read($matchCurrentPassword);
               if ($data=$result->fetch(PDO::FETCH_ASSOC)) 
               {
              if (password_verify($currentPassword,$data['password']))
              {
                  $passwordHash=password_hash($newPassword,PASSWORD_BCRYPT);
                  $changePassword="update login set password='$passwordHash' where army_no='$doctorId' ";
                  Database::update($changePassword);
                  return 1;
              }
              else{
                  return 0;
              }
              }
           else{
               return 0;
           }
            }
            }


 ?>