<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>
<?php include  ('sentmail.php'); ?>
	
<!-- result -->
<?php 
	$doc_id = isset($_GET['doc_id'])?$_GET['doc_id']:"";
	
 ?>
				<!-- fetching doctor info -->
					<?php 
					include('../config.php');
					

							$sql="SELECT * FROM doctor WHERE doc_id = $doc_id ";

							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row  = $result->fetch_assoc()) {
							        $doc_id   = $row["doc_id"];
							        $name 	= $row["name"];
							        $expertise 	= $row["expertise"];
							        $email 	= $row["email"];
							        $fee = $row["fee"];
									 $userid = $row["userid"];
							    }
							}
							
							$conn->close();

					?>
					<!-- fetching doctor info -->

	<!-- 	booking info-->
		<div class="login" style="background-color:#fff;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Book Appoinment</h3>
			<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
				<form action="" method="post" class="text-center form-group" enctype="multipath/form-data">
					

					<label>
						Dr. Name: <input type="text" name="dname" value="<?php echo $name; ?>" >
					</label><br><br>

 					<label>
						E-mail: <input type="text" name="demail" value="<?php echo $email; ?>" />
					</label><br><br>
 					
					<label>
						Category: <input type="text" name="expertise" value="<?php echo $expertise; ?>" >
					</label><br><br>

					<label>
						Fee(Tk): <input type="text" name="fee" value="<?php echo $fee; ?>" >
					</label><br><br>
					<label>
						Your Name: <input type="text" name="pname" value="">
					</label><br><br>
 					<label>
						 Contact: <input type="text" name="pcontact" value=""/>
					</label><br><br>
					<label>
						E-mail: <input type="email" name="pemail" value=""/>
					</label><br><br>
 					
					<label>
						 Address: <input type="text" name="address" value="">
					</label><br><br>
					<label>
						 Date: <input type="date" name="dates" value="">
					</label><br><br>
					<label>
						 Time: <select name="time" required>
										<option value="">-select-</option>
										<option value="9.00am-10.00am">09.00am-10.00am</option>
									<option value="10.00am-11.00am">10.00am-11.00am</option>
									<option value="11.00am-12.00pm">11.00am-12.00pm</option>
									<option value="12.00pm-01.00pm">12.00pm-01.00pm</option>
									<option value="03.00pm-04.00pm">03.00pm-04.00pm</option>
									<option value="04.00pm-05.00pm">04.00pm-05.00pm</option>
									<option value="05.00pm-06.00pm">05.00pm-06.00pm</option>
									<option value="07.00pm-08.00pm">07.00pm-08.00pm</option>
									<option value="08.00pm-09.00pm">08.00pm-09.00pm</option>
									</select>
					</label><br><br>
					<label>
						 Payment: <select name="payment" required>
										<option value="">-select-</option>
										<option value="Rocket">Rocket</option>
										<option value="bKask">bKask</option>
									</select>
					</label><br><br>
					<label>
						  <input type="hidden" name="userid" value="<?php echo $userid; ?>">
					</label><br><br>
					
					
					<button name="submit" type="submit" style="padding-right:5px;border-radius:3px;margin-right:;">Confirm</button> 
					<a href="search_doctor.php"><button name="" type="" style="padding-right:5px;border-radius:3px;margin-right:-150px;">Cancel</button></a> <br>


				</form> <br><br>

			</div>
	
	
		</div>
				<!-- 	booking info-->
				
			<!-- confirming booking -->
					<?php

						include('../config.php');
						if(isset($_POST['submit'])){
							

						$sql = " INSERT INTO booking (dname,userid,dcontact,expertise,fee, pname,pcontact,email,address,dates,tyme,payment)
							VALUES ('" . $_POST["dname"] . "','" . $_POST["userid"] . "','" . $_POST["demail"] . "','" . $_POST["expertise"] . "', '" . $_POST["fee"] . "','" . $_POST["pname"] . "','". $_POST["pcontact"] . "','". $_POST["pemail"] . "','". $_POST["address"] . "','". $_POST["dates"] . "','". $_POST["time"] . "','". $_POST["payment"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('Your booking has been accepted!');</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>";
							}

							$conn->close();
						}
					?> 

				<!-- confirming booking -->

	
	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 


	
</body>
</html>
