<?php 
session_start();
require_once '../Model/LoginModel.php';

class LoginController{
	public function __construct()
	{
		
	}
	public function login()
	{
	                  $armyNo=htmlspecialchars($_POST["army_no"]);
                                    $password=htmlspecialchars($_POST["password"]);
                                    $role=htmlspecialchars($_POST["role"]);
		$loginModel=new LoginModel();
		$loginModel->setArmyNumber($armyNo);
		$loginModel->setPassword($password);
		$loginModel->setRole($role);
		$isValid=$loginModel->validate();
	
		if ($isValid) {
		   $_SESSION["armyNumberSession"]=$armyNo;
		   $_SESSION["roleSession"]=$role;
		   if ($role=="admin") {
		   	header('Location:../View/AdminHome.php');
		   }
		   else if($role=="doctor"){
		   	header('Location:../View/DoctorHome.php');
		   }
                                       else if($role=="receptionist"){
		   	header('Location:../View/ReceptionHome.php');
		   }
                                     else if($role=="pathologist"){
		   	header('Location:../View/PathologyHome.php');
		   }
		   
		}
		else{
			$_SESSION["loginError"]="Invalid username or Password";
                                                       header('Location:../View/Login.php');
		}
	}
	public function logout()
	{
		unset($_SESSION['armyNumberSession']);
                                     unset($_SESSION['roleSession']);
		session_destroy();
		header('Location:../View/Login.php');
	}
}



 ?>




 <?php 
//handling post requests
if (isset($_POST["login_btn"])) {
	
	$loginController=new LoginController();
	$loginController->login();
}

if (isset($_POST["logoutBtn"])) {
	
	$loginController=new LoginController();
	$loginController->logout();
}


 ?>