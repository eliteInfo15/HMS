<?php session_start();

   if (isset($_SESSION["armyNumberSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="doctor") {
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
            <a class="navbar-brand" href="DoctorHome.php" style="color: black;"><img src="images/icon.png" style="width: 50px;height: 50px">  Hospital Management System</a>
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
         <a class="nav-link active" id="tab1" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-user-md"></i> Consult Patients</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" id="tab2" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-eye"></i> Patient history</a>
     </li>
    
 </ul>
    <div class="tab-content">
    <div class="row tab-pane fade in show active" style="background: white" id="panel5" role="tabpanel" aria-labelledby="tab1">
      
         	<div class="col-lg-8" style="margin: 0px auto">
         	
                    <table class="table" style="width:1000px">

    <!--Table head-->
    <thead style="background: #0D47A1" align="center">
        <tr class="text-white">
            <th>Patient number</th>
            <th>Patient Army No.</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Relation</th>
            <th>Rank</th>
            <th>Date of birth</th>
            <th>Department</th>
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      <?php
      
      $doctor=new DoctorController();
         $row=$doctor->getPatientsByDepartment($deptIdArray,$doctorArmyNo);
              foreach ($row as $patient_data) {
                ?>
                <tr class="text-center">
                    <?php $n=$patient_data['consulted'];?>
                     <td><?php echo $patient_data['token']; ?></td>
                  <td><?php echo $patient_data['army_no']; ?></td>
                   <td><?php echo $patient_data['relation_fname']; ?></td>
                  <td><?php echo $patient_data['relation_lname']; ?></td>
                  <td><?php echo $patient_data['relation']; ?></td>
                   <td><?php echo $patient_data['rank']; ?></td>
                  
                   <td><?php echo $patient_data['date_of_birth']; ?></td>
                    <td><?php echo $patient_data['dname']; ?></td>
                    <?php  
                      if($n==1){
                          ?>
                     <td>
                      <a href="Consult.php?patientId=<?php echo $patient_data['patient_id'];?>&doctorArmyNo=<?php echo $doctorArmyNo;?>&patientArmyNo=<?php echo $patient_data['army_no'];?>&fname=<?php echo $patient_data['relation_fname'];?>&lname=<?php echo $patient_data['relation_lname'];?>&relation=<?php echo $patient_data['relation'];?>&rank=<?php echo $patient_data['rank'];?>&token=<?php echo $patient_data['token'];?>" class="btn btn-danger btn-sm disabled"  >Consult</a>
                  </td>
                    <?php
                      }
                      else{
                         ?>
                   <td>
                      <a href="Consult.php?patientId=<?php echo $patient_data['patient_id'];?>&doctorArmyNo=<?php echo $doctorArmyNo;?>&patientArmyNo=<?php echo $patient_data['army_no'];?>&fname=<?php echo $patient_data['relation_fname'];?>&lname=<?php echo $patient_data['relation_lname'];?>&relation=<?php echo $patient_data['relation'];?>&rank=<?php echo $patient_data['rank'];?>&token=<?php echo $patient_data['token'];?>" class="btn btn-danger btn-sm"   >Consult</a>
                  </td>
                  <?php
                      }
                    ?>
                 
                </tr>
                <?php
              }

       ?>
    </tbody>
    <!--Table body-->

</table>
    
         	</div>
                <div class="container " style="margin: 0px auto">
                <div class="col-lg-12">
                       <div  id="visualization" style="width: 100%;height: 400px;background: white">
                    
        <?php
 
    //include database connection
    require_once '../Model/Database.php';
    Database::connectDb();
   $get="select count(*) as num, consulted from patient where patient.doctor_army_no='$doctorArmyNo' and date=date(now()) group by consulted";
                      
                    
                       $rs= Database::read($get);
                      $analysisData=$rs->fetchAll(PDO::FETCH_ASSOC);
    //query all records from the database
   
 
    //execute the query
  
 
    //get number of rows returned
    
 
    if( $analysisData){
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
                draw(data, {title:"Pie chart indicating number of patients consulted today till now  "});
           
    
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
       
    <?php
 
    }else{
        echo "No data found ";
    }
    ?>
        
            </div>
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
         $row=$doctor->getAllConsultedPatientsByDoctor($doctorArmyNo);
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
                      <a href="PatientHistory.php?personId=<?php echo $patient_data['person_id'];?>&doctorId=<?php echo $doctorArmyNo;?>" class="btn btn-danger btn-sm"  >View History</a>
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
      $( "#loginform" ).validate({
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
        var person_id=$('input[name=relation]:checked', '#loginform').val(); 
        var receptionistArmyNo=$("#receptionistArmyNo").val();
        var did=$("#selectbox2").val();
         var datastring="personId="+person_id+"&receptionistArmyNo="+receptionistArmyNo+"&did="+did+"&addPatient=yes";
     $.ajax({
      type:"POST",
      url:"../Controller/ReceptionistController.php",
      data:datastring,
      success:function(result){
          document.getElementById("patientNumber").innerHTML="Patient number is "+result;
          $('#centralModalSuccess').modal('show');
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