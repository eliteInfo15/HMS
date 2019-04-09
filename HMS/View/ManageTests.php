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
   
<?php //require_once 'NavigationBar.php'; 
 require_once '../Controller/AdminController.php';?>


<div class="container" style="margin-top: 40px; margin-bottom: 40px;background-color: white">

<!-- Nav tabs -->
 <ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" id="tab1" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-eye"></i> View Tests</a>
     </li> 
     <li class="nav-item">
         <a class="nav-link" id="tab2" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-pencil"></i> Add Test</a>
     </li>
    
 </ul>
 <!-- Tab panels -->
 <div class="tab-content">
     <!--Panel 1-->
     <div class="tab-pane fade in show active" id="panel5" role="tabpanel" aria-labelledby="tab1">
         <br>
         <div class="container">
             <div class="row">
                  <?php $admin=new AdminController();
                           $testData=$admin->getAllTestsData();
                           $data=$testData[0];
                           //var_dump($data);
                           for ($i = 0; $i< count($testData); $i++) {
                               $testName=$testData[$i]["test_name"];
                                $testId=$testData[$i]["test_id"];
                                
                                ?>
                 <div class="col-lg-3 z-depth-1 text-center" style="padding: 10px;margin-bottom: 20px;">
                     <h4><?php echo strtoupper($testName);?></h4>
                     <?php 
                     
                      $attributes=$testData[$i]["attributes"];
                                foreach ($attributes as $attribute){
                                    for ($j = 0; $j < count($attribute); $j++) {
                                        ?>
                     <div class="alert alert-danger" role="alert">
     <?php  echo strtoupper($attribute["attribute_name"]); ?>
</div>
                     <?php
                                      
                                    }
                                }
                     
                     ?>
                     <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#centralModalDanger" onclick="remove_test_modal('Remove','<?php echo $testId;?>','<?php echo $testName;?>')" >Remove</a></td>
            
                 </div>
                 <?php
                               
                                echo '<br>';
                           }
                                 
                          
                  ?>
             </div>
         </div>
     </div>
     <!--/.Panel 1-->
     <!--Panel 2-->
     <div class="tab-pane fade" id="panel6" role="tabpanel" aria-labelledby="tab2">
         <br>
         <div class="row">
         	<div class="col-lg-8" style="margin: 10px auto">
         		<!-- Form -->
                        <form class="" style="color: #3F51B5;" id="testform" method="post" action="../Controller/AdminController.php">
        <div class="row">
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="tname" id="tname">
        <label for="tname">Test Name</label>
       
  </div>
        </div>
             <div class="col-lg-6">
           <div class="md-form">
         
         <i class="fa fa-user prefix"></i>
        <input type="text" class="form-control" name="num" id="num" onkeyup="addFields()">
        <label for="num">No. of attributes</label>
       
  </div>
        </div>
        </div>
        <div class="row " id="attribute-fields">
            
        </div>
     
<div class="md-form  col-lg-3 offset-md-4">
	 
      <input type="submit" name="addTest" value="Add Test" class="btn_login waves-effect">
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
                <h3>Department registered successfully</h3>
                
            </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            
            <a type="button" class="btn btn-outline-success waves-effect" href="ManageDepartment.php">OK</a>
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
                 <input type="text" name="test_id" id="modal-input-delete" style="display: none;" >
              </div>
             
             <div class="md-form">
               <button type="submit" name="removeTest" class="btn btn-danger">Remove <i class="fa fa-times ml-1"></i></button>
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
  <script>
   function addFields(){
            var number = document.getElementById("num").value;
            var container = document.getElementById("attribute-fields");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                //container.appendChild(document.createTextNode("Member " + (i+1)));
                var div_container = document.createElement("div");
                div_container.classList.add("md-form");
                div_container.style.marginRight="10px";
                while (div_container.hasChildNodes()) {
                div_container.removeChild(div_container.lastChild);
            }
               // div_container.class="md-form";
                 container.appendChild(div_container);
                 var icon = document.createElement("i"); 
                 icon.classList.add("fa");
                 icon.className+=" fa-book prefix";
                 div_container.appendChild(icon);
                var input = document.createElement("input");
                 
                input.type = "text";
                input.required="";
                input.name="attribute"+(i+1);
                input.id="attribute"+(i+1);
                input.class="form-control"; 
                div_container.appendChild(input);
                var label = document.createElement("label");
                 label.htmlFor="attribute"+(i+1);
                 label.innerHTML="Attribute ";
                 label.style.top="0px";
                 div_container.appendChild(label);
                //container.appendChild(document.createElement("br"));
                
            }
        }
  </script>
  <script type="text/javascript">
 function remove_test_modal(param1 ,param2, param3)
{
  document.getElementById('modal-input-delete').value = param2;
  ;
  document.getElementById('heading').innerHTML = "Really want to remove "+param3+" test ?";
  ;
  document.getElementById('modal-tablesLabel_question').innerHTML = param1.replace("_"," ");
}
  </script>
  <script type="text/javascript">
   $(document).ready(function(){
      $( "#testform" ).validate({
        rules: {
          tname: {
            required: true
          },
          attribute1: {
            required: true
          },
          attribute2: {
            required: true
          },
          attribute3: {
            required: true
          },
          attribute4: {
            required: true
          },
          attribute5: {
            required: true
          },
          attribute6: {
            required: true
          },
          attribute7: {
            required: true
          },
          attribute8: {
            required: true
          },
          attribute9: {
            required: true
          },
          attribute10: {
            required: true
          },
          attribute11: {
            required: true
          },
          attribute12: {
            required: true
          },
          attribute13: {
            required: true
          },
          attribute14: {
            required: true
          },
          attribute15: {
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
          tname: {
            required: "Test name is required"
          },
          attribute1: {
            required: "Attribute  required"
          },
          attribute2: {
            required: "Attribute required"
          },
          attribute3: {
            required: "Attribute required"
          },
          attribute4: {
            required: "Attribute required"
          },
          attribute5: {
            required: "Attribute required"
          },
          attribute6: {
            required: "Attribute required"
          },
          attribute7: {
            required: "Attribute required"
          },
          attribute8: {
            required: "Attribute required"
          },
          attribute9: {
            required: "Attribute required"
          },
          attribute10: {
            required: "Attribute required"
          },
          attribute11: {
            required: "Attribute name is required"
          },
          attribute12: {
            required: "Attribute name is required"
          },
          attribute13: {
            required: "Attribute name is required"
          },
          attribute14: {
            required: "Attribute name is required"
          },
          attribute15: {
            required: "Attribute name is required"
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