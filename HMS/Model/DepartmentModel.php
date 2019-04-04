<?php
require_once 'Database.php';
class DepartmentModel{
    private $departmentId;
    private $departmentName;
    private $departmentEstablishedYear;
    public function __construct() {
        Database::connectDb();
    }

    public function getDepartmentId() {
        return $this->departmentId;
    }

    public function getDepartmentName() {
        return $this->departmentName;
    }

    public function getDepartmentEstablishedYear() {
        return $this->departmentEstablishedYear;
    }

    public function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
        
    }

    public function setDepartmentName($departmentName) {
        $this->departmentName = $departmentName;
        
    }

    public function setDepartmentEstablishedYear($departmentEstablishedYear) {
        $this->departmentEstablishedYear = $departmentEstablishedYear;
      
    }

    public function addDepartment() {
        $addDepartment="insert into department(dname,establishment_year) values('$this->departmentName','$this->departmentEstablishedYear')";
        $result=Database::insert($addDepartment);
        return $result;
    }
   
    public function getAllDepartments() {
        $getDepartments="select * from department";
        return Database::read($getDepartments);
    }
    
    public function removeDepartment() {
        $removeDepartment="delete from department where did='$this->departmentId'";
        return Database::delete($removeDepartment);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

