<?php session_start();
require_once '../Controller/PathologistController.php';
   if (isset($_SESSION["armyNumberSession"]) && isset($_SESSION["roleSession"])) {
  $p=new PathologistController();
           $prole=$p->getPathologistRole($_SESSION["armyNumberSession"]);
       if ($_SESSION["roleSession"]!="pathologist") {
         
              header('location:Login.php'); 
            }
             else{
                if ($prole!="other") {
                    header('location:Login.php'); 
                }
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
      	.loader {
                margin: 0px auto;
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
            <a class="navbar-brand" href="OtherPathologistHome.php" style="color: black;"><img src="images/icon.png" style="width: 50px;height: 50px">  Hospital Management System</a>
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
                             <a href="ChangePathologistPassword.php?pathologistId=<?php echo $_SESSION["armyNumberSession"];?>" class="btn indigo btn-rounded btn-md my-2 my-sm-0 ml-3" style="color: white"><i class="fa fa-pencil" style="font-size: 15px"></i> Change Password</a> 
                                </li>
                        
                    </ul>
                </div>
            </nav>

    </header>
   
<?php //require_once 'NavigationBar.php'; 
 require_once '../Controller/PathologistController.php';
 /*$doctorArmyNo=$_SESSION["armyNumberSession"];
 $doctor=new DoctorController();
 $deptData=$doctor->getDepartmentByDoctor($doctorArmyNo);
 
 $deptIdArray=array();
 while($data=$deptData->fetch(PDO::FETCH_ASSOC)) {
     $did=(int)$data["did"];
     array_push($deptIdArray, $did);
}*/
?>

<main id="dash1" class="smooth" style="padding-top: 0px;padding-left: 0px">
    <div class="row" style="background: white">
        <div class="container text-center" style="margin-top: 30px;">
            <h2>Take Test</h2>
        </div>
         	<div class="col-lg-8" style="margin: 30px auto">
         	
                    <table class="table" style="width:1055px" >

    <!--Table head-->
    <thead style="background: #0D47A1" align="center">
        <tr class="text-white">
            
            <th>Army No.</th>
            <th>Rank</th>
            <th>Name</th>
            <th>Patient Name</th>
             <th>Relation</th>
            <th>Age</th>
            <th>Blood group</th>
           
            <th>Doctor Name</th>
           <th>Test</th>
            
            
            
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->
    <tbody id="mytable">
        
    </tbody>
    <!--Table body-->
    
</table>
    
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
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" >
  $(document).ready(function(){
      $(function () {
$('[data-toggle="tooltip"]').tooltip();
});
  });
  </script>
  <script>
  function countApplicants(patientId,testId) {
      var n;
       var datastring="patient_id="+patientId+"&test_id="+testId+"&countTestApplicants=yes";
                    
                    $.ajax({
      type:"POST",
      async: false,
      url:"../Controller/PathologistController.php",
      data:datastring,
      success:function(result){
         
       n=result;
         
      }
     });
    
     return n;
}
  </script>
  
  <script type="text/javascript" >
  $(document).ready(function(){
     (function worker() {
       
        var datastring="getPatients=yes";
  $.ajax({
      type:"POST",
    url: '../Controller/PathologistController.php', 
    data:datastring,
    success: function(data) {
        console.log(data);
       var obj= JSON.parse(data);
     console.log(obj);
       if(data){
                var len = obj.length;
                var txt = "";
                if(len > 0){
                    
                    for(var i=0;i<len;i++){
                        console.log("data for "+i);
                        console.log(obj[i]);
                  var n= countApplicants(obj[i].patient_id,obj[i].test_id);
                       console.log("apps="+n);   
                        var dob=obj[i].relation_date_of_birth;
          dob=  new Date(dob);
           var ageDifMs = Date.now() -dob.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
   var age= Math.abs(ageDate.getUTCFullYear() - 1970);
  var url='TakeTest.php?army_no='+obj[i].army_no+'&patient_id='+obj[i].patient_id+'&test_id='+obj[i].test_id+'&pathologist_army_no='+'<?php echo $_SESSION["armyNumberSession"]?>'+'&patient_gender='+obj[i].relation_gender+'&test_name='+obj[i].test_name+'&patient_name='+obj[i].relation_fname+' '+obj[i].relation_lname+'&age='+age+'&relation='+obj[i].relation+'&serving_name='+obj[i].fname+' '+obj[i].lname+'&person_id='+obj[i].person_id;
   if(obj[i].approval!==null){
   var optionTd="<td><a href='"+url+"' class='btn btn-sm btn-danger' target='new'>Retest</a></td>";
    } 
    else{
         
     //console.log("n="+window.n);
    
     if(n>0){
         
          var optionTd="<td><div class='loader' data-toggle='tooltip' title='wait for OIC response' data-placement='right'></div></td>";
    
     }
     else{
       var optionTd="<td><a href='"+url+"' class='btn btn-sm btn-success' target='new'>Take test</a></td>";
       
     }
           }
    txt += "<tr class='text-center'><td>"+obj[i].army_no+"</td><td>"+obj[i].rank+"</td><td>"+obj[i].fname+' '+obj[i].lname+"</td><td>"+obj[i].relation_fname+' '+obj[i].relation_lname+"</td><td>"+obj[i].relation+"</td><td>"+age+"</td><td>"+obj[i].blood_group+"</td><td>"+obj[i].drank+' '+obj[i].dfname+' '+obj[i].lname+"</td><td>"+obj[i].test_name+"</td>"+optionTd+"</tr>";
                      
                    }
                     console.log("data end"); 
                    if(txt != ""){
                       $("#mytable").empty().append(txt);
                    }
                }
            }
        //alert("hello");
    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(worker, 3000);
    }
  });
})();
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