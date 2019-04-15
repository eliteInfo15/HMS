<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="shub_style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="compiled.css">

  <script type="text/javascript" src="jquery.js"></script>
  <style type="text/css">
  	#tab_text{
  		color:white;
  	}
  </style>
</head>
<body style="overflow-x: hidden;">
	
<div class="row" >
	<div class="col-lg-12">
		<div class="col-lg-2" style="float: left; ">


			<div class="sidebar-fixed " style="max-width: 200px; min-width: 200px;">

      <a class="logo-wrapper waves-effect">
<!--         <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt=""> -->
      </a>

      <div class="list-group list-group-flush">
        <button  class="list-group-item active waves-effect" id="admin_btn">
          <i class="fas fa-chart-pie mr-3"></i>Admin Home

        </button>	
        <a href="#" class="list-group-item list-group-item-action waves-effect" id="doctor_btn">
          <i class="fas fa-user mr-3"></i>Doctors</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Tables</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map mr-3"></i>Maps</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a>
      </div>
  		</div>


		</div>

		<div class="col-lg-10" style="float: left; padding-top: 25px;">












				<div class="col-lg-12 show_admin_home" >


	<div class="col-xl-3 col-md-6  small_tabs" style="float: left;">

            <!-- Card Primary -->
            <div class="card classic-admin-card primary-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="fas fa-user-md icon_white"></i>
                </div>
                <p class="white-text">DOCTORS</p>
                
              </div>
             <button type="button" class="btn btn-rounded waves-effect doctor_tab_btn">Manage Doctors</button>
              <div class="card-body">
                <p id="tab_text">Here you can add,view or update doctors</p>
              </div>
            </div>
            <!-- Card Primary -->

          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">

            <!-- Card Primary -->
            <div class="card classic-admin-card warning-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="far fa-user icon_white"></i>
                </div>
                <p class="white-text">RECEPTIONIST</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect reception_tab_btn">Manage Receptionist</button>
              <div class="card-body">
                <p id="tab_text">Here you can manage receptionist</p>
              </div>
            </div>
            <!-- Card Primary -->

          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">

            <!-- Card Primary -->
            <div class="card classic-admin-card light-blue">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="fas fa-vials icon_white"></i>
                </div>
                <p class="white-text">PATHOLOGIST</p>
                
              </div>
             <button type="button" class="btn btn-rounded waves-effect pathologist_tab_btn">Manage Pathologist</button>
              <div class="card-body">
                <p id="tab_text">Here you can manage pathologist</p>
              </div>
            </div>
            <!-- Card Primary -->

          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">

            <!-- Card Primary -->
            <div class="card classic-admin-card danger-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="fas fa-hospital-alt icon_white"></i>
                </div>
                <p class="white-text">DEPARTMENTS</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect department_tab_btn">Manage Department</button>
              <div class="card-body">
                <p id="tab_text">Here you can manage department</p>
              </div>
            </div>
            <!-- Card Primary -->

          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">

            <!-- Card Primary -->
            <div class="card classic-admin-card danger-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                 <i class="fas fa-vial icon_white"></i>
                </div>
                <p class="white-text">TESTS</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect test_tab_btn">Manage Test</button>
              <div class="card-body">
                <p id="tab_text">Here you can add, remove or edit tests</p>
              </div>
            </div>
            <!-- Card Primary -->

          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">

            <!-- Card Primary -->
            <div class="card classic-admin-card danger-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="fas fa-male icon_white"></i>
                </div>
                <p class="white-text">ARMY PERSON</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect army_person_tab_btn">Manage Army Person</button>
              <div class="card-body">
                <p id="tab_text">Here you can add army people</p>
              </div>
            </div>
            <!-- Card Primary -->

          </div>


</div>




















			<div class="col-lg-12 show_doctor_div" >
					<ul class="nav nav-tabs nav-justified md-tabs indigo" id="myTabJust" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just"
      aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab-just" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just"
      aria-selected="false">Profile</a>
  </li>
  
</ul>
<div class="tab-content card pt-5" id="myTabContentJust">
  <div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
    	<div class="col-lg-12">
    		<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
    </tbody>
  </table>
</div>
    	</div>
  </div>
  <div class="tab-pane fade" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-just">
   
  		<div class="col-lg-12">
  			<!-- Material form login -->
<div class="card" style="margin: 0px 200px;">

  <h5 class="card-header info-color white-text text-center py-4">
    <strong>Sign in</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center" style="color: #757575;">

      <!-- Email -->
      <div class="md-form">
        <input type="email" id="materialLoginFormEmail" class="form-control">
        <label for="materialLoginFormEmail">E-mail</label>
      </div>

      <!-- Password -->
      <div class="md-form">
        <input type="password" id="materialLoginFormPassword" class="form-control">
        <label for="materialLoginFormPassword">Password</label>
      </div>

      <div class="d-flex justify-content-around">
        <div>
          <!-- Remember me -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
            <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
          </div>
        </div>
        <div>
          <!-- Forgot password -->
          <a href="">Forgot password?</a>
        </div>
      </div>

      <!-- Sign in button -->
      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

      <!-- Register -->
      <p>Not a member?
        <a href="">Register</a>
      </p>

      <!-- Social login -->
      <p>or sign in with:</p>
      <a type="button" class="btn-floating btn-fb btn-sm">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a type="button" class="btn-floating btn-tw btn-sm">
        <i class="fab fa-twitter"></i>
      </a>
      <a type="button" class="btn-floating btn-li btn-sm">
        <i class="fab fa-linkedin-in"></i>
      </a>
      <a type="button" class="btn-floating btn-git btn-sm">
        <i class="fab fa-github"></i>
      </a>

    </form>
    <!-- Form -->

  </div>

</div>
<!-- Material form login -->
  		</div>

  </div>
 
</div>

					</div></div>


	</div>
</div>

<!-- <div class="col-lg-12 show_admin_home" >


	<div class="col-xl-3 col-md-6  small_tabs" style="float: left;">


            <div class="card classic-admin-card primary-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="fas fa-user-md icon_white"></i>
                </div>
                <p class="white-text">DOCTORS</p>
                
              </div>
             <button type="button" class="btn btn-rounded waves-effect doctor_tab_btn">Manage Doctors</button>
              <div class="card-body">
                <p id="tab_text">Here you can add,view or update doctors</p>
              </div>
            </div>


          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">


            <div class="card classic-admin-card warning-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="far fa-money-bill-alt icon_white"></i>
                </div>
                <p class="white-text">RECEPTIONIST</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect reception_tab_btn">Manage Receptionist</button>
              <div class="card-body">
                <p id="tab_text">Here you can manage receptionist</p>
              </div>
            </div>


          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">


            <div class="card classic-admin-card light-blue">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="far fa-money-bill-alt icon_white"></i>
                </div>
                <p class="white-text">PATHOLOGIST</p>
                
              </div>
             <button type="button" class="btn btn-rounded waves-effect pathologist_tab_btn">Manage Pathologist</button>
              <div class="card-body">
                <p id="tab_text">Here you can manage pathologist</p>
              </div>
            </div>


          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">


            <div class="card classic-admin-card danger-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="far fa-money-bill-alt icon_white"></i>
                </div>
                <p class="white-text">DEPARTMENTS</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect department_tab_btn">Manage Departments</button>
              <div class="card-body">
                <p id="tab_text">Here you can manage department</p>
              </div>
            </div>


          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">


            <div class="card classic-admin-card danger-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="far fa-money-bill-alt icon_white"></i>
                </div>
                <p class="white-text">TESTS</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect test_tab_btn">Manage Test</button>
              <div class="card-body">
                <p id="tab_text">Here you can add, remove or edit tests</p>
              </div>
            </div>


          </div>

          <div class="col-xl-3 col-md-6  small_tabs" style="float: left;">


            <div class="card classic-admin-card danger-color">
              <div class="card-body">
                <div class="pull-right" style="float: right;">
                  <i class="far fa-money-bill-alt icon_white"></i>
                </div>
                <p class="white-text">ARMY PERSON</p>
                
              </div>
              <button type="button" class="btn btn-rounded waves-effect army_person_tab_btn">Manage Army Person</button>
              <div class="card-body">
                <p id="tab_text">Here you can add army people</p>
              </div>
            </div>


          </div>


</div> -->
	


</body>
    <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

  		$('.show_doctor_div').hide();
  		$('#admin_btn').click(function(){
  			$('.show_admin_home').show();
  			$('.show_doctor_div').hide();
  			$('#doctor_btn').css({"background-color":"white","color":"black"});
  			$('#admin_btn').css({"background-color":"#007bff","color":"white"});
  		});

  		$('#doctor_btn').click(function(){
  			$('.show_doctor_div').show();
  			$('.show_admin_home').hide();
  			$('#doctor_btn').css({"background-color":"#007bff","color":"white"});
  			$('#admin_btn').css({"background-color":"white","color":"black"});

  		});

  })

	  

  		  /*		$('.show_doctor_div').click(function(){
  			$('.show_doctor_div').show();
  		});*/

	
</script>

</body>

</html>
