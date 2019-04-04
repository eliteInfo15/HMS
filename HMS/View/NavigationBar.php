<style type="text/css">
.label-danger {
    background-color: #d9534f;
}
.dropdown-toggle::after{
	display: none;
}
.dropdown-menu {
	position: absolute;
	left: -245px !important;
}
.white-skin .navbar .navbar-nav .nav-item .dropdown-menu a:hover{
	color: white !important;
	background: #3f51b5!important;
}
.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}

</style>
<!--Main Navigation-->
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
   
                        	
    <!--Main Navigation-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
    	/*$(document).ready(function(){
    		var datastring="viewnotifications=yes";
    		$.ajax({
 
  url:"../Controller/NotificationController.php",
  method:"POST",
  data:datastring,
  success:function(data)
  {
    var menu=document.getElementById('dropdown-menu');
    menu.style.width="300px";
   //alert(data);
   var notification_data=JSON.parse(data);
   n=notification_data.number;
   var notifications=notification_data.notifications;
console.log(notification_data);
   if (n>0) {
   	$('.count').show();
   	$('.count').html(n);
     for (var i = 0; i < notifications.length; i++) {
     	li=document.createElement('li');
     	li.style.marginTop="12px";
     	anchor=document.createElement('a');
     	anchor.href="updateInstructor.php?instructor_id="+notifications[i].instructor_id;
     	anchor.innerHTML=notifications[i].instructor_id+" requested to update ";
     	li.appendChild(anchor);
     	menu.appendChild(li);
     }
   	
    
   }
   else{
   	li=document.createElement('li');
     	li.style.marginTop="12px";
     	li.innerHTML="No notifications";
     	menu.appendChild(li);
   }
  }
 
 });
    		
    	});
    	*/
    </script>