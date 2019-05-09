<?php

session_start();
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
    <div class="container" style="margin: 40px auto;background-color: white">
        <form method="post">
        <div class="row">
           
            <div class="col-lg-6 offset-5" >
         <div class="md-form">
              <i class="fa fa-calendar prefix " style="position: relative;padding-right: 10px;color: #3f51b5"></i>
        <select id="month" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="month">
  
  <option value="" selected disabled>Month</option>
    <option value="1">Jan</option>
    <option value="2">Feb</option>       
    <option value="3">Mar</option>
    <option value="4">Apr</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">Jul</option>
    <option value="8">Aug</option>
    <option value="9">Sept</option>
    <option value="10">Oct</option>
    <option value="11">Nov</option>
    <option value="12">Dec</option>
  </select>
   <label for="month" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select month</label>
         </div>
                <div class="md-form">
                    <input type="submit" value="get" name="btnSubmit" class="btn_login">
                        
                </div>
     </div>
                
                
        </div>
    </form>
    </div>
    <div class="container" id="visualization" style="width: 100%;height: 400px;">
         <script>
        <?php
 if(isset($_POST["btnSubmit"])){
       //include database connection
    require_once '../Controller/AdminController.php';
   $admin=new AdminController();
 $month=$_POST["month"];
   $result=$admin->getDepartmentWiseNumberOfPatientsByMonth($month);
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
                var monthValue=<?php echo $month;?>;
                
               monthValue-=1;
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
var n = month[monthValue];
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
                draw(data, {title:"Pie chart indicating number of patients per department for month "+n});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
        <script>
    <?php
 
    }else{
        echo "No data found ";
    }
 }
  
    ?>
        </script>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/compiled.min.js"></script>
 
  <script type="text/javascript" src="js/jquery.validate.js"></script>
</body>
</html>