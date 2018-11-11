

<?php
session_start ();
include('../config/DbFunction.php');
 $obj=new DbFunction();
if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}

    $id=$_GET['cid'];
   
    $rs=$obj->showclient1($id);
    $res=$rs->fetch_object(); 

if(isset($_POST['submit'])){
	
	 // echo  $id=$_GET['cid'];exit;
		
	$obj->edit_client($_POST['client_name'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['service'],$_POST['sdate'],$id);
	
}

?>
<?php include('header.php');?>
<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		<?php include('leftbar.php')?>;


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
						<div class="panel-heading">Edit Client</div>
						<div class="panel-body">
							<div class="row">
						 <div class="col-lg-10">
									
										<div class="form-group">
											<div class="col-lg-4">
					 <label>Client Name<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="client_name" value="<?php echo $res->cname; ?>" required="required">       
											</div>
											
										</div>	
										
								<br><br>
								<div class="form-group">
											<div class="col-lg-4">
					 <label>address<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <textarea class="form-control" name="address"  required="required"><?php echo $res->cadd; ?></textarea>       
											</div>
											
										</div>	
										
								<br><br><br><br>
		<div class="form-group">
		<div class="col-lg-4">
		<label>Phone<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="phone"  required="required" value="<?php echo $res->cphone; ?>">         
					</div>
	 </div>	
										
	 <br><br>								
		<div class="form-group">
											<div class="col-lg-4">
					 <label>Email	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="email" value="<?php echo $res->cemail; ?>">       
											</div>
											
										</div>	
										
								<br><br>
								<div class="form-group">
											<div class="col-lg-4">
					 <label>Service<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
			
  <input class="form-control" name="service" required="required" value="<?php echo $res->service; ?>">       
											</div>
											
										</div>	
										
								<br><br>								
	<div class="form-group">
	<div class="col-lg-4">
	 <label>Service Date</label>
	</div>
	<div class="col-lg-6">
	<input class="form-control" value="<?php echo $res->sdate; ?>" placeholder="dd-mm-yyyy" name="sdate">
	
	</div>
	</div>
	</div>	
										
		<br><br>		
		
							<div class="form-group">
											<div class="col-lg-4">
												
											</div>
											<div class="col-lg-6"><br><br>
							<input type="submit" class="btn btn-primary" name="submit" value="Update Client"></button>
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
	
	
	
	
</form>
<script src="../bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
</body>

</html>
