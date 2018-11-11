

<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}

if(isset($_POST['submit'])){
	
	include('../config/DbFunction.php');
	$obj=new DbFunction();
	$obj->create_client($_POST['client_name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['service'],$_POST['sdate']);
	
}

?>
<?php include('header.php');?>

<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		<?php include('leftbar.php')?>;

<!--nav-->
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Add Client</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">
									
										<div class="form-group">
											<div class="col-lg-4">
					 <label>Client Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="client_name"  required="required">       
											</div>
											
										</div>	
										
								<br><br>
								<div class="form-group">
											<div class="col-lg-4">
					 <label>address<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <textarea class="form-control" name="address"  required="required" ></textarea>       
											</div>
											
										</div>	
										
								<br><br><br><br>
		<div class="form-group">
		<div class="col-lg-4">
		<label>Phone<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="phone"  required="required">         
					</div>
	 </div>	
										
	 <br><br>								
		<div class="form-group">
											<div class="col-lg-4">
					 <label>Email	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="email">       
											</div>
											
										</div>	
										
								<br><br>
								<div class="form-group">
											<div class="col-lg-4">
					 <label>Service<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="service" required="required" >       
											</div>
											
										</div>	
										
								<br><br>								
	<div class="form-group">
	<div class="col-lg-4">
	 <label>Service Date</label>
	</div>
	<div class="col-lg-6">
	<input class="form-control" value="<?php echo date('d-m-Y');?>" placeholder="dd-mm-yyyy" name="sdate">
	
	</div>
	</div>
	</div>	
										
		<br><br>		
		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
							<input type="submit" class="btn btn-primary" name="submit" value="Add Client"></button>
											</div>
											
										</div>		
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		

	</div>
	
	<script src="../bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	
</form>
</body>

</html>
