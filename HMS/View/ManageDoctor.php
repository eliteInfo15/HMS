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

require '../Controller/AdminController.php';

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>HMS</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
 	<!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  
  <style type="text/css">
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

.scrollable{
    height: 200px; overflow-y: scroll;
}

  </style>
</head>
<body class="fixed-sn white-skin" data-gr-c-s-loaded="true" style="background:#eee;">
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
   
<?php //require_once 'NavigationBar.php'; ?>


<div class="container" style="margin-top: 40px; margin-bottom: 40px;background-color: white">

<!-- Nav tabs -->
 <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" id="tab1" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-eye"></i> View Doctors</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" id="tab2" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-pencil"></i> Add Doctor</a>
     </li>
    
 </ul>
 <!-- Tab panels -->
 <div class="tab-content">
     <!--Panel 1-->
     <div class="tab-pane fade in show active" id="panel5" role="tabpanel" aria-labelledby="tab1">
         <br>
           <table class="table">

    <!--Table head-->
    <thead style="background: #0D47A1" align="center">
        <tr class="text-white">
            <th>Army No.</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Mobile</th>
            <th>Gender</th>
             <th>Email</th>
             <th>Rank</th>
             <th>Joining Date</th>
             <th>Date of birth</th>
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      <?php $admin=new AdminController();
         $row=$admin->getAllDoctors();
              foreach ($row as $doctor_data) {
                ?>
                <tr class="text-center">
                  <td><?php echo $doctor_data['doctor_army_no']; ?></td>
                   <td><?php echo $doctor_data['dfname']; ?></td>
                  <td><?php echo $doctor_data['dlname']; ?></td>
                  <td><?php echo $doctor_data['mobile_no']; ?></td>
                  <td><?php echo $doctor_data['gender']; ?></td>
                  <td><?php echo $doctor_data['email']; ?></td>
                   <td><?php echo $doctor_data['drank']; ?></td>
                   <td><?php echo $doctor_data['joining_date']; ?></td>
                   <td><?php echo $doctor_data['date_of_birth']; ?></td>
                  <td>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#centralModalDanger" onclick="remove_doctor_modal('Remove','<?php echo $doctor_data['doctor_army_no'];?>')" >Remove</a></td>
                </tr>
                <?php
              }

       ?>
    </tbody>
    <!--Table body-->

</table>
     </div>
     <!--/.Panel 1-->
     <!--Panel 2-->
     <div class="tab-pane fade" id="panel6" role="tabpanel" aria-labelledby="tab2">
         <br>
         <div class="row">
         	<div class="col-lg-8" style="margin: 10px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="loginform" method="post">
        <div class="row">
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="army_no" id="army_no">
        <label for="army_no">Army Number</label>
       
  </div>
        </div>
           
        </div>
        <div class="row">
            <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="previousDoctor" id="previousDoctor">
        <label for="previousDoctor">Previous Doctor Name</label>
       
           </div>
        </div>
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="previousDoctorRank" id="previousDoctorRank">
        <label for="previousDoctorRank">Previous Doctor Rank</label>
       
           </div>
        </div>
        </div>
      <div class="row">
        
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-key prefix"></i>
        <input type="password" id="password-field" class="form-control" name="password" data-toggle="password">
        <label for="password-field" style="margin-top: -25px;">Password</label>
        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password side-align"></span>
  </div>
        </div>
       <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="Rank" id="Rank">
        <label for="Rank">Rank</label>
       
  </div>
        </div>
      </div>
      <!-- Email -->
      

      <!-- Password -->
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="fname" id="fname">
        <label for="fname">First Name</label>
       
  </div>

        </div>
        <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="lname" id="lname">
        <label for="lname">Last Name</label>
       
  </div>
        </div>
      </div>
  
  <div class="row">
    <div class="col-lg-6">
      <div class="md-form">
         
         <i class="fa fa-envelope prefix"></i>
        <input type="text" class="form-control" name="email" id="email">
        <label for="email">Email</label>
       
  </div>
    </div>
    <div class="col-lg-6">
      <div class="md-form">
         
         <i class="fa fa-phone prefix"></i>
        <input type="text" class="form-control" name="mobile" id="mobile">
        <label for="mobile">Mobile</label>
       
  </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-6">
      <div class="md-form">
         
        <i class="fa fa-calendar prefix"></i>
        <input type="date" class="form-control" name="doj" id="doj" value="">
        <label for="doj" style="margin-top: -24px">Date of Joining</label>
       
  </div>
    </div>
    <div class="col-lg-6">
      <div class="md-form">
         
         <i class="fa fa-calendar prefix"></i>
        <input type="date" class="form-control" name="dob" id="dob" value="">
        <label for="dob" style="margin-top: -24px">Date of birth</label>
       
  </div>
    </div>
  </div>
  
 <div class="row gender-container">
  <div class="col-lg-6">
      <div class="md-form">
     <div class="custom-control custom-radio custom-control-inline" style="margin-right: 3rem;">
  <input type="radio" class="custom-control-input" id="maleRb" name="gender" value="male" checked>
  <label class="custom-control-label hand_cursor" for="maleRb">Male</label>
</div>

<!-- Default inline 2-->
<div class="custom-control custom-radio custom-control-inline" style="margin-right: 3rem;">
  <input type="radio" class="custom-control-input" id="femaleRb" name="gender" value="female" >
  <label class="custom-control-label hand_cursor" for="femaleRb">Female</label>
</div>
   </div>
  </div>
 
   
 </div>
  <div class="scrollable">
           <div class="row">
    <?php 
    $department=new AdminController();
    $department_data=$department->getAllDepartments();
    $i=1;
       foreach ($department_data as $key => $value) {
               
         ?>

        
      <div class="form-check col-lg-4">
    <input type="checkbox" class="form-check-input subjects" id="<?php echo "department".$i ?>" name="department[]" value="<?php echo $value['did'] ?>">
    <label class="form-check-label" for="<?php echo "department".$i ?>"><?php echo $value["dname"]; ?></label>
</div>
    
         <?php
       $i++;
       }
     ?>
                    
      </div> 
   
  </div>
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="add-instructor" value="Add Doctor" class="btn_login waves-effect">
</div>
   </form>
         	</div>
         </div>
     </div>
     <!--/.Panel 2-->
     
 </div>	

</div> 


<!-- Central Modal Medium Success -->
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
                <h3>Doctor registered successfully</h3>
                
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            
            <a type="button" class="btn btn-outline-success waves-effect" href="ManageDoctor.php">OK</a>
        </div>
    </div>
    <!--/.Content-->
</div>
</div>
<!-- Central Modal Medium Success-->
<!-- Central Modal Medium Danger -->
  <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger" role="document">
      <!--Content-->
      <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
              <p class="heading lead">Confirmation</p>
  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
              </button>
          </div>
  
          <!--Body-->
          <div class="modal-body">
              <div class="text-center">
                <h4 id="heading"></h4>
                 
              </div>
          </div>
  
          <!--Footer-->
          <div class="modal-footer justify-content-center">
            <form method="post" id="deleteForm" action="../Controller/AdminController.php">
              <div class="md-form">
                 <input type="text" name="remove_army_no" id="modal-input-delete" style="display: none;" >
              </div>
             
             <div class="md-form">
               <button type="submit" name="removeDoctor" class="btn btn-danger">Remove <i class="fa fa-times ml-1"></i></button>
             </div>
                
              
              

            </form>
            
          
          </div>
      </div>
      <!--/.Content-->
  </div>
  </div>
  <!-- Central Modal Medium Danger-->


<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/compiled.min.js"></script>
 
  <script type="text/javascript" src="js/jquery.validate.js"></script>
     <script type="text/javascript">
       $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
   </script>
  <script>
      function randomPassword(length) {
    var chars = "abcdefghijklmnpqrstuvwxyz@%KLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}
  </script>
  <script>
  $(document).ready(function(){
      var password=randomPassword(8);
      $("#password-field").val(password);
  });
  </script>
  <script type="text/javascript">
    function remove_doctor_modal(param1 ,param2)
{
  document.getElementById('modal-input-delete').value = param2;
  ;
  document.getElementById('heading').innerHTML = "Really want to remove "+param2+"?";
  ;
  document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}
  </script>
  <script type="text/javascript">
   $(document).ready(function(){
       $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Incorrect mobile no."
);
      $( "#loginform" ).validate({
        rules: {
          
          army_no: {
            required: true
          },
          previousDoctor: {
            required: true
          },
          previousDoctorRank: {
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
            required:true,
            regex:"^([a-zA-Z0-9_\\-\\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
          },
          mobile:{
            required:true,
            regex:"^[6789][0-9]{9}$"
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
          previousDoctor: {
            required: "This value is required"
          },
          previousDoctorRank: {
            required: "This value is required"
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
            required: "Email is required",
            regex:"Incorrect email value"
          },
          mobile: {
            required: "Mobile is required",
            regex:"Incorrect Mobile number"
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
       
         var army_no= $('#army_no').val();
   var password= $('#password-field').val();
   var fname=$('#fname').val();
   var lname=$('#lname').val();
   var doj=$('#doj').val();
   var email=$('#email').val();
   var mobile=$('#mobile').val();
   var Rank=$('#Rank').val();
   var dob=$('#dob').val();
   var previousDoctor=$('#previousDoctor').val();
   var previousDoctorRank=$('#previousDoctorRank').val();
   var role="doctor";
  var selected_departments=new Array();
  $(".subjects:checked").each(function() {
           selected_departments.push($(this).val());
        });
   var gender=$('input[name=gender]:checked', '#loginform').val(); 
 // //("&firstName="+fname+"&lastName="+lname+"&city="+city+"&email="+email+"&mobile="+mobile+"&Rank="+Rank+"&dob="+dob+"&requestFor=addDoctor"+"&gender="+gender+"&department="+selected_departments+"&doj="+doj);
 
   var datastring="army_no="+army_no+"&previousDoctor="+previousDoctor+"&previousDoctorRank="+previousDoctorRank+"&role="+role+"&password="+password+"&firstName="+fname+"&lastName="+lname+"&email="+email+"&mobile="+mobile+"&rank="+Rank+"&dob="+dob+"&requestFor=addDoctor"+"&gender="+gender+"&did="+selected_departments+"&doj="+doj;

     $.ajax({
      type:"POST",
      url:"../Controller/AdminController.php",
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
   <script type="text/javascript">
/*       $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});*/
   </script>
   
</body>
</html>