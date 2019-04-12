<tbody>
      <?php
      
      $p=new PathologistController();
         $row=$p->getPatientsForTest();
         
        // var_dump($row->fetchAll(PDO::FETCH_ASSOC));
         
         
              foreach ($row as $patient_data) {
                  
                ?>
        
                <tr class="text-center">
                   
                  <td><?php echo $patient_data['army_no']; ?></td>
                  <td><?php echo $patient_data['rank']; ?></td>
                   <td><?php echo $patient_data['fname'].' '.$patient_data['lname']; ?></td>
                   <td><?php echo $patient_data["relation_fname"].' '.$patient_data["relation_lname"] ?></td>
                  <td><?php echo $patient_data['relation']; ?></td>
                  <td><?php 
                  $age= date_diff(date_create($patient_data['relation_date_of_birth']), date_create('today'))->y;
                  echo $age; ?></td>
                  <?php $n=$p->countTestApplicants($patient_data['patient_id'],$patient_data['test_id']);?>
                   <td><?php echo $patient_data['blood_group']; ?></td>
                    <td><?php echo $patient_data['drank'].' '.$patient_data['dfname'].' '.$patient_data['dlname']; ?></td>
                     <td><?php echo $patient_data['test_name'].' '.$n; ?></td>
                    
                    <?php
                    
                    if(!is_null($patient_data["approval"])){
                       ?>
                     <td><a href="TakeTest.php?n=<?php echo $n ?>&army_no=<?php echo $patient_data['army_no'] ?>&patient_id=<?php echo $patient_data["patient_id"]?>&test_id=<?php echo $patient_data["test_id"]?>&pathologist_army_no=<?php echo $_SESSION["armyNumberSession"]?>&patient_gender=<?php echo $patient_data["relation_gender"]?>&test_name=<?php echo $patient_data["test_name"]?>&patient_name=<?php echo $patient_data["relation_fname"].' '.$patient_data["relation_lname"]?>&age=<?php echo date_diff(date_create($patient_data['relation_date_of_birth']), date_create('today'))->y?>&relation=<?php echo $patient_data["relation"]?>&serving_name=<?php echo $patient_data['fname'].' '.$patient_data['lname']?>&person_id=<?php echo $patient_data['person_id']; ?>" class="btn btn-danger btn-sm <?php if($n>0) {echo 'disabled'; } ?>" target="new" <?php if($n>0){ echo 'data-toggle="tooltip"'; } ?> >ReTest</a></td>
           
                     <?php
                     
                    }
                    else{
                            if($n>0){
                                ?>
                     <td>
                        
                         <div class="loader" data-toggle="tooltip" title="wait for OIC response" data-placement="right"></div>
                         
                     </td>
                     
                     <?php
                                
                            }
                            else{
                                ?>
                      <td><a href="TakeTest.php?n=<?php echo $n ?>&army_no=<?php echo $patient_data['army_no'] ?>&patient_id=<?php echo $patient_data["patient_id"]?>&test_id=<?php echo $patient_data["test_id"]?>&pathologist_army_no=<?php echo $_SESSION["armyNumberSession"]?>&patient_gender=<?php echo $patient_data["relation_gender"]?>&test_name=<?php echo $patient_data["test_name"]?>&patient_name=<?php echo $patient_data["relation_fname"].' '.$patient_data["relation_lname"]?>&age=<?php echo date_diff(date_create($patient_data['relation_date_of_birth']), date_create('today'))->y?>&relation=<?php echo $patient_data["relation"]?>&serving_name=<?php echo $patient_data['fname'].' '.$patient_data['lname']?>&person_id=<?php echo $patient_data['person_id']; ?>" class="btn btn-success btn-sm" target="new"    >Take Test</a></td>
            
                     <?php
                                
                            }
                       
                    }
                    
                    ?>
                  
                         </tr>
                <?php
              }

       ?>
    </tbody>
    <!--Table body-->
