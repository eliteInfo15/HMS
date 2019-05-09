<?php
session_start();

   if (isset($_SESSION["armyNumberSession"]) && isset($_SESSION["roleSession"])) {
  
       if ($_SESSION["roleSession"]!="doctor") {
          header('location:Login.php');
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
   
<?php //require_once 'NavigationBar.php'; 

$doctorArmyNo=$_GET["doctorId"];
?>


<div class="container" style="margin-top: 40px; margin-bottom: 40px;background-color: white">

<!-- Nav tabs -->
 
 <!-- Tab panels -->

     <!--Panel 1-->
     
     <!--/.Panel 1-->
     <!--Panel 2-->
     
         <br>
         <div class="row">
         	<div class="col-lg-8" style="margin: 10px auto">
         		<!-- Form -->
    <form class="" style="color: #3F51B5;" id="loginform" method="post">
        <div class="row">
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-pencil prefix"></i>
        <input type="password" class="form-control" name="currentPassword" id="currentPassword">
        <label for="currentPassword">Current Password</label>
       
  </div>
        </div>
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-pencil prefix"></i>
       <input type="password" class="form-control" name="newPassword" id="newPassword">
        <label for="newPassword">New Password</label>
       
  </div>
        </div>
        </div>
        <div class="row">
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-pencil prefix"></i>
       <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
        <label for="confirmPassword">Confirm Password</label>
       
  </div>
        </div>
        </div>
    
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="add-instructor" value="Change Password" class="btn_login waves-effect">
</div>
   </form>
         	</div>
         </div>
   
     <!--/.Panel 2-->
     
	

</div> 


<!-- Central Modal Medium Success -->
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="heading lead">Changed</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                <h3>Password changed successfully</h3>
                
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
<!-- Central Modal Medium Success-->
<!-- Central Modal Medium Danger -->
  <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger" role="document">
      <!--Content-->
      <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
              <p class="heading lead">Incorrect Password</p>
  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="white-text">&times;</span>
              </button>
          </div>
  
          <!--Body-->
          <div class="modal-body">
              <div class="text-center">
                <h4 id="heading">Please enter valid Password</h4>
                 
              </div>
          </div>
  
          <!--Footer-->
     
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
   $(document).ready(function(){
      $( "#loginform" ).validate({
        rules: {
          
          currentPassword: {
            required: true
          },
          newPassword: {
            required: true
          },

          confirmPassword:{
            required:true,
            equalTo : "#newPassword"
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
          
          currentPassword: {
            required: "Password is required"
          },
          newPassword:{
             required: "Password is required"
          },
          confirmPassword: {
            required: "Password is required",
            equalTo : "Password must be same"
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
       
         var currentPassword= $('#currentPassword').val();
   var newPassword= $('#newPassword').val();
  
   
 // //("&firstName="+fname+"&lastName="+lname+"&city="+city+"&email="+email+"&mobile="+mobile+"&Rank="+Rank+"&dob="+dob+"&requestFor=addDoctor"+"&gender="+gender+"&department="+selected_departments+"&doj="+doj);
 
   var datastring="currentPassword="+currentPassword+"&newPassword="+newPassword+"&doctorId="+"<?php echo $_SESSION["armyNumberSession"];?>"+"&changePassword=yes";
     $.ajax({
      type:"POST",
      url:"../Controller/DoctorController.php",
      data:datastring,
      success:function(result){
           var res=parseInt(result);
           if (res===0) {
   $('#centralModalDanger').modal('show');  
} else {
   $('#centralModalSuccess').modal('show');  
}
           
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
