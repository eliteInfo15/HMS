<?php 
require_once '../Controller/DoctorController.php';
require_once '../Controller/PathologistController.php';
session_start();
 
  
   $personId=$_GET["personId"];
   $doctorId=$_GET["doctorId"];
   $doctorName=$_GET["doctorName"];
   if (isset($_SESSION["armyNumberSession"]) && isset($_SESSION["roleSession"])) {
  $p=new PathologistController();
           $prole=$p->getPathologistRole($_SESSION["armyNumberSession"]);
       if ($_SESSION["roleSession"]!="pathologist") {
         
              header('location:Login.php'); 
            }
            else{
                if ($prole!="oic") {
                    header('location:Login.php'); 
                }
            }
          
}
else{
	header('location:Login.php');
}
?>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Hospital Management System</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  
  <!-- Your custom styles (optional) 
  
  <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.5.11.min.css?ver=4.5.11">-->
  <style type="text/css">
      .loader {
                margin: 10px auto;
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid #00c851;
  width: 30px;
  height: 30px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
.hidden{
    display:none;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  	#btn{
  		border-radius: 30px;
  	}
  	div .card-body-cascade a:hover{
     color: white !important;
  	}
        	#btn{
  		border-radius: 30px;
  	}
  	.separation{
  margin-left: 70px !important;
}
.btn_login{
    padding: 6px 40px;
   
    background: #3f51b5;
    border: 0;
    color: white;
    box-shadow: 1px 3px 13px #3f51b5;
    cursor: pointer;
}
.side-align{
      position: relative;
    top: -34px;
    float: right;
}
.hand_cursor{
  cursor: pointer !important;
}
em{
  padding-left: 38px;
    color: red;
    font-family: Arial ;
    font-style: normal;
}
.login_error{
  color: red;
}
.gender-container{
 // display: block;
  margin: 2px;
}
.chip.chip-md {
  height: 42px;
  line-height: 42px;
  border-radius: 21px;
}
.chip.chip-md img {
  height: 38px;
  width: 38px;
}
select {
  margin-bottom: 1em;
    padding-left: 1em;
    border: 0;
    border-bottom: 1px solid #ced4da;
   // font-family: segoe ui light;
    border-radius: 0;
    outline-color: white;
    color: #757575;
}
td{
    font-size: 1.1rem !important;
}
.md-form .form-control:disabled, .md-form .form-control[readonly] {
    border-bottom: 1px solid #4f4f4f;
    /* background-color: transparent; */
}
textarea{
    padding: 0px !important;
}
  </style>
</head>
<body>
    <header style="background-color: white">

                <!-- Navbar -->
        <nav class="mb-1 navbar navbar-expand-lg z-depth-2 navbar-fixed-top">
            <a class="navbar-brand" href="AdminHome.php" style="color: black;"><img src="images/icon.png" style="width: 50px;height: 50px">  Hospital Management System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars" style="color: black;"></i>
                        </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
 
    
 
      <ul id="dropdown-menu" class="dropdown-menu">
      	
      </ul>
     
     </li>
                        
                        <li class="nav-item active">
                        	<form class="form-inline my-2 my-lg-0 ml-auto" method="post" action="../Controller/LoginController.php">
                        		<div class="md-form my-0">
                        			<button class="btn indigo btn-rounded btn-md my-2 my-sm-0 ml-3" name="logoutBtn" type="submit"><i class="fa fa-sign-out" style="font-size: 15px"></i> Logout</button>
                        			
                        		</div>
                        	</form>
                        	</li>
                                <li class="nav-item">
                                    <a href="ChangeDoctorPassword.php?doctorId=<?php echo $_SESSION["armyNumberSession"];?>" class="btn indigo btn-rounded btn-md my-2 my-sm-0 ml-3" style="color: white"><i class="fa fa-pencil" style="font-size: 15px"></i> Change Password</a> 
                                </li>
                        
                        
                    </ul>
                </div>
            </nav>

    </header>
    <div class="container-fluid " style="margin: 40px auto;background: white;padding: 20px" >
        <span class="badge badge-danger text-center" style="padding: 11px 23px;font-size: 20px;margin:2px auto;display: table">Patient Medical Report</span>
        
        <?php
$doctor=new DoctorController();
$result=$doctor->getPatientHistoryByDoctor($personId, $doctorId);
$history=$result->fetchAll(PDO::FETCH_ASSOC);
$dates=array();
foreach ($history as  $value) {
    array_push($dates, $value["opd_date"]); 
}
$patientOpdDates=array_unique($dates,SORT_REGULAR);
$patientName=$history[0]["relation_fname"].' '.$history[0]["relation_lname"];
$armyNo=$history[0]["person_army_no"];
$relation=$history[0]["relation"];
$gender=$history[0]["relation_gender"];
$bloodGroup=$history[0]["blood_group"];
$dob=$history[0]["relation_date_of_birth"];
$age= date_diff(date_create($dob), date_create('today'))->y;
?>
        <div class="container-fluid" style="margin-top: 30px">
            <table class="table">
                <thead style="background: #0D47A1">
                    <tr class="text-white text-center">
           
            <th>Army No.</th>
            <th>Name</th>
            <th>Relation</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Gender</th>
        </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td><?php echo "&nbsp;".$armyNo; ?></td>
                        <td style="text-transform: capitalize"><?php echo "&nbsp;".$patientName; ?></td>
                        <td><?php echo "&nbsp;".$relation; ?></td>
                          <td><?php echo "&nbsp;".$age; ?></td>
                        <td><?php echo "&nbsp;".$bloodGroup; ?></td>
                          <td><?php echo "&nbsp;".$gender; ?></td>
                    </tr>
                </tbody>
            </table>
         
            </div>
            
<?php

$details=array();
?>
         <div class="container-fluid">
           <!-- <p style="font-size: 22px;font-weight: bold;color: #4f4f4f"> </p>-->
            <div class="chip chip-md" style="background: #3f51b5;color:white;">
                <i class="fa fa-user-md" style="font-size: 23px !important"></i> <span style="font-size: 18px;text-transform: capitalize">Consulted By: <?php echo $doctorName; ?></span>
</div>
        </div>
     
   <?php
foreach ($patientOpdDates as $opdDate) {
    $patientOpdDate=date_create($opdDate);
    $date=date_format($patientOpdDate, "l, d F Y");
    for($i=0;$i<count($history);$i++){
   $his=$history[$i]; 
   if($his["opd_date"]==$opdDate){
       array_push($details, $his);
       }
      }
?>
       

<?php
$duplicateMedicines=array();
$duplicateComments=array();
$duplicateCategory=array();
foreach ($details as  $detail) {
    array_push($duplicateComments, $detail["comments"]); 
    array_push($duplicateCategory, $detail["category"]);
    array_push($duplicateMedicines, $detail["medicine_name"]); 
}
$comment=array_unique($duplicateComments,SORT_REGULAR);
$category=array_unique($duplicateCategory,SORT_REGULAR);
$medicines=array_unique($duplicateMedicines,SORT_REGULAR);
?>
        <div class="container-fluid">
        <!--<div class="row">
             <div class="col-lg-6">
           <div class="md-form">
         
               <i class="fa fa-user-md prefix" style="color: #0D47A1"></i>
         <textarea  class="md-textarea form-control" rows="3" id="comments" name="comments" readonly><?php echo $comment[0]; ?></textarea>
         <label for="army_no" style="margin-top: -20px;color: #0D47A1">Comment</label>
       
  </div>
        </div>
             <div class="col-lg-4">
           <div class="md-form">
         
         <i class="fa fa-user prefix" style="color: #0D47A1"></i>
         <input type="text" class="form-control" name="army_no" id="army_no" readonly="" value="<?php echo $category[0]; ?>">
         <label for="army_no" style="margin-top: -20px;color: #0D47A1">Category</label>
       
  </div>
        </div>
        </div>-->
            
    
<?php
foreach ($medicines as $medicineValue) {
   $dosageDetail=array();
   $instructionDetail=array();
   $days=array();
  for ($index = 0; $index < count($history); $index++) {
        if ($history[$index]["medicine_name"]==$medicineValue) {
            array_push($dosageDetail, $history[$index]["dosage"]);
              array_push($instructionDetail, $history[$index]["instruction"]);
               array_push($days, $history[$index]["days"]);
        }
        
    }
 
    ?>
<!--<div class="row">
          <div class="col-lg-3">
           <div class="md-form">
         
         <i class="fa fa-medkit prefix" style="color: #0D47A1"></i>
         <input type="text" class="form-control" name="army_no" id="army_no" readonly="" value="<?php echo $medicineValue; ?>">
         <label for="army_no" style="margin-top: -10px;color: #0D47A1">Medicine</label>
       
  </div>
        </div>   
         <div class="col-lg-2">
           <div class="md-form">
         
         <i class="fa fa-medkit prefix" style="color: #0D47A1"></i>
         <input type="text" class="form-control" name="army_no" id="army_no" readonly="" value="<?php echo $dosageDetail[0]; ?>">
         <label for="army_no" style="margin-top: -10px;color: #0D47A1">Dosage</label>
       
  </div>
        </div>
     <div class="col-lg-2">
           <div class="md-form">
         
         <i class="fa fa-medkit prefix" style="color: #0D47A1"></i>
         <input type="text" class="form-control" name="army_no" id="army_no" readonly="" value="<?php echo $instructionDetail[0]; ?>">
         <label for="army_no" style="margin-top: -10px;color: #0D47A1">Instruction</label>
       
           </div>
        </div> 
     <div class="col-lg-2">
           <div class="md-form">
         
         <i class="fa fa-medkit prefix" style="color: #0D47A1"></i>
         <input type="text" class="form-control" name="army_no" id="army_no" readonly="" value="<?php echo $days[0]; ?>">
         <label for="army_no" style="margin-top: -10px;color: #0D47A1">Days</label>
       
           </div>
        </div> 
</div>-->
      <?php
        }
        
        $result=$doctor->getRecommendedTests($personId, $doctorId, $opdDate);
      $testInfo= $result->fetchAll(PDO::FETCH_ASSOC);
      
      if ($testInfo[0]["test_id"]!=NULL) {
          ?>
            <div class="container-fluid" style="margin-bottom: 50px;">
               <?php
               $completedTestIdArray=array();
                $pendingTestIdArray=array();
                         for ($i=0;$i<count($testInfo);$i++){
                             if ($testInfo[$i]["test_completed"]==1) {
                                 array_push($completedTestIdArray, $testInfo[$i]["test_id"]);
                             }
                             else{
                               array_push($pendingTestIdArray, $testInfo[$i]["test_id"]);  
                             }
                         }
                 $completedTestCount= count($completedTestIdArray);
                  $pendingTestCount=count($pendingTestIdArray);
                  if ($completedTestCount>0) {
                     $data= $doctor->getPatientTestResult($personId, $doctorId, $opdDate, $completedTestIdArray);
                    $testResult=$data->fetchAll(PDO::FETCH_ASSOC);
                    //var_dump($testResult);
                    $testNameArray=array();
                    $testResultDate=array();
                    for($j=0;$j<count($testResult);$j++){
                        array_push($testNameArray, $testResult[$j]["test_name"]);
                         array_push($testResultDate, $testResult[$j]["date"]);
                    }
                   $testNames= array_unique($testNameArray,SORT_REGULAR);
                   foreach ($testNames as $name) {
                       ?>
                <div class="container-fluid">
                     <div class="chip chip-md" style="background: #e4e4e4;color: #4f4f4f;">
                         <span style="font-size: 14px"><?php echo strtoupper($name); ?> Test  <?php $obj=date_create($testResultDate[0]);  $resultDate=date_format($obj, "l, d F Y"); echo $resultDate;?></span>
                     </div> 
                    <div class="row">
                        <?php
                         $attributeValueArray=array();
                         for ($k=0;$k<count($testResult);$k++){
                             if ($testResult[$k]["test_name"]==$name) {
                                 $key=$testResult[$k]["attribute_name"];
                                 $value=$testResult[$k]["value"];
                                 $attributeValueArray[$key]=$value;
                              }
                         }
                         //var_dump($attributeValueArray);
                         foreach ($attributeValueArray as $key => $value) {
                             ?>
                        <div class="col-lg-2">
           <div class="md-form">
         
        
         <input type="text" class="form-control" name="army_no" id="army_no" readonly="" value="<?php echo $value; ?>">
         <label for="army_no" style="margin-top: -10px;color: #0D47A1"><?php echo $key; ?></label>
       
  </div>
        </div>
                        <?php
                         }
                     
                        ?>
                    </div>
               </div>
                <?php
                   }
                  }
                  if ($pendingTestCount>0) {
                     $pendingTestNames =$doctor->getNameByTestId($pendingTestIdArray);
                    
                     $pendingTest=array();
                     for ($a=0;$a<count($pendingTestNames);$a++){
                         array_push($pendingTest, $pendingTestNames[$a]["test_name"]);
                     }
                     foreach ($pendingTest as $test) {
                         ?>
                       <div class="chip chip-md" style="background: #e4e4e4;color: #4f4f4f;">
                         <span style="font-size: 14px;margin-bottom: 8px"><?php echo strtoupper($test); ?> Test</span>
                         <div class='loader' data-toggle='tooltip' title='<?php echo $test;?> test is pending' data-placement='right'></div>
                     </div> 
                 
                     <?php
                     }
                      ?>
               
                <?php
                  }
               ?>
            </div>   
            <?php
      }
  

}
 ?>      
</div>


        </div>


 <script type="text/javascript" src="js/compiled.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>

<script type="text/javascript" >
  $(document).ready(function(){
      $(function () {
$('[data-toggle="tooltip"]').tooltip();
});
  });
  </script>
    
</body>
</html>
