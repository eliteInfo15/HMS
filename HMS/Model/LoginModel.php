<?php
require_once 'Database.php'; 
class LoginModel{
	private $armyNo;
	private $password;
                  private $role;
    public function __construct()
    {
        Database::connectDb();	
    }
    public function setArmyNumber($armyNo)
    {
    	$this->armyNo=$armyNo;
    }
    public function setPassword($password)
    {
    	$this->password=$password;
    }
    public function setRole($role)
    {
    	$this->role=$role;
    }
    public function getArmyNo() {
        return $this->armyNo;
    }
   public function getPassword()
    {
    	return $this->password;
    }
    public function getRole()
    {
    	return $this->role;
    }
    
    public function validate()
   {
        $loginQuery="select * from login where army_no='$this->armyNo' and role='$this->role'";
        $result=Database::read($loginQuery);
        
           if ($data=$result->fetch(PDO::FETCH_ASSOC)) 
           {
              if (password_verify($this->password,$data['password']))
              {
                  return true;
              }
           }
           else{
               return false;
           }
    }
 public function addLoginInfo()
{
    $encryptedPassword=password_hash($this->password,PASSWORD_BCRYPT);
    $insertQuery="insert into login values('$this->armyNo','$encryptedPassword','$this->role')";
    $rowsInserted=Database::insert($insertQuery);
    return $rowsInserted;
}
}

 ?>