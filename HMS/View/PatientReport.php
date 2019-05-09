<?php session_start();
 require_once '../Controller/AdminController.php';
  require_once '../Controller/ReceptionistController.php';
  require_once '../Model/Database.php';
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
   <meta http-equiv="refresh" content="300">
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
   
<?php //require_once 'NavigationBar.php'; 
 require_once '../Controller/DoctorController.php';
 $doctorArmyNo=$_SESSION["armyNumberSession"];
 $doctor=new DoctorController();
 $deptData=$doctor->getDepartmentByDoctor($doctorArmyNo);
 
 $deptIdArray=array();
 while($data=$deptData->fetch(PDO::FETCH_ASSOC)) {
     $did=(int)$data["did"];
     array_push($deptIdArray, $did);
}
?>

<main id="dash1" class="smooth" style="padding-top: 0px;padding-left: 0px">
     <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" id="tab1" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-pie-chart"></i> Daily Analysis</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" id="tab2" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-eye"></i> Patient Report</a>
     </li>
    
 </ul>
    <div class="tab-content">
    <div class="row tab-pane fade in show active" style="background: white" id="panel5" role="tabpanel" aria-labelledby="tab1">
      
        <div class="container-fluid">
           <?php 
            $date= date("Y/m/d");
            $obj=date_create($date);  
            $currentDate=date_format($obj, "l, d F Y");
            ?>
            <div class="container-fluid text-center">
               <div class="chip chip-md" style="background: #e4e4e4;color: #4f4f4f;margin-top: 20px;">
                         <span style="font-size: 14px">Today <?php echo $currentDate; ?></span>
             </div>  
            </div>
             
            <div class="container text-center" style="background: white;padding: 50px">
                <?php $admin=new AdminController();
                    $res= $admin->getAllPatientsAnalysis();
                   $total=$res[0][0]["countTotal"];
                   $consulted=$res[1][0]["countConsulted"];
                ?>
                <span class="badge badge-success" style="font-size: 20px">Total number of patients registered today till now <?php echo $total; ?></span><br><br>
            <span class="badge badge-warning" style="font-size: 20px">Total number of patients consulted today till now <?php echo $consulted; ?></span>
           </div>
            <div class="container text-center">
                <form id="showAnalysis" method="post">
                    <div class="row">
                        <div class="col-lg-6" style="text-align: right">
                        <div class="md-form ">
         
         <i class="fa fa-book prefix" style="position: relative;padding-right: 10px;color: #1E88E5;"></i>
        <select id="selectbox2" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="selectbox2">
  
  <option value="" selected disabled>Department</option>
  <?php 
     $r=new ReceptionistController();
    $row= $r->getAllDepartments();
         foreach ($row as $department_data) {
           
                ?>
               <option value="<?php echo $department_data['did']; ?>"><?php echo $department_data['dname']; ?></option>
                 <?php
              }
   ?>
  
</select>
   <label for="selectbox2" style="top: -20px;color: #1E88E5;font-size: 0.8rem;left: 350px">Select Department</label>
      </div>
                    </div>
                        <div class="col-lg-6" style="text-align: left">
                         <div class="md-form">
                             <input type="submit" class="btn btn_login" value="View analysis" name="analyse">
                    </div>
                    </div>             
                    </div>
            </form>
            </div>
            <div class="container text-center" id="visualization" style="width: 100%;height: 400px;">
                <?php 
                   if (isset($_POST["analyse"])){
                     
                      $did= $_POST["selectbox2"];
                       $get="select count(*) as num, consulted from patient,department where patient.did=department.did and patient.did='$did' and date=date(now()) group by consulted";
                      $getdname="select dname from department where did='$did'";
                      $dn=Database::read($getdname);
                      $dname=$dn->fetch(PDO::FETCH_ASSOC);
                    $name=$dname["dname"];
                       $rs= Database::read($get);
                      $analysisData=$rs->fetchAll(PDO::FETCH_ASSOC);
                    //  var_dump($analysisData);
                      if ($analysisData){
                       
                        //var_dump() ;
                        for ($index = 0; $index < count($analysisData); $index++)
                        {
                            if($analysisData[$index]["consulted"]=='1') {
                                $analysisData[$index]["consulted"]='Consulted';
                            }
                            else{
                                $analysisData[$index]["consulted"]='Not consulted';
                            }
                        }
                     
                          ?>
                      <!-- load api -->
        <script type="text/javascript" src="js/jsapi.js"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
              
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Consulted', 'Number of patient Consulted'],
                    <?php
              foreach($analysisData as $row){
                  //
                        extract($row);
                        echo "['{$consulted}', {$num}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Pie chart indicating number of patients consulted for "+"<?php echo $name; ?>"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
                     <?php 
                      }
                   }
                ?>
            </div>
        </div>
   </div>
        <div class="tab-pane fade" id="panel6" role="tabpanel" aria-labelledby="tab2">
            <div class="container-fluid" style="background: white">
                       	<div class="col-lg-8" style="margin: 0px auto">
         	
                    <table class="table" style="width:1000px">

    <!--Table head-->
    <thead style="background: #0D47A1" align="center">
        <tr class="text-white">
            
            <th>Army No.</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Relation</th>
            <th>Rank</th>
        
            <th>Department</th>
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      <?php
      
      $doctor=new DoctorController();
         $row=$doctor->getAllConsultedPatients();
       $row= array_unique($row->fetchAll(PDO::FETCH_ASSOC), SORT_REGULAR);
      //  $row= array_unique($row, SORT_REGULAR);
              foreach ($row as $patient_data) {
                ?>
                <tr class="text-center">
                    
                    
                  <td><?php echo $patient_data['army_no']; ?></td>
                   <td><?php echo $patient_data['relation_fname']; ?></td>
                  <td><?php echo $patient_data['relation_lname']; ?></td>
                  <td><?php echo $patient_data['relation']; ?></td>
                   <td><?php echo $patient_data['rank']; ?></td>
                  
                  
                    <td><?php echo $patient_data['dname']; ?></td>
                    
                     <td>
                      <a href="ViewPatientReport.php?personId=<?php echo $patient_data['person_id'];?>&doctorId=<?php echo $patient_data["dno"];?>&doctorName=<?php echo $patient_data["doctor_name"]?>" class="btn btn-danger btn-sm"  >View History</a>
                  </td>
                    
                   
                  
                 
                </tr>
                <?php
              }

       ?>
    </tbody>
    <!--Table body-->

</table>
    
         	</div>
            </div>
        </div>
     
</div>		
       <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Registered</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                
                <h3 id="patientNumber"></h3>
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            
            <a type="button" class="btn btn-outline-success waves-effect" href="ReceptionHome.php">OK</a>
        </div>
    </div>
    <!--/.Content-->
</div>
</div>    
</main>




<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  
  <!-- Bootstrap tooltips -->
 
  <!-- Bootstrap core JavaScript 
  <script type="text/javascript" src="js/bootstrap.min.js">
 
  <script type="text/javascript" src="js/mdb.min.js"></script>-->
  <script type="text/javascript" src="js/compiled.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
   $(document).ready(function(){
       $("#getdependents").click(function() {
            $("#unit-field").val("");
           $("#Rank").val("");
           $("#fname").val("");
           $("#lname").val("");
           $("#dob").val("");
            $("#age").val("");
    var army_no= $('#army_no').val();
   
  
   
 // //("&firstName="+fname+"&lastName="+lname+"&city="+city+"&email="+email+"&mobile="+mobile+"&Rank="+Rank+"&dob="+dob+"&requestFor=addDoctor"+"&gender="+gender+"&department="+selected_departments+"&doj="+doj);
 
   var datastring="army_no="+army_no+"&getDependents="+"yes";
     $.ajax({
      type:"POST",
      url:"../Controller/ReceptionistController.php",
      data:datastring,
      success:function(result){
       var person_data=JSON.parse(result);
            //console.log(person_data);
            var relationDiv=document.getElementById("relations");
            while (relationDiv.firstChild) {
    relationDiv.removeChild(relationDiv.firstChild);
}
            for (var i = 0; i < person_data.length; i++) {
                div=document.createElement("div");
                div.setAttribute("class","col-lg-3");
               div1= document.createElement("div");
               div1.setAttribute("class","md-form");
               div2=document.createElement("div");
               div2.setAttribute("class","custom-control custom-radio custom-control-inline person_radio");
               div1.appendChild(div2);
               div.appendChild(div1);
               relationDiv.appendChild(div);
                 input=document.createElement("input");
            input.setAttribute("type","radio");
             input.setAttribute("class","custom-control-input");
             input.setAttribute("name","relation");
             input.setAttribute("id","relation"+(i+1));
            input.value=person_data[i].person_id;
            input.style.marginRight="3rem";
            //document.createElement("i");
            div2.appendChild(input);
            label=document.createElement("label");
            label.setAttribute("class","custom-control-label hand_cursor person_id");
            label.setAttribute("for","relation"+(i+1));
            label.innerHTML=person_data[i].relation_fname+"("+person_data[i].relation+")";
            div2.appendChild(label);
            } 
           
      }
     });
    });
   }); 
 </script>
  <script type="text/javascript">
  $(document).ready(function() {
      $(document).on( 'change', 'input[name=relation]', function(){
        
         var person_id=$('input[name=relation]:checked', '#loginform').val(); 
       
         var army_no= $('#army_no').val();
         var datastring="person_id="+person_id+"&army_no="+army_no+"&getInfo="+"yes";
        
              $.ajax({
      type:"POST",
      url:"../Controller/ReceptionistController.php",
      data:datastring,
      success:function(result){
       var person_data= JSON.parse(result);
      
           $("#unit-field").val(person_data[0].unit);
           $("#Rank").val(person_data[0].rank);
           $("#fname").val(person_data[0].relation_fname);
           $("#lname").val(person_data[0].relation_lname);
       
           $("#dob").val(  person_data[0].relation_date_of_birth);
           
           var dob=$("#dob").val();
          dob= new Date(dob);
           var ageDifMs = Date.now() -dob.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
   var age= Math.abs(ageDate.getUTCFullYear() - 1970);
   $("#age").val(age);
      }
     });
      } );
  
      
});
  </script>
   <script type="text/javascript">
   $(document).ready(function(){
      $( "#showAnalysi" ).validate({
        rules: {
          
          selectbox2: {
            required: true
          },
          password: {
            required: true
          },

          fname:{
            required:true
          },
          lname:{
            required:true
          },
          city:{
            required:true
          },
          Rank:{
            required:true
          },
          email:{
            required:true
          },
          mobile:{
            required:true
          },
          dob:{
            required:true
          },
          doj:{
            required:true
          },
          skill:{
            required:true
          }
        },
        messages: {
          
          army_no: {
            required: "Army number is required"
          },
          skill:{
             required: "Skill is required"
          },
          fname: {
            required: "First name is required"
          },
          lname: {
            required: "Last name is required"
          },
          email: {
            required: "Email is required"
          },
          mobile: {
            required: "Mobile is required"
          },
          dob: {
            required: "Date of birth is required"
          },
          doj: {
            required: "Date of joining is required"
          },
          city: {
            required: "City is required"
          },
          Rank: {
            required: "Rank is required"
          },
          
          password: {
            required: "Password is required"}
        } ,

     submitHandler: function(form) {
       
        var did=$("#selectbox2").val();
         var datastring="departmentId="+did+"&showAnalysis=yes";
        
     $.ajax({
      type:"POST",
      url:"../Controller/AdminController.php",
      data:datastring,
      success:function(result){
       
         var Obj=JSON.parse(result);
         
         var totalPatients=Obj[0];
         var consultedPatients=Obj[1];
         var container=document.getElementById("analysisContainer");
                while (container.firstChild) {
                 container.removeChild(container.firstChild);
                 }
           
            span=document.createElement("span"); 
            span.setAttribute("class","badge badge-success");
            span.setAttribute("style","font-size:20px");
            span.innerHTML="Total number of patients registered today in "+totalPatients[0].dname+" till now is "+totalPatients[0].countTotal;
            span1=document.createElement("span"); 
            span1.setAttribute("class","badge badge-warning");
            span1.innerHTML="Total number of patients consulted today in "+consultedPatients[0].dname+" till now is "+consultedPatients[0].countConsulted;
            span1.setAttribute("style","font-size:20px");
            container.appendChild(span);
            container.appendChild(span1);
    }
     });

  },

        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      }
           
       );
    });
  </script>

</body>
</html>