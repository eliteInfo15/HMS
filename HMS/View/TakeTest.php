<?php session_start();
  $armyNo=$_GET["army_no"];
   $patientId=$_GET["patient_id"];
   $test_id=$_GET["test_id"];
    $pathologistArmyNo=$_GET["pathologist_army_no"];
     $patientGender=$_GET["patient_gender"];
       $testName=$_GET["test_name"];
         $patientName=$_GET["patient_name"];
          $relation=$_GET["relation"];
          $age=$_GET["age"];
          $serving_name=$_GET["serving_name"];
          $personId=$_GET["person_id"];
   if (isset($_SESSION["armyNumberSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="pathologist") {
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
 require_once '../Controller/PathologistController.php';
 $p=new PathologistController();
 $bloodGroup=$p->getPatientBloodGroup($personId);
?>

<main id="dash1" class="smooth" style="padding-top: 0px;padding-left: 0px">
    <div class="row" style="background: white">
        <div class="container text-center" style="margin-top: 30px;">
            <h2>Take Test</h2>
        </div>
         	<div class="col-lg-8" style="margin: 30px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="loginform" method="post">
        <input type="text" id="patientNo" name="patientNo" style="display: none" value="<?php  echo $patientId ?>">
        <input type="text" id="testId" name="testId" style="display: none" value="<?php  echo $test_id ?>">
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
         <input type="text" class="form-control" name="serving_name" id="serving_name" readonly="" value="<?php echo $serving_name ?>">
        <label for="serving_name">Serving Person Name</label>
       
  </div>
            </div>
        </div>
        <div class="row gender-container" id="relations">
            
        </div>
      <div class="row">
        
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" id="patient_name" class="form-control" name="patient_name" readonly="" value="<?php echo $patientName ?>">
         <label for="patient_name" style="margin-top: -24px;">Patient Name</label>
        
  </div>
        </div>
       <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="relation" id="relation" readonly="" value="<?php echo $relation?>">
        <label for="relation" style="margin-top: -24px;">Relation</label>
       
  </div>
        </div>
      </div>
      <!-- Email -->
      

      <!-- Password -->
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="age" id="age" readonly="" value="<?php echo $age?>">
        <label for="age" style="margin-top: -24px;">Age</label>
       
  </div>

        </div>
        <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="pathologist_army_no" id="pathologist_army_no" readonly="" value="<?php echo $pathologistArmyNo?>">
        <label for="pathologist_army_no" style="margin-top: -24px">Pathologist</label>
       
  </div>
        </div>
      </div>
  
      <div class="row">
           <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="test" id="test" readonly="" value="<?php echo $testName?>">
        <label for="test" style="margin-top: -24px">Test </label>
       
  </div>
        </div>
          <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
         <input type="text" class="form-control" name="blood_group" id="blood_group" readonly="" value="<?php echo $bloodGroup?>">
        <label for="blood_group" style="margin-top: -24px">Patient blood group </label>
       
  </div>
        </div>
      </div>
    
      <div class="row">
                    <?php $pathologist=new PathologistController();
                           $testData=$pathologist->getTestById($test_id);
                           $data=$testData[0];
                           
                           for ($i = 0; $i< count($testData); $i++) {
                               $testName=$testData[$i]["test_name"];
                                $testId=$testData[$i]["test_id"];
                                
                                ?>
                 
                     
                     <?php 
                     
                      $attributes=$testData[$i]["attributes"];
                     
                      $count=1;
                                foreach ($attributes as $attribute){
                                    
                                    for ($j = 0; $j < count($attribute)-1; $j++) {
                                        ?>
          <div class="col-lg-6" style="padding: 10px;margin-bottom: 20px;">
                     <div class="md-form" role="alert">
                          <i class="fa fa-pencil prefix"></i>
                          <input type="text" class="form-control <?php echo 'attribute'.($count)?>" name="<?php echo 'attribute'.($count)?>" id="<?php echo $attribute["attribute_id"]?>" >
        <label for="<?php echo $attribute["attribute_id"]?>" style="margin-top: -24px;font-size: 12px"><?php  echo strtoupper($attribute["attribute_name"]); ?> </label>
     
</div>
                 </div>
                     <?php
                                      
                                    }
                                    $count++;
                                }
                                ?>
          <input type="text" name="num" id="num" value="<?php echo $count-1?>" style="display: none">
          <?php
                     
                     ?>
                     
                 
                 <?php
                               
                                echo '<br>';
                           }
                                 
                          
                  ?>
      </div>
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="add-instructor" value="Send for approval" class="btn_login waves-effect">
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
            
            <a type="button" class="btn btn-outline-success waves-effect" href="OtherPathologistHome.php">OK</a>
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
   
  
   
 // alert("&firstName="+fname+"&lastName="+lname+"&city="+city+"&email="+email+"&mobile="+mobile+"&Rank="+Rank+"&dob="+dob+"&requestFor=addDoctor"+"&gender="+gender+"&department="+selected_departments+"&doj="+doj);
 
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
            attribute1:{
            required:true  
          },
          attribute2:{
            required:true  
          },
          attribute3:{
            required:true  
          },
          attribute4:{
            required:true  
          },
          attribute5:{
            required:true  
          },
          attribute6:{
            required:true  
          },
          attribute7:{
            required:true  
          },
          attribute8:{
            required:true  
          },
          attribute9:{
            required:true  
          },
          attribute10:{
            required:true  
          },
          attribute11:{
            required:true  
          },
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
            attribute1:{
            required:"This attribute is required"
          },
          attribute2:{
            required:"This attribute is required"
          },
          attribute3:{
            required:"This attribute is required"
          },
          attribute4:{
            required:"This attribute is required"
          },
          attribute5:{
            required:"This attribute is required"
          },
          attribute6:{
            required:"This attribute is required"
          },
          attribute7:{
            required:"This attribute is required"
          },
          attribute8:{
            required:"This attribute is required"
          },
          attribute9:{
            required:"This attribute is required" 
          },
          attribute10:{
            required:"This attribute is required" 
          },
          attribute11:{
            required:"This attribute is required" 
          },
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
      
        $('#centralModalSuccess').modal('show'); 
          var patient_id= $("#patientNo").val();
          var test_id= $("#testId").val();
        var pathologistArmyNo= $("#pathologist_army_no").val();
        var numOfAttribute= $("#num").val();
        var num=parseInt(numOfAttribute);
        
        var test_result=new Array();
        for (var i = 1; i <=num; i++) {
            
           var element= document.getElementsByClassName("attribute"+i);
           
             var testResult={
            "attribute_id":$(element[0]).attr("id"),
            "value":$(element[0]).val()
        };
    test_result.push(testResult);
}
 var testData= JSON.stringify(test_result);
     var datastring="patient_id="+patient_id+"&test_id="+test_id+"&pathologistArmyNo="+pathologistArmyNo+"&testResultJson="+testData+"&addTempResult=yes";
     console.log(datastring);
  
        $.ajax({
      type:"POST",
      url:"../Controller/PathologistController.php",
      data:datastring,
      success:function(result){
        
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

