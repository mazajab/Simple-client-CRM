<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
} 
   
    include('../config/DbFunction.php');


	if(isset($_GET['del']))
    {
           
          $obj->del_client(intval($_GET['del']));
          
       
  }



 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$limit = DbFunction::$limit;  
$start_from = ($page-1) * $limit; 
$obj=new DbFunction();
$rs=$obj->showclients($start_from);
  
 


?> 

<?php include('header.php');?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
     <?php include('leftbar.php')?>;

           
         <nav>
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
                        <div class="panel-heading">
                            View Clients
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client name</th>
                                            <th>Client Address</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Service</th>
                                            <th>Service Date</th>
                                            <th>operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                         $sn=1;
                                     while($res=$rs->fetch_object()){?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo $sn?></td>
                                            <td><?php echo htmlentities( strtoupper($res->cname));?></td>
                                            <td><?php echo htmlentities(strtoupper($res->cadd));?></td>
                                            <td><?php echo htmlentities($res->cphone);?></td>
                                            <td><?php echo htmlentities($res->cemail);?></td>
                                            <td><?php echo htmlentities(strtoupper($res->service));?></td>
                                            <td><?php echo htmlentities($res->sdate);?></td>
                                             <td>&nbsp;&nbsp;<a href="edit-client.php?cid=<?php echo htmlentities($res->cid);?>"><p class="fa fa-edit"></p></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                             <a href="view-client.php?del=<?php echo htmlentities($res->cid); ?>"> <p class="fa fa-times-circle"></p></a></td>
                                            
                                        </tr>
                                        
                                    <?php $sn++;}?>   	           
                                    </tbody>
                                </table>
                               <?php
                               $obj2=new DbFunction();
                               $rs2=$obj2->client_pagination();
                               echo $rs2;
                                 ?>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

   <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"
        type="text/javascript"></script>
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
        type="text/javascript"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

   

</body>

</html>
