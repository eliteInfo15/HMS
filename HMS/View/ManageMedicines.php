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
         <a class="nav-link active" id="tab1" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-eye"></i> View Medicines</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" id="tab2" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-pencil"></i> Add Medicines</a>
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
            <th>Medicine Id</th>
            <th>Medicine name</th>
          
            
            <th>Options</th>
        </tr>
    </thead>
    <!--Table head-->

    <!--Table body-->
    <tbody>
      <?php $admin=new AdminController();
         $row=$admin->getAllMedicines();
              foreach ($row as $medicine_data) {
                ?>
                <tr class="text-center">
                  <td><?php echo $medicine_data['medicine_id']; ?></td>
                   <td><?php echo $medicine_data['medicine_name']; ?></td>
                 
                  
                  <td>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#centralModalDanger" onclick="remove_medicine_modal('Remove','<?php echo $medicine_data['medicine_id'];?>')" >Remove</a></td>
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
        <input type="text" class="form-control" name="mname" id="mname">
        <label for="mname">Medicine Name</label>
       
  </div>
        </div>
             
        </div>
    
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="add-instructor" value="Add Medicine" class="btn_login waves-effect">
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
            <p class="heading lead">Added</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>

        <!--Body-->
        <div class="modal-body">
            <div class="text-center">
                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                <h3>Medicine added successfully</h3>
                
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            
            <a type="button" class="btn btn-outline-success waves-effect" href="ManageMedicines.php">OK</a>
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
                 <input type="text" name="remove_medicine" id="modal-input-delete" style="display: none;" >
              </div>
             
             <div class="md-form">
               <button type="submit" name="removeMedicine" class="btn btn-danger">Remove <i class="fa fa-times ml-1"></i></button>
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
    function remove_medicine_modal(param1 ,param2)
{
  document.getElementById('modal-input-delete').value = param2;
  ;
  document.getElementById('heading').innerHTML = "Really want to remove ?";
  ;
  document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}
  </script>
  <script type="text/javascript">
   $(document).ready(function(){
      $( "#loginform" ).validate({
        rules: {
          
          mname: {
            required: true
          },
          year: {
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
          
          mname: {
            required: "Medicine name is required"
          },
          year:{
             required: "Year is required"
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
       
         var mname= $('#mname').val();
  
  
   
 // //("&firstName="+fname+"&lastName="+lname+"&city="+city+"&email="+email+"&mobile="+mobile+"&Rank="+Rank+"&dob="+dob+"&requestFor=addDoctor"+"&gender="+gender+"&department="+selected_departments+"&doj="+doj);
 
   var datastring="mname="+mname+"&addMedicine="+"yes";
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