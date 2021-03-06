<?php
ob_start();
session_start();
if($_SESSION['name']!='snchousebd')
{
header('location: index.php');
}
?>	

	<!--banner-->
<?php include("header.php");?>
         
<?php include_once("config.php");?>

	<!--banner-->
	<div class="row">        
        <div class="col-md-3"style="margin-top:3px;">
		   <?php 
		   include("left_sidebar.php");
		   ?>
		</div>
		<div class="col-md-9" style="margin-top:15px;">
		
		
		<h2 style="margin-bottom:10px;">Doctor Information</h2>
		<div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										   <th>Doctor ID</th>
                                            <th>Doctor Name</th>
											<th>Degrees</th>
                                            <th>Contact Number</th>
											<th>Email</th>
                                            <th>Type</th>
											<th>Department</th>
                                            <th>National ID</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>	
									<?php 
											$statement1 = $db->prepare("SELECT * FROM doctor_details");
										    $statement1->execute();
										     $result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result1 as $row1)
						                   {
											   
											   
											   
											$statement2 = $db->prepare("SELECT * FROM employee_details where e_id=?");
										    $statement2->execute(array($row1['employee_id']));
										     $result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
						                    foreach( $result2 as $row2)
						                   {
										?>
										
									           
									
                                        <tr class="odd gradeX">
										
							
                                            <td class="center"><?php echo $row1['doctor_id']; ?></td>
                                            <td class="center"><?php echo $row2['e_name']; ?></td>
											<td class="center"><?php echo $row1['doctor_qualification']; ?></td>
                                            <td class="center"><?php echo $row2['e_contact_no']; ?></td>
											<td class="center"><?php echo $row2['e_email_id']; ?></td>
                                            <td class="center"><?php echo $row1['doctor_type']; ?></td>
											<td class="center">
											
											
											<?php
											            $statement3 = $db->prepare("SELECT dept_name FROM departments where dept_id=?");
										                $statement3->execute(array($row1['department']));
														$result3 = $statement3->fetch();
														  
														  echo $result3['dept_name'];
											
											
											?>
											
											</td>
                                            <td class="center"><?php echo $row2['e_nid']; ?></td>
											
											<td>
										      <div class="btn-group-sm">
											  <a class="btn btn-primary fancybox" href="#inline<?php echo $row1['doctor_id'];?>" title="view" ><i class="glyphicon glyphicon-asterisk"></i></a>
											  <!--Fancy Box-->
													  
											<div id="inline<?php echo $row1['doctor_id'];?>" style="display:none;width:700px;margin:10px 30px">
											<h3 style= "border-bottom: 2px solid #295498; color:#0C86AC;margin-bottom:10px;" ><strong>Doctor Details &nbsp;</strong> <?php echo $row2['e_name']; ?></h3>	
											<img src="images/doctors_image/<?php echo $row2['e_image'];?>" width="450" height="400"><br>	
											<strong>Doctor's ID :</strong><p><?php echo $row1['doctor_id']; ?></p>
											<strong>Qualifications </strong><p><?php echo $row1['doctor_qualification']; ?></p>
                                            <strong>Contact Number</strong></p><?php echo $row2['e_contact_no']; ?></p>
											<strong>Email</strong><p><?php echo $row2['e_email_id']; ?></p>
											<strong>Sex</strong><p><?php echo $row2['e_sex']; ?></p>
											<strong>Department</strong><p><?php echo $result3['dept_name']; ?></p>
											<strong>Type</strong><p><?php echo $row1['doctor_type']; ?></p>
                                            <strong>National ID </strong> <p><?php echo $row2['e_nid']; ?></p>
											<img src="images/doctors_nid/<?php echo $row2['e_nid_image'];?>" width="450" height="400">	
									
										
														
														
													  </div>
													  <!--Fancy box End-->
											  

											  <a class="btn btn-success" href="edit_doctor.php?eid=<?php echo $row2['e_id']; ?>&did=<?php echo $row1['doctor_id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
										
											  
											  
											  
                                              </div>
                                            </td>
                                        </tr>
                                        
                                        <?php
										        }
										   }
										   ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
		
		
		
		
		
		
		</div>
     </div>
	
<?php include_once("footer.php");?>