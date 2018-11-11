
<?php
require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();
class DbFunction{
	public static $limit=10;
	function login($loginid,$password){
	
      if(!ctype_alpha($loginid) || !ctype_alpha($password)){
      	
        echo "<script>alert('Either LoginId or Password is Missing')</script>";
      
      }		
   else{		
   
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT loginid, password FROM tbl_login where loginid=? and password=? ";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
		
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
		
		$stmt->bind_param('ss',$loginid,$password);
		$stmt->execute();
		$stmt -> bind_result($loginid,$password);
		$rs=$stmt->fetch();
		if(!$rs)
		{
			echo "<script>alert('Invalid Details')</script>";
			header('location:login.php');
		}
		else{
			
			header('location:dashboard.php');
		}
	}
	
	}
	
	}
	
	function create_client($cname,$cadd,$cphone,$cemail,$service,$sdate){
		
			

			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into tbl_clients(cname,cadd,cphone,cemail,service,sdate)values(?,?,?,?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ssisss',$cname,$cadd,$cphone,$cemail,$service,$sdate);
				$stmt->execute();
				echo "<script>alert('client Added Successfully')</script>";
					//header('location:login.php');
				
			}
						
	}

function showclients($start_from){
	$limit= DbFunction::$limit;
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM tbl_clients LIMIT $start_from,$limit ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}



function client_pagination(){
$limit= DbFunction::$limit;
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection(); 
	$sql = "SELECT count(cid) as 'c' FROM tbl_clients"; 
	$stmt= $mysqli->query($sql);
	$obj = $stmt->fetch_object();
 
$total_records = $obj->c;  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='?page=".$i."'>".$i."</a><li>";  
};  
echo $pagLink . "</div>"; 



}



function showclient1($cid){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM tbl_clients  where cid='".$cid."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}



function edit_client($cname,$cadd,$cphone,$cemail,$service,$sdate,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update tbl_clients set cname=?,cadd=?,cphone=?,cemail=?,service=?,sdate=? where cid=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('ssisssi',$cname,$cadd,$cphone,$cemail,$service,$sdate,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Client Updated Successfully")'; 
    echo '</script>';

}





function del_client($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from tbl_clients where cid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Client has been deleted')</script>";
    echo "<script>window.location.href='view-client.php'</script>";
}




}

?>



