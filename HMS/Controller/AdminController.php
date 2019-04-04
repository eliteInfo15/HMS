<?php
require_once '../Model/DoctorModel.php';
require_once '../Model/LoginModel.php';
require_once '../Model/DepartmentModel.php';
require_once '../Model/ReceptionistModel.php';
require_once '../Model/ArmyServingPersonModel.php';
require_once '../Model/PathologistModel.php';
require_once '../Model/TestModel.php';
class AdminController{
    public function addDepertment() {
        $department=new DepartmentModel();
        $department->setDepartmentName("eye");
        $department->setDepartmentEstablishedYear("2008");
        $result=$department->addDepartment();
        return $result;
    }
   
    public function addReceptionist() {
         $receptionist=new ReceptionistModel();
         $login=new LoginModel;
         
         $login->setArmyNumber(htmlspecialchars($_POST["army_no"]));
         $login->setPassword(htmlspecialchars($_POST["password"]));
         $login->setRole(htmlspecialchars($_POST["role"]));
         
         $receptionist->setLogin($login);
        
         $receptionist->setArmyNo(htmlspecialchars($_POST["army_no"]));
         $receptionist->setFirstName(htmlspecialchars($_POST["firstName"]));
         $receptionist->setLastName(htmlspecialchars($_POST["lastName"]));
         $receptionist->setDateOfBirth($_POST["dob"]);
         $receptionist->setDateOfJoining($_POST["doj"]);
         $receptionist->setRank(htmlspecialchars($_POST["rank"]));
         $receptionist->setEmail(htmlspecialchars($_POST["email"]));
         $receptionist->setGender(htmlspecialchars($_POST["gender"]));
         $receptionist->setMobileNo(htmlspecialchars($_POST["mobile"]));
        
         $result=$receptionist->addReceptionist();
         return $result;
    }
    public function addPathologist() {
    $pathologist=new PathologistModel();
         $login=new LoginModel;
         
         $login->setArmyNumber(htmlspecialchars($_POST["army_no"]));
         $login->setPassword(htmlspecialchars($_POST["password"]));
         $login->setRole(htmlspecialchars($_POST["role"]));
         
         $pathologist->setLogin($login);
        
         $pathologist->setArmyNo(htmlspecialchars($_POST["army_no"]));
         $pathologist->setFirstName(htmlspecialchars($_POST["firstName"]));
         $pathologist->setLastName(htmlspecialchars($_POST["lastName"]));
         $pathologist->setDateOfBirth($_POST["dob"]);
         $pathologist->setDateOfJoining($_POST["doj"]);
         $pathologist->setRank(htmlspecialchars($_POST["rank"]));
         $pathologist->setEmail(htmlspecialchars($_POST["email"]));
         $pathologist->setGender(htmlspecialchars($_POST["gender"]));
         $pathologist->setMobileNo(htmlspecialchars($_POST["mobile"]));
        
         $result=$pathologist->addPathologist();
         return $result;
    }
    public function getAllDoctors() {
       $doctor=new DoctorModel;
       $result=$doctor->getAllDoctors();
       return $result;
    }
    public function addDoctor() {
         $doctor=new DoctorModel;
         $login=new LoginModel;
         
         $login->setArmyNumber(htmlspecialchars($_POST["army_no"]));
         $login->setPassword(htmlspecialchars($_POST["password"]));
         $login->setRole(htmlspecialchars($_POST["role"]));
         
         $department=new DepartmentModel;
         $department_string=$_POST["did"];
         $department_array=explode(',', $department_string);
         $department->setDepartmentId($department_array);
         $doctor->setLogin($login);
         $doctor->setDepartment($department);
         $doctor->setArmyNo(htmlspecialchars($_POST["army_no"]));
         $doctor->setFirstName(htmlspecialchars($_POST["firstName"]));
         $doctor->setLastName(htmlspecialchars($_POST["lastName"]));
         $doctor->setDateOfBirth($_POST["dob"]);
         $doctor->setDateOfJoining($_POST["doj"]);
         $doctor->setRank(htmlspecialchars($_POST["rank"]));
         $doctor->setEmail(htmlspecialchars($_POST["email"]));
         $doctor->setGender(htmlspecialchars($_POST["gender"]));
         $doctor->setMobileNo(htmlspecialchars($_POST["mobile"]));
        
         $result=$doctor->addDoctor();
         return $result;
    }
    public function addArmyPerson() {
      $armyPerson=  new ArmyServingPersonModel();
      $result=$armyPerson->addArmyPerson();
    
     return $result;
    }
    public function addDepartment() {
        $department=new DepartmentModel();
        $department->setDepartmentName(htmlspecialchars($_POST["dname"]));
        $department->setDepartmentEstablishedYear(htmlspecialchars($_POST["year"]));
      return $department->addDepartment();
    }
    public function addTest() {
     $test=new TestModel(); 
     $test->setTestName(htmlspecialchars($_POST["tname"]));
     $num=htmlspecialchars($_POST["num"]);
     $attributesArray=array();
     for ($i = 1; $i <=$num; $i++) {
         array_push($attributesArray, $_POST["attribute".$i]);   
     }
     return $test->addTest($attributesArray);
    
     }
    public function getAllDepartments() {
      $department=new DepartmentModel();
      return $department->getAllDepartments();
    }
    public function getAllReceptionists() {
      $receptionist=new ReceptionistModel();
      return $receptionist->getAllReceptionists();
    }
     public function getAllPathologists() {
     $pathologist=new PathologistModel();
     return $pathologist->getAllPathologists();
    }
    public function removeDoctor() {
     $doctor= new DoctorModel();
     $doctor->setArmyNo(htmlspecialchars($_POST["remove_army_no"]));
    return $doctor->removeDoctor();
    }
     public function removeReceptionist() {
     $receptionist= new ReceptionistModel();
     $receptionist->setArmyNo(htmlspecialchars($_POST["remove_army_no"]));
     return $receptionist->removeReceptionist();
    }
    public function removePathologist() {
     $pathologist=new PathologistModel();
     $pathologist->setArmyNo(htmlspecialchars($_POST["remove_army_no"]));
     return $pathologist->removePathologist();
    }
    public function removeDepartment() {
     $department=new DepartmentModel();
     $department->setDepartmentId(htmlspecialchars($_POST["remove_department_no"]));
     return $department->removeDepartment();
    }
}

if (isset($_POST['requestFor'])) {
$admin=new AdminController();
$rs=$admin->addDoctor();
echo $rs;
}
if (isset($_POST['removeDoctor'])) {
$admin=new AdminController();
$rs=$admin->removeDoctor();
header('location:../View/ManageDoctor.php');
}
if (isset($_POST['addReceptionist'])) {
$admin=new AdminController();
$rs=$admin->addReceptionist();
echo $rs;
}
if (isset($_POST['removeReceptionist'])) {
$admin=new AdminController();
$rs=$admin->removeReceptionist();
header('location:../View/ManageReceptionist.php');
}
if (isset($_POST['addPathologist'])) {
$admin=new AdminController();
$rs=$admin->addPathologist();
echo $rs;
}
if (isset($_POST['removePathologist'])) {
$admin=new AdminController();
$rs=$admin->removePathologist();
header('location:../View/ManagePathologist.php');
}
if (isset($_POST['addDepartment'])) {
$admin=new AdminController();
$rs=$admin->addDepartment();
echo $rs;
}
if (isset($_POST['removeDepartment'])) {
$admin=new AdminController();
$rs=$admin->removeDepartment();
header('location:../View/ManageDepartment.php');
}
if (isset($_FILES["file"]) && isset($_FILES["relationfile"]) ) {
    $admin=new AdminController();
$rs=$admin->addArmyPerson();
echo $rs;
}
if (isset($_POST['addTest'])) {
$admin=new AdminController();
$rs=$admin->addTest();
header('location:../View/ManageTests.php');
}