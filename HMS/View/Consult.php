<?php session_start();
 require_once '../Controller/AdminController.php';
  $armyNo=$_GET["patientArmyNo"];
   $patientId=$_GET["patientId"];
   $doctorArmyNo=$_GET["doctorArmyNo"];
    $rank=$_GET["rank"];
     $fname=$_GET["fname"];
       $lname=$_GET["lname"];
         $token=$_GET["token"];
          $relation=$_GET["relation"];
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
                        
                        
                    </ul>
                </div>
            </nav>

    </header>
   

<?php //require_once 'NavigationBar.php'; 
 require_once '../Controller/DoctorController.php';
?>

<main id="dash1" class="smooth" style="padding-top: 0px;padding-left: 0px">
    <div class="row" style="background: white">
        <div class="container text-center" style="margin-top: 30px;">
            <h2>Consult Patient</h2>
        </div>
         	<div class="col-lg-8" style="margin: 30px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="loginform" method="post">
        <input type="text" id="patientNo" name="patientNo" style="display: none" value="<?php  echo $patientId ?>">
        <div class="row">
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="army_no" id="army_no" readonly="" value="<?php echo $armyNo ?>">
        <label for="army_no">Army Number</label>
       
  </div>
        </div>
            <div class="col-lg-6">
                 <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="patient_id" id="patient_id" readonly="" value="<?php echo $token ?>">
        <label for="patient_id">Patient Token</label>
       
  </div>
            </div>
        </div>
        <div class="row gender-container" id="relations">
            
        </div>
      <div class="row">
        
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" id="doctorArmyNo" class="form-control" name="doctorArmyNo" readonly="" value="<?php echo $doctorArmyNo ?>">
         <label for="doctorArmyNo" style="margin-top: -24px;">Doctor Army No</label>
        
  </div>
        </div>
       <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="Rank" id="Rank" readonly="" value="<?php echo $rank?>">
        <label for="Rank" style="margin-top: -24px;">Serving Person Rank</label>
       
  </div>
        </div>
      </div>
      <!-- Email -->
      

      <!-- Password -->
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="fname" id="fname" readonly="" value="<?php echo $fname?>">
        <label for="fname" style="margin-top: -24px;">First Name</label>
       
  </div>

        </div>
        <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="lname" id="lname" readonly="" value="<?php echo $lname?>">
        <label for="lname" style="margin-top: -24px">Last Name</label>
       
  </div>
        </div>
      </div>
  
      <div class="row">
           <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="relation" id="relation" readonly="" value="<?php echo $relation?>">
        <label for="relation" style="margin-top: -24px">Relation</label>
       
  </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
              <div class="md-form">
  <i class="fa fa-pencil prefix"></i>
  <textarea  class="md-textarea form-control" rows="3" id="comments" name="comments"></textarea>
  <label for="comments">Comments</label>
</div>
          </div>
          <div class="col-lg-6">
             <div class="md-form">
         
         <i class="fa fa-pencil prefix"></i>
         <input type="text" class="form-control" name="category" id="category"  >
        <label for="category" style="margin-top: -24px">Category</label>
       
  </div> 
          </div>
          
      </div>
      <div class="container" style="margin-top: 20px">
          <h5>Prescribe Medicine</h5>
          <div class="row">
            
                 <div class="col-lg-4">
                    <div class="md-form">
         
         <i class="fa fa-medkit prefix" style="position: relative;padding-right: 10px"></i>
        <select id="medicine" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="medicine">
  
  <option value="" selected disabled>Medicine</option>
  <?php 
    $admin= new AdminController();
    $row= $admin->getAllMedicines();
         foreach ($row as $medicine_data) {
           
                ?>
               
                  <option value="<?php echo $medicine_data['medicine_id']; ?>"><?php echo $medicine_data['medicine_name']; ?></option>
                 
                  
             
                <?php
              }
   ?>
  
</select>
   <label for="medicine" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Medicine</label>
      </div>
          </div>
                         <div class="col-lg-4">
                    <div class="md-form">
         
         <i class="fa fa-medkit prefix" style="position: relative;padding-right: 10px"></i>
        <select id="dosage" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="dosage">
  
  <option value="" selected disabled>Dosage</option>
  <?php 
    $admin= new AdminController();
    $row= $admin->getAllDosage();
         foreach ($row as $dosage_data) {
           
                ?>
               
                  <option value="<?php echo $dosage_data['dosage_id']; ?>"><?php echo $dosage_data['dosage']; ?></option>
                 
                  
             
                <?php
              }
   ?>
  
</select>
   <label for="dosage" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Dosage</label>
      </div>
          </div>
                         <div class="col-lg-4">
                    <div class="md-form">
         
         <i class="fa fa-medkit prefix" style="position: relative;padding-right: 10px"></i>
        <select id="instruction" data-selected="" style="display: inline !important;padding-right: 24px;padding-left: 20px;" name="instruction">
  
  <option value="" selected disabled>Instruction</option>
  <?php 
    $admin= new AdminController();
    $row= $admin->getAllInstruction();
         foreach ($row as $instruction_data) {
           
                ?>
               
                  <option value="<?php echo $instruction_data['instruction_id']; ?>"><?php echo $instruction_data['instruction']; ?></option>
                 
                  
             
                <?php
              }
   ?>
  
</select>
   <label for="instruction" style="top: -20px;color: #1E88E5;font-size: 0.8rem;">Select Instruction</label>
      </div>
          </div>
               <div class="col-lg-4">
             <div class="md-form">
         
         <i class="fa fa-calendar prefix"></i>
         <input type="text" class="form-control" name="days" id="days"  >
        <label for="days" style="margin-top: -24px">Days</label>
       
  </div> 
          </div>
              <div class="col-lg-3">
             <div class="md-form">
         
       
                 <input type="button" class="form-control btn btn-danger" name="addMedicine" id="addMedicine"  value="Prescribe Medicine">
        
       
  </div> 
          </div>
          </div>
      </div>
     <div class="scrollable">
         <h5>Prescribe tests</h5>
           <div class="row">
              
    <?php 
    $doctor=new DoctorController();
    $result=$doctor->getAllTests();
    $i=1;
       foreach ($result as $key => $value) {
               
         ?>

        
      <div class="form-check col-lg-4">
    <input type="checkbox" class="form-check-input test" id="<?php echo "test".$i ?>" name="test[]" value="<?php echo $value['test_id'] ?>">
    <label class="form-check-label" for="<?php echo "test".$i ?>"><?php echo $value["test_name"]; ?></label>
</div>
    
         <?php
       $i++;
       }
     ?>
                    
      </div> 
   
  </div>
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="add-instructor" value="Save" class="btn_login waves-effect">
</div>
   </form>
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
                
                <h3 >Saved!</h3>
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            
            <a type="button" class="btn btn-outline-success waves-effect" href="DoctorHome.php">OK</a>
        </div>
    </div>
    <!--/.Content-->
</div>
           

</div>  
                      <div class="modal fade" id="centralModalSuccess1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Prescribed</p>
             
            <button type="button" id="closeBtn" class="close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
             
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                
                <h3 >Medicine Prescribed</h3>
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            
        <!--  
            <a type="button" class="btn btn-outline-success waves-effect close" href="Consult.php?patientId=<?php echo $_GET['patientId'];?>&doctorArmyNo=<?php echo $_GET["doctorArmyNo"];?>&patientArmyNo=<?php echo $_GET["patientArmyNo"];?>&fname=<?php echo $_GET['fname'];?>&lname=<?php echo $_GET['lname'];?>&relation=<?php echo $_GET['relation'];?>&rank=<?php echo $_GET['rank'];?>&token=<?php echo $_GET['token'];?>">OK</a>
        -->
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
      $("#closeBtn").click(function(){
          $('#centralModalSuccess1').modal('hide');
          $("#medicine").val("");
          $("#dosage").val("");
          $("#instruction").val("");
          $("#days").val("");
      });
  });
  </script>
  <script>
    $(document).ready(function(){
        $("#addMedicine").click(function(){
            var patientId=$("#patientNo").val();
            var medicineId=$("#medicine").val();
            var dosageId=$("#dosage").val();
            var instructionId=$("#instruction").val();
            var days=$("#days").val();
            var doctorId=<?php echo $_SESSION["armyNumberSession"]?>;
            var datastring="patientId="+patientId+"&medicineId="+medicineId+"&dosageId="+dosageId+"&instructionId="+instructionId+"&days="+days+"&prescribeMedicine=yes"+"&doctorId="+doctorId;
                       $.ajax({
      type:"POST",
      url:"../Controller/DoctorController.php",
      data:datastring,
      success:function(result){
         // alert(result);
         $('#centralModalSuccess1').modal('show');
      }
     }); 
    });
    });
  </script>
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
          comments:{
            required:true  
          },
          category:{
            required:true  
          },
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
            category:{
              required:"Comments are required"    
            },
          comments:{
            required:"Comments are required"  
          },
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
       var patient_id= $("#patientNo").val();
        var doctorArmyNo= $("#doctorArmyNo").val();
       
        var comments=$("#comments").val();
        var category=$("#category").val();
     
        var selected_tests=new Array();
        $(".test:checked").each(function() {
           selected_tests.push($(this).val());
        });
        if (selected_tests.length>0) {
   
         var datastring="patient_id="+patient_id+"&doctorArmyNo="+doctorArmyNo+"&comments="+comments+"&test="+selected_tests+"&saveOPD=yes"+"&category="+category+"&medicine="+medicine;
    
} else {
    var datastring="patient_id="+patient_id+"&doctorArmyNo="+doctorArmyNo+"&comments="+comments+"&saveOPD=yes"+"&category="+category+"&medicine="+medicine;
        
}
   
        $.ajax({
      type:"POST",
      url:"../Controller/DoctorController.php",
      data:datastring,
      success:function(result){
        // alert(result);
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

