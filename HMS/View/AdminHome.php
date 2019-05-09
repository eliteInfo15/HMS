<?php session_start();
   if (isset($_SESSION["armyNumberSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="admin") {
          header('location:Login.php');
       }

}
else{
	header('location:Login.php');
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>HMS</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  
  <!-- Your custom styles (optional) 
  
  <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.5.11.min.css?ver=4.5.11">-->
  <style type="text/css">
  	#btn{
  		border-radius: 30px;
  	}
  	div .card-body-cascade a:hover{
     color: white !important;
  	}
  </style>
</head>
<body class="fixed-sn white-skin" data-gr-c-s-loaded="true" style="background:#eee">

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
                        
                        
                    </ul>
                </div>
            </nav>

    </header>
   
<?php// require_once 'NavigationBar.php'; ?>

<main id="dash1" class="smooth" style="padding-top: 0px;padding-left: 0px">
	<div class="container-fluid">
		
            <!-- First row -->
            <div class="row mt-lg-5">
                <!-- First column -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-user-md indigo"></i>
                            <div class="data">
                                <p>
                                	DOCTORS
                                </p>
                                
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageDoctor.php" class="btn indigo btn-rounded">Manage Doctors</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px">Here you can add, view or update doctors</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>

                <!-- Second column -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-user warning-color"></i>
                            <div class="data">
                                <p>RECEPTIONIST</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageReceptionist.php" class="btn warning-color btn-rounded">Manage Receptionist</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can manage receptionist</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>



  <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-user light-blue"></i>
                            <div class="data">
                                <p>PATHOLOGIST</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManagePathologist" class="btn light-blue btn-rounded">Manage Pathologist</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can manage pathologist</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-user red"></i>
                            <div class="data">
                                <p>DEPARTMENTS</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageDepartment.php" class="btn red btn-rounded">Manage Departments</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can manage department</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                                  <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-book red"></i>
                            <div class="data">
                                <p>TESTS</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageTests.php" class="btn red btn-rounded">Manage Tests</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can add, remove or edit Tests</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                                 <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-book indigo"></i>
                            <div class="data">
                                <p>ARMY PERSON</p>
                                <!--<h3 class="font-weight-bold dark-grey-text">375</h3>-->
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageArmyPerson.php" class="btn indigo btn-rounded">Manage Army Person</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px;">Here you can add army people</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                 <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-medkit indigo"></i>
                            <div class="data">
                                <p>
                                	MEDICINES
                                </p>
                                
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageMedicines.php" class="btn indigo btn-rounded">Manage Medicines</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px">Here you can add, view Medicines</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                   <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-medkit warning-color"></i>
                            <div class="data">
                                <p>
                                	DOSAGE
                                </p>
                                
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageDosage.php" class="btn warning-color btn-rounded">Manage Dosage</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px">Here you can add, view Dosages</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                   <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-medkit indigo"></i>
                            <div class="data">
                                <p>
                                	INSTRUCTIONS
                                </p>
                                
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="ManageDosageInstruction.php" class="btn indigo btn-rounded">Manage Instructions</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px">Here you can add, view Instructions</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
                      <div class="col-xl-3 col-md-6 mb-4">
                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card">

                        <!--Card Data-->
                        <div class="admin-up">
                            <i class="fa fa-medkit red"></i>
                            <div class="data">
                                <p>
                                	Patient Report
                                </p>
                                
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body card-body-cascade text-center">
                            <a href="PatientReport.php" class="btn red btn-rounded">Analysis and report</a>
                            <!--Text-->
                            <p class="card-text" style="text-align: justify;margin-top: 10px">Here you can view patient's report</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>
            </div>
            <!-- /.First row -->

	</div>
    <div class="container-fluid">
        <div class="row">
            <a href="MonthlyAnalysis.php" class="btn btn-success " style="margin-left: 20px;">Get Monthly Analysis</a>
        </div>
    </div>
    <div class="container-fluid" id="visualization" style="width: 100%;height: 400px;">
        <script>
        <?php
 
    //include database connection
    require_once '../Controller/AdminController.php';
   $admin=new AdminController();
   $result=$admin->getDepartmentWiseNumberOfPatients();
    //query all records from the database
   
 
    //execute the query
  //  var_dump($result);
 
    //get number of rows returned
    
 
    if( $result){
 
    ?>
        </script>
        <!-- load api -->
        <script type="text/javascript" src="js/jsapi.js"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                var d = new Date();
var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";
var n = month[d.getMonth()];
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Department', 'Patients'],
                    <?php
              foreach($result as $row){
                        extract($row);
                        echo "['{$dname}', {$n}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Pie chart indicating number of patients per department for current month "+n});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
        <script>
    <?php
 
    }else{
        echo "No data found ";
    }
    ?>
        </script>
    </div>
</main>




<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!-- Bootstrap tooltips -->
 
  <!-- Bootstrap core JavaScript 
  <script type="text/javascript" src="js/bootstrap.min.js">
 
  <script type="text/javascript" src="js/mdb.min.js"></script>-->
  <script type="text/javascript" src="js/compiled.min.js"></script>
</body>
</html>