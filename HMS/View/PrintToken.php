<?php

if (isset($_GET)) {
   $token=$_GET["token"]; 
    $army_no=$_GET["army_no"]; 
     $department=$_GET["department"]; 
      $date=$_GET["date"]; 
      $relation=$_GET["relation"]; 
      $fname=$_GET["fname"]; 
      $lname=$_GET["lname"]; 
      $doctor=$_GET["doctor"];
}

?>
<html>
    <head>
        <title>Print Token</title>
    </head>
    <body>
        <h2>TOKEN NO. : <?php echo $token ?></h2>
        <h3>Army NO. :<?php echo $army_no ?></h3> 
        <h3>Name : <?php echo $fname." ".$lname ?></h3> 
        <h3>Relation : <?php echo $relation ?></h3> 
        <h3>Department : <?php echo $department ?></h3> 
        <h3>Date : <?php echo $date ?></h3> 
        <h3>Doctor: <?php echo $doctor ?></h3>
        
    </body>
</html>