<?php
require_once "../model/Symposia.php";
require_once "../view/Forms.php";
require_once "menu.php";
require_once "helpers.php";
require_once "mailer.php";
require_once "../view/header.php";
require_once "../view/yourtasks.php";
function Contact(){
$forms = new Forms();
  return $forms->Contact();
//return "Returned from Ajax Contat...";
}
function Login($loginType="Author"){
//return Message("Will be available soon","alert-warning");
//return "Hello";
session_start();
$_SESSION["logintype"]=$loginType;
$forms = new Forms();
  return $forms->Login($loginType);
}
function Signup(){
if(!EnableMenuItem("Signup"))
return Message("Will be available soon.","alert-warning");
$forms = new Forms();
  return $forms->Signup();
}

function my_function() {
  // Your function logic here
  $data = array("Hello", "Ha ha aha d");
  return json_encode(array("data" => implode(" ", $data)));
}
function UpdateStatus(){
	session_start();
	$obj = new DB();
	$remarks=$_POST["remarks"];
	$status=$_POST["decision"];
	$filename=$_POST["filename"];
	$uname=$_SESSION["username"];
	//$query = "update contributions set remarks='".$remarks."', status='".$status."' where Filename='".$filename."'";
	$query = "update refereeAllotment set remarks='".$remarks."', marks='".$status."' where Filename='".$filename."' and refereeName='".$uname."'";

	//return $query;
	$result = $obj->GetQueryResult($query);
	/*if($result === false){
	return MessageAutoClose("Update failed....","alert-danger");
	}
	$result->free();*/
	return MessageAutoClose("Status updated....","alert-warning");
}
function UpdateStatus_Old(){
	$obj = new DB();
	$remarks=$_POST["remarks"];
	$status=$_POST["decision"];
	$filename=$_POST["filename"];
	$query = "update contributions set remarks='".$remarks."', status='".$status."' where Filename='".$filename."'";
	$result = $obj->GetQueryResult($query);
	return MessageAutoClose("Status updated....","alert-warning");
}


function Upload(){
	session_start();
	//return "FileUplaoded...";
	//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//echo $_FILES['file']."<br/>";
	//echo $_FILES['file']['error']."<br/>";
	//return;
	if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
		        $targetDirectory = $_POST['loc']; // Specify the target directory where the file will be saved
			$categoryId = $_POST['categoryid'];
			$topicId = $_POST['topicid'];
			$authorNamesList=$_POST['authornameslist'];
			$authorEmailsList=$_POST['authoremailslist'];
			//echo $targetDirectory."<br/>";
			//echo basename($_FILES['file']['name'])."<br/>";

			//select count(*) as count from contributions where Filename like '%paper_3_1%'			
				$obj = new DB();
		                //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
                		//$obj->Connect();

			$query='select count(*) as count from contributions where Filename like "%paper_'.$topicId.'_'.$categoryId.'%"';
				$result=$obj->GetQueryResult($query);
				if($result===false)
				return Message("Query execution fails","alert-danger");
				$row = $result->fetch_assoc();
				$count=$row["count"];
				$count++;
			$renamedFileName=$_SESSION["username"].'_paper_'.$topicId.'_'.$categoryId.'_'.$count.'.pdf';
			//$targetFilePath = $targetDirectory . basename($_FILES['file']['name']); // Get the file path
			$targetFilePath = $targetDirectory.$renamedFileName; // Get the file path
			//echo "Taget file path :".$targetFilePath."<br/>";
			if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
				//echo 'File uploaded successfully.<br/>';
				$query='insert into contributions values("'.$_SESSION["username"].'","'.$topicId.'","'.$categoryId.'","'.$_POST["title"].'","'.$renamedFileName.'","submitted","'.$authorNamesList.'","'.$authorEmailsList.'","","")';
				//echo $query."<br/>";
								$obj->GetQueryResult($query);
$body="Dear ".$_SESSION["username"].", 

Your have successfully submitted your paper $renamedFileName 
You can view your paper in View_Contribution link.";


                SendMail("submission",$_SESSION["email"],"NASI 2023 : Contribution submitted",$body);

				$result->free();
				return Message("File uploaded successfully with name : $renamedFileName","alert-success");
			} else {
			        echo Message('Error uploading the file.','alert-danger');
									        }
	} else {
		echo Message('No file uploaded.','alert-danger');
		}

	//}
}

function ResubmitUpload(){
	session_start();
	//return "FileUplaoded...";
	//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//echo $_FILES['file']."<br/>";
	//echo $_FILES['file']['error']."<br/>";
	//return;
	if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
		        $targetDirectory = $_POST['loc']; // Specify the target directory where the file will be saved
			$categoryId = $_POST['categoryid'];
			$topicId = $_POST['topicid'];
			$authorNamesList=$_POST['authornameslist'];
			$authorEmailsList=$_POST['authoremailslist'];
			$actualFileName = $_POST['filename'];
			//echo $targetDirectory."<br/>";
			//echo basename($_FILES['file']['name'])."<br/>";

			//select count(*) as count from contributions where Filename like '%paper_3_1%'			
				$obj = new DB();
		                //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
                		//$obj->Connect();

			/*$query='select count(*) as count from contributions where Filename like "%paper_'.$topicId.'_'.$categoryId.'%"';
				$result=$obj->GetQueryResult($query);
				$row = $result->fetch_assoc();
				$count=$row["count"];
				$count++;*/
			//$renamedFileName=$_SESSION["username"].'_paper_'.$topicId.'_'.$categoryId.'_'.$count.'.pdf';
			//$targetFilePath = $targetDirectory . basename($_FILES['file']['name']); // Get the file path

			$renamedFileName = $actualFileName;
			$targetFilePath = $targetDirectory.$renamedFileName; // Get the file path
			//echo "Taget file path :".$targetFilePath."<br/>";
			if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
				//echo 'File uploaded successfully.<br/>';
				//$query='insert into contributions values("'.$_SESSION["username"].'","'.$topicId.'","'.$categoryId.'","'.$_POST["title"].'","'.$renamedFileName.'","submitted","'.$authorNamesList.'","'.$authorEmailsList.'","","")';

				$query = 'update contributions set Title="'.$_POST["title"].'" , AuthorNamesList="'.$authorNamesList.'" , AuthorEmailsList="'.$authorEmailsList.'" where FileName="'.$actualFileName.'"';
				//echo $query."<br/>";
				//return $query;
								$obj->GetQueryResult($query);
$body="Dear ".$_SESSION["username"].", 

Your have successfully resubmitted your paper $renamedFileName 
You can view your updated paper in View_Contribution link.";


		SendMail("resubmission",$_SESSION["email"],"NASI 2023 : Contribution Resubmitted",$body);

				return Message("File uploaded successfully with name : $renamedFileName","alert-success");
			} else {
			        echo Message('Error uploading the file.','alert-danger');
									        }
	} else {
		echo Message('No file uploaded.','alert-danger');
		}
	//}
}

function Delete(){
	$username=$_POST['username'];
	$tableName = $_POST['tablename'];
	$function_name = $_POST['function_name'];	
	$query = 'delete from '.$tableName.' where uname="'.$username.'"';
	echo $query."<br/>";
	$obj = new DB();
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
	$obj->GetQueryResult($query);
	return $obj->GetTableData($tableName);
}

function ShowTable(){
	$tableName = $_POST['tablename'];
	$obj = new DB();
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
	return $obj->GetTableData($tableName,1,1);
}

function ServeSignup(){
		$obj = new DB();
		//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
		//$obj->Connect();	
 		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query='select uname from user_credentials where uname="'.$username.'"';
		//$fetchedUname=GetQueryResult($query)->fetch_assoc()["uname"];
		//echo "Fetch uname : ".$fetchedUname."<br/>";
		if(GetQueryResult($query)->fetch_assoc()["uname"] == $username)
			return Message("Username : $username already exist.","alert-danger");
		
		$query='select email from user_credentials where email="'.$email.'"';
		if(GetQueryResult($query)->fetch_assoc()["email"] == $email)
			return Message("Email : $email already registered.","alert-danger");


		$query = "insert into user_credentials values('$username','$password','$firstname','$lastname','$email',NOW())";
//return $query;
		//echo $query."<br/>";
		$obj->GetQueryResult($query);
		/*$from= "newaccount";
		$to="sc.ramansehgal@gmail.com";
		$subject="Mail from NASI 2023";*/
		$body="Dear $firstname $lastname, 

Your Account is successfully created with following details:

username : $username 
password : $password

Your can use these credentials to do the registration and to upload your paper.";
		//SendMail($from,$to,$subject,$body);
	 	SendMail("newaccount",$email,"NASI 2023 : Account Created",$body);	
		//echo "$username : $password : $firstname : $lastname : $email";	
               //return "<div>ServeSignup function called..........</div><br/>".$_POST['firstname'];
		return Message("User account creation successful.","alert-success");
}
function AuthorLogin(){
//return EnableMenuItem("AuthorLogin");
if(!EnableMenuItem("AuthorLogin"))
return Message("Will be available soon.","alert-warning");

	//return "Author login";
	return Login();		
}

function RefereeLogin(){
if(!EnableMenuItem("RefereeLogin"))
return Message("Will be available soon.","alert-warning");

	return Login("Referee");
}

function AdminLogin(){
if(!EnableMenuItem("AdminLogin"))
return Message("Will be available soon.","alert-warning");

	return Login("Admin");
}
function CoordinatorLogin(){
if(!EnableMenuItem("CoordinatorLogin"))
return Message("Will be available soon.","alert-warning");

	return Login("Coordinator");
}

function ServeLogin(){
	session_start();
	$obj = new DB();
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
	
	$uname=$_POST["username"];
	$passwd=$_POST["password"];

        $tableToQuery="";
	if(isset($_SESSION["logintype"]) && $_SESSION["logintype"]=="Author")	
		$tableToQuery = "user_credentials";
	if(isset($_SESSION["logintype"]) && $_SESSION["logintype"]=="Referee")	
		$tableToQuery = "refereeList";
	if(isset($_SESSION["logintype"]) && $_SESSION["logintype"]=="Admin")	
		$tableToQuery = "admin_credentials";
	if(isset($_SESSION["logintype"]) && $_SESSION["logintype"]=="Coordinator")	
		$tableToQuery = "coordinatorList";

	$query = "select * from ".$tableToQuery." where uname='".$uname."'";
	//return $query;
	//return $uname;
	$result = $obj->GetQueryResult($query);
	if($result===false)
            return Message("Query execution fails","alert-danger");	
	$row = $result->fetch_assoc();
	//return "Hello Raman";
	//return $row["passwd"]." : ".$passwd;

	/*$js='<script>
                        var data={};
                        $("#logout").on("click","function(e){
                                e.preventDefault();
				alert("logout");
			});
		 </script>';*/
	$js='<script>
			/*//alert("Raw loaded............");
			$(function(){
			//	alert("JS loaded...");
				//if($("#hiddenInfo").attr("logintype")="Admin" &&
				if($("#hiddenInfo").attr("loggedin")="TRUE"){
					$("#YourTasks").show();
				}
			});*/

			var data={};
			$("#logout").click(function(e){
				alert("You are loggin out....");
				e.preventDefault();
				data["function_name"]="Logout";
				$.ajax({
				    url: "../controller/func.php",
				    method: "POST",
				    data : data,
				    success: function(response) {
				    $("#loginstatus").html(response);
				    $("#result").html("");
				    //$("#result").html("You have logged out successfully.");
					
				    }
				  });
					
			});
		</script>';
	$adCordJS = "<script>
					$(function(){
						//alert('Admin or Coorinator loggged in...');
					//if($('#hiddenInfo').attr('logintype')=='Admin' &&
					if( $('#hiddenInfo').attr('loggedin')=='1'){
					//$('#YourTasks').show();
					$('#YourTasks').removeClass('text-light');
                			$('#YourTasks').addClass('text-warning');
			                $('#YourTasks').addClass('text-bold');
			                $('#YourTasks').show();

				}

					});
				</script>";

	if($row["passwd"]==$passwd){
		$_SESSION["loggedin"]=TRUE;
		$_SESSION["username"]=$uname;
		$_SESSION["FirstName"]=$row["firstname"];
		$_SESSION["LastName"]=$row["lastname"];
		$_SESSION["Email"]=$row["email"];
		$result->free();
		//if($_SESSION["logintype"]=="Admin" && $_SESSION["loggedin"])
		if($_SESSION["loggedin"])
		echo '<input type="hidden" id="hiddenInfo" logintype="'.$_SESSION["logintype"].'" loggedin="'.$_SESSION["loggedin"].'" />';
		if($_SESSION["logintype"]=="Author")
		//return "<div><h3 class='alert alert-success' role='alert'> Welcome ".$_SESSION["logintype"]." : ".$uname."</h3><br/>";
		return '<h4><mark >Logged in as : '.$_SESSION["username"].'</mark> <input type="button" class="btn btn-custom btn-danger" id="logout" value="Logout"/></h4>'.$js ;

		if($_SESSION["logintype"]=="Referee"){

		$loginStatusMsg='<h4><mark >Logged in as : '.$_SESSION["username"].'</mark> <input type="button" class="btn btn-custom btn-danger" id="logout" value="Logout"/></h4>';
		$localJs = '<script>
				$(function(){

				$("#loginstatus").html("<h4><mark>Logged in as : '.
				$_SESSION["username"].'");
				});</script>';
				//'</mark><input type="button" class="btn btn-custom btn-danger" id="logout" value="Logout"/> </h4>")});</script>';	
				//$("#loginstatus").html('.$loginStatusMsg.')});
		return $localJs.$js." <div><h3 class='alert alert-success' role='alert'> Welcome ".$_SESSION["logintype"]." : ".$uname."</h3><br/>".$loginStatusMsg.'<br/>'.Referee_UpdatePaperStatus().$adCordJS;
		}
		if($_SESSION["logintype"]=="Admin"|| $_SESSION["logintype"]=="Coordinator"){
				return "<div><h3 class='alert alert-success' role='alert'> Welcome ".$_SESSION["logintype"]." : ".$uname."</h3><br/>".PopulateAllotment().$adCordJS;
		}

		//return "<div><h3 class='text-success'> Welcome User : ".$uname."</h3><br/>";
	}
	else
		return "<div><h3 class='alert alert-danger text-center' role='alert'> Authenication failure : Please check your credentials.</h3> <br/>";
		
}

function Council_Officers(){
	//return "Council Officers...";
	return "<h3 class='display text-primary'>Council Officers</h3><br/><table class='table table-striped table-bordered'>".ShowCommittee("CounOff")."</table>";
}
function Council_Members(){
	//return "Council Officers...";
	return "<h3 class='display text-primary'>Council Members</h3><br/><table class='table table-striped table-bordered'>".ShowCommittee("CounMem")."</table>";
}
function Organizing_Committee(){
	//return "Council Officers...";
	return "<h3 class='display text-primary'>Organizing Committee</h3><br/><table class='table table-striped table-bordered'>".ShowCommittee("OrgComm")."</table>";
}
function Advisory_Committee(){
	//return "Council Officers...";
	return "<h3 class='display text-primary'>Advisory Committee</h3><br/><table class='table table-striped table-bordered'>".ShowCommittee("AdvComm")."</table>";
}

function ShowCommittee($comm){

	$obj = new DB();
	//$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
	//$obj->Connect();
	$query = "select Name,Affiliation from ".$comm;
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");
	$table="<tr class='bg-dark text-light'><th>Name</th><th>Affiliation</th></tr>";

	while ($row = $result->fetch_assoc()) {
		if($row["Name"]==""){

		}else{
		 $table.= "<tr>";
		 $table.="<td>" . $row["Name"] . "</td>";
		 $table.="<td>" . $row["Affiliation"] . "</td>";
		 $table.="</tr>";
		}
	}
	$result->free();
	return $table;
}

function Upload_Contribution(){
if(!EnableMenuItem("Upload_Contribution"))
return Message("Will be available soon.","alert-warning");
	session_start();

	$obj = new DB();
	$query = "select contrib_start_date,contrib_end_date from symposium where volume=67";
	$result = $obj->GetQueryResult($query);
	$row = $result->fetch_assoc();
	$start_date = $row["contrib_start_date"];
	$end_date = $row["contrib_end_date"];

	$now = time();
	$start_time = GetStartTime($start_date);
	$end_time = GetEndTime($end_date);

	//return "Start time : $start_time : End Time : $end_time <br/>";

	if($now < $start_time)
	return Message("Contribution submission will start on ".date("d-M-Y",strtotime($start_date)), "alert-info");

	if($now > $end_time)
	return Message("Contribution submission Deadline crossed on ".date("d-M-Y",strtotime($end_date)).", Kindly contact Convener.", "alert-danger");
	
	$returnVal="";
	if(isset($_SESSION["loggedin"])){
		//return "Hello <br/>";
		//return "<h3 class='alert alert-success' role='alert'>Welcome user : ".$_SESSION["username"]."</h3><br/>";
		return NewSubmission();
		//return "Dear $_SESSION["username"], Please upload your Contribution <br/>";
	}
	else{
		return Message("Please login before uploading.");
		//return "<h3 class='alert alert-danger text-center' role='alert'>Please login before uploading.</h3><br/>";
	}
}

function Message($message,$colorClass="alert-danger"){
$msg="<h3 class='alert alert-dismissible fade show ".$colorClass." text-center' role='alert'>".$message."</h3><br/>";
$associatedJs = '<script>
		setTimeout(function(){
        $("refereeUpdateStatus").alert("close");
        },2000);
	</script>
	';
return $msg.$associatedJs;
}

function MessageAutoClose($message,$colorClass="alert-danger"){
return "<h3 class='alert auto-close ".$colorClass." text-center' role='alert'>".$message."</h3><br/>
<script>$('.alert-autoclose').delay(3000).fadeOut('slow');</script>
";

}



function NewSubmission(){
	$obj = new DB();
        //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
        //$obj->Connect();
	$fieldNames = $obj->GetFieldNames("contributions");
	//return count($fieldNames);

	$forms = new Forms();
	return $forms->NewSubmission($fieldNames);
}

function FillCategory(){
$tablename = $_POST["topic"];
return GetDropDown($tablename,"category").'
<script>
$(".category").on("click",function(event){
                        //alert("Category Clicked...");
			$("#categoryText").val($(this).attr("id"));
			dataUp.append("categoryid",$(this).attr("catid"));
                });
</script>
';
}
/*
function View_Contribution(){
return "Returned from View_Contribution...";
}
 */

function GetSubmitterName(){
	session_start();
	$obj = new DB();
	$query='select firstname,lastname from user_credentials where uname="'.$_SESSION["username"].'"';
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");
	$row=$result->fetch_assoc();
	$result->free();
	return $row["firstname"]." ".$row["lastname"];
}
function GetUploadFolderName($volume){
	session_start();
	$obj = new DB();
	$query='select UploadLocation from symposium where volume='.$volume;
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");
	$row=$result->fetch_assoc();
	$result->free();
	return $row["UploadLocation"];
}

function Resubmit_Contribution(){
if(!EnableMenuItem("Resubmit_Contribution"))
return Message("Will be available soon.","alert-warning");

	return Message("Will be available soon.","alert-warning");
}
function View_Contribution(){
if(!EnableMenuItem("View_Contribution"))
return Message("Will be available soon.","alert-warning");

	session_start();
	if(isset($_SESSION["loggedin"])){
	$submitterName = GetSubmitterName();
	$query = 'select * from contributions where uname="'.$_SESSION["username"].'" and status NOT IN ("Deleted")';
 	//return $query;	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");
	//return $query;
	
	$retValue="";
	$retTable='<table class="table table-striped table-bordered">';
	$retTable.='<tr><td>uname</th>
			<th>Name</th>
			<th>Title</th>
			<th>Topic</th>
			<th>Category</th>
			<th>Author names</th>
			<th>Author Emails</th>
			<th>Uploaded File</th>
			<th>Update/Resubmit</th>
			<th>Withdraw</th>
			</tr>';
	while($row = $result->fetch_assoc()){
		$retTable.='<tr>';
		//$retValue.=$row["Topic"]." : ".$row["Category"]."<br/>";
		//$retValue.="Hello <br/>";
		$paperTitle=$row["Title"];
		$authorNamesList=$row["AuthorNamesList"];
		$authorEmailsList=$row["AuthorEmailsList"];
		$fileName=$row["Filename"];
		$queryTopic=$row["Topic"];
		$queryCategory=$row["Category"];
		//$retValue.=GetTopic($queryTopic)." : ";
		//$retValue.=GetCategory($queryTopic,$queryCategory);
		$selectedTopic=GetTopic($queryTopic);
		$retValue.=$selectedTopic." : ";
		$selectedCategory=GetCategory($selectedTopic,$queryCategory);
		$retValue.=$selectedCategory;
		$retValue.="<br/>";
		$retTable.='<td>'.$_SESSION["username"].'</td>';
		$retTable.='<td>'.$submitterName.'</td>';
		$retTable.='<td>'.$paperTitle.'</td>';
		$retTable.='<td>'.$selectedTopic.'</td>';
		$retTable.='<td>'.$selectedCategory.'</td>';
		$retTable.='<td>'.$authorNamesList.'</td>';
		$retTable.='<td>'.$authorEmailsList.'</td>';
		$retTable.='<td><a href="../'.$_SESSION["uploadlocation"].'/'.$fileName.'">'.$fileName.'</a></td>';
		$retTable.='<td><input type="button" class="btn form-control resubmit btn-primary" value="Resubmit" uname="'.$_SESSION["username"].'" filename="'.$fileName.'" functionname="PopulateResubmissionForm"/></td>';
		$retTable.='<td><input type="button" id="delete" class="btn form-control withdraw btn-primary" value="Withdraw" uname="'.$_SESSION["username"].'" filename="'.$fileName.'" functionname="WithdrawContribution"/></td>';

		$retTable.='</tr>';

			
		//	return $retTable;//.=$associatedJs;

	}
	
	$result->free();

		$associatedJs='
			<script>
			$(".resubmit, .withdraw").on("click",function(event){
			//alert("Nasi Menu clicked.......");
			event.preventDefault();
			//alert($(this).attr("class"));
			var data={};
			var funcName=$(this).attr("functionname");
			//alert(funcName);
			data["function_name"]=funcName;
			data["filename"]=$(this).attr("filename");
			data["uname"]=$(this).attr("uname");
			//console.log(data);
			var okornot=true;
			if($(this).attr("id")=="delete")
				okornot = confirm("Are you sure you want to withdraw the paper.");
			if(okornot){
			$.ajax({
			    url: "../controller/func.php",
			    method: "POST",
			    data : data,
			    success: function(response) {
			    $("#result").html(response);
			    }
			  });
			}

		     });


		</script>
			';		

	//return $retValue;
	return $retTable.$associatedJs;
}else{

		return Message("Please login to view your submissions.");
}
	
}


function WithdrawContribution(){
	$fileName=$_POST["filename"];
	$query = 'update contributions set status="Deleted" where Filename="'.$fileName.'"';
	$obj = new DB();
	$obj->GetQueryResult($query);	
	return Message("Your paper is withdrawn.","alert-info");
}
function Referee_UpdatePaperStatus_Old(){
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	//return Message("Will be available soon.","alert-warning");
	session_start();
	if(isset($_SESSION["loggedin"])){
	//$submitterName = GetSubmitterName();
	//$query = 'select * from contributions where refereeName="'.$_SESSION["username"].'"';
	$query = 'select * from contributions where Filename in ( select Filename from refereeAllotment where refereeName="'.$_SESSION["username"].'")';
 	//return $query;	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
if($result===false)
                                return Message("Query execution fails","alert-danger");
	
	//return $query;
	
	$retValue="";
	$retTable='<table class="table table-striped table-bordered">';
	$retTable.='<tr><td>uname</th>
			<th>Title</th>
			<th>Topic</th>
			<th>Category</th>
			<th>Uploaded File</th>
			<th>Referee Remarks</th>
			<th>Referee Decision</th>
			<th>Update Status</th>
			</tr>';
	$decArray=array();
	$decArray["Decision"]=array("Oral","Poster","Rejected");
	while($row = $result->fetch_assoc()){
		$retTable.='<tr>';
		//$retValue.=$row["Topic"]." : ".$row["Category"]."<br/>";
		//$retValue.="Hello <br/>";
		$authorName=$row["uname"];
		$paperTitle=$row["Title"];
		$authorNamesList=$row["AuthorNamesList"];
		$authorEmailsList=$row["AuthorEmailsList"];
		$fileName=$row["Filename"];
		$queryTopic=$row["Topic"];
		$status=$row["status"];
		$remarks=$row["remarks"];
		$queryCategory=$row["Category"];

		$updateButtonId=preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
		

		//$retValue.=GetTopic($queryTopic)." : ";
		//$retValue.=GetCategory($queryTopic,$queryCategory);
		$selectedTopic=GetTopic($queryTopic);
		$retValue.=$selectedTopic." : ";
		$selectedCategory=GetCategory($selectedTopic,$queryCategory);
		$retValue.=$selectedCategory;
		$retValue.="<br/>";
		$retTable.='<td>'.$authorName.'</td>';
		//$retTable.='<td>'.$submitterName.'</td>';
		$retTable.='<td>'.$paperTitle.'</td>';
		$retTable.='<td>'.$selectedTopic.'</td>';
		$retTable.='<td>'.$selectedCategory.'</td>';
		$retTable.='<td><a href="../'.$_SESSION["uploadlocation"].'/'.$fileName.'">'.$fileName.'</a></td>';
		$retTable.='<td><textarea class="form-control" id="remarks_'.$updateButtonId.'">'.$remarks.'</textarea></td>';
		$retTable.='<td>'.AddDecisionEntries($decArray,"Decision",$updateButtonId,$status,$fileName).'
				<input type="text" id="decisionText_'.$updateButtonId.'" value="'.$status.'" class="form-control"/></td>';
		$retTable.='<td><input type="button" id="'.$updateButtonId.'" class="btn btn-primary updateDecision" value="Update" functionName="UpdateStatus"/></td>';
		$retTable.='</tr>';
	}
$result->free();
	$associatedJs='<script> 
			$(function(){
				$(".alert-autoclose").delay(5000).fadeOut("slow");
			});
			var functionName="";
			var data={};
			$(".updateDecision").click(function(e){

				
				e.preventDefault();
				//alert("MyID : "+$(this).attr("id"));
				var decisionTextId = "#decisionText_"+$(this).attr("id");
				var remarksTextId = "#remarks_"+$(this).attr("id");
				//alert($(decisionTextId).val());
				//alert($(remarksTextId).val());
				functionName=$(this).attr("functionName");
				data["function_name"]=functionName;
				data["remarks"]=$(remarksTextId).val();
				data["decision"]=$(decisionTextId).val();
				data["filename"]=$(this).attr("id")+".pdf";

				    $.ajax({
				    url: "../controller/func.php",
				    method: "POST",
				    data : data,
				    success: function(response) {
					//alert("response");
				    	$("#refereeUpdateStatus").html(response);
				    }
				    });

			});
			$(".Decision").click(function(e){
				e.preventDefault();
				var textBoxId="#decisionText_"+$(this).attr("buttonid");
				//alert(textBoxId);
				$(textBoxId).val($(this).attr("value"));
				$(textBoxId).attr("value",$(this).attr("value"));
				
			});

			
			</script>';
	//return $retValue;
	return $retTable.$associatedJs;
}else{

		return Message("Please login to view your submissions.");
}
	
}

function Referee_UpdatePaperStatus(){
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	//return Message("Will be available soon.","alert-warning");
	session_start();
	if(isset($_SESSION["loggedin"])){
	//$submitterName = GetSubmitterName();
	//$query = 'select * from contributions where refereeName="'.$_SESSION["username"].'"';
	//$query = 'select * from contributions where Filename in ( select Filename from refereeAllotment where refereeName="'.$_SESSION["username"].'")';
	$query = 'select contributions.uname, contributions.Title, contributions.Topic, contributions.Category,contributions.Filename, refereeAllotment.marks, refereeAllotment.remarks from contributions INNER JOIN refereeAllotment ON contributions.Filename=refereeAllotment.Filename where refereeAllotment.refereeName="'.$_SESSION["username"].'"';  	
//return $query;	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");

	//return $query;
	
	$retValue="";
	$retTable='<table class="table table-striped table-bordered">';
	$retTable.='<tr><th>uname</th>
			<th>Title</th>
			<th>Topic</th>
			<th>Category</th>
			<th>Uploaded File</th>
			<th>Referee Remarks</th>
			<th>Marks</th>
			<th>Update Status</th>
			</tr>';
	$decArray=array();
	$decArray["Decision"]=array("Oral","Poster","Rejected");
	while($row = $result->fetch_assoc()){
		$retTable.='<tr>';
		//$retValue.=$row["Topic"]." : ".$row["Category"]."<br/>";
		//$retValue.="Hello <br/>";
		$authorName=$row["uname"];
		$paperTitle=$row["Title"];
		$fileName=$row["Filename"];
		$queryTopic=$row["Topic"];
		$status=$row["marks"];
		$remarks=$row["remarks"];
		$queryCategory=$row["Category"];

		$updateButtonId=preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
		

		//$retValue.=GetTopic($queryTopic)." : ";
		//$retValue.=GetCategory($queryTopic,$queryCategory);
		$selectedTopic=GetTopic($queryTopic);
		$retValue.=$selectedTopic." : ";
		$selectedCategory=GetCategory($selectedTopic,$queryCategory);
		$retValue.=$selectedCategory;
		$retValue.="<br/>";
		$retTable.='<td>'.$authorName.'</td>';
		//$retTable.='<td>'.$submitterName.'</td>';
		$retTable.='<td>'.$paperTitle.'</td>';
		$retTable.='<td>'.$selectedTopic.'</td>';
		$retTable.='<td>'.$selectedCategory.'</td>';
		$retTable.='<td><a href="../'.$_SESSION["uploadlocation"].'/'.$fileName.'">'.$fileName.'</a></td>';
		$retTable.='<td><textarea class="form-control" id="remarks_'.$updateButtonId.'">'.$remarks.'</textarea></td>';
		$retTable.='<td><input type="text" id="decisionText_'.$updateButtonId.'" value="'.$status.'" class="form-control" placeholder="Out of 10"/></td>';
		$retTable.='<td><input type="button" id="'.$updateButtonId.'" class="btn btn-primary updateDecision" value="Update" functionName="UpdateStatus"/></td>';
		$retTable.='</tr>';
		//$retTable.='<img id="loadingGif" src="../images/loadingTransparent.gif" style="display: none;" alt="Loading...">';

	}

	$result->free();
	$associatedJs='<script> 
			$(function(){
				$(".alert-autoclose").delay(5000).fadeOut("slow");
				$("#loadingGif").hide();
			});
			var functionName="";
			var data={};
			$(".updateDecision").click(function(e){

				
				$("#loadingGif").show();
				e.preventDefault();
				//alert("MyID : "+$(this).attr("id"));
				var decisionTextId = "#decisionText_"+$(this).attr("id");
				var remarksTextId = "#remarks_"+$(this).attr("id");
				//alert($(decisionTextId).val());
				//alert($(remarksTextId).val());
				functionName=$(this).attr("functionName");
				data["function_name"]=functionName;
				data["remarks"]=$(remarksTextId).val();
				data["decision"]=$(decisionTextId).val();
				data["filename"]=$(this).attr("id")+".pdf";

				    $.ajax({
				    url: "../controller/func.php",
				    method: "POST",
				    data : data,
				    success: function(response) {
					//alert("response");
					$("#loadingGif").hide();
				    	$("#refereeUpdateStatus").html(response);
					$("#refereeUpdateStatus").delay(800).fadeOut();
				    }
				    });

			});
			$(".Decision").click(function(e){
				e.preventDefault();
				var textBoxId="#decisionText_"+$(this).attr("buttonid");
				//alert(textBoxId);
				$(textBoxId).val($(this).attr("value"));
				$(textBoxId).attr("value",$(this).attr("value"));
				
			});

			
			</script>';
	//return $retValue;
	return $retTable.$associatedJs;
}else{

		return Message("Please login to view your submissions.");
}
	
}

function GetTopic($topic){
	$query='select topic from topics where code="'.$topic.'"';
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");

	$row = $result->fetch_assoc();
	$result->free();
	return $row["topic"];
}

function GetCategory($topic,$category){
	$query='select category from '.$topic.' where code="'.$category.'"';
	//return $query;
	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");

	$row = $result->fetch_assoc();
	$result->free();
	return $row["category"];
	

}

function Poster(){
    /*var iframe = $('<iframe>');
    iframe.attr('src','../docs/poster.pdf');
    return iframe;
    //$('#result').html(iframe);*/
if(!EnableMenuItem("Poster"))
return Message("Will be available soon.","alert-warning");

    echo '<iframe src="../docs/poster.pdf"></iframe>';
}

function Topic(){
if(!EnableMenuItem("Topic"))
return Message("Will be available soon.","alert-warning");

return Message("Will be Available soon.","alert-warning");
}

function Venue(){
if(!EnableMenuItem("Venue"))
return Message("Will be available soon.","alert-warning");

return '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.7182437572383!2d72.92505781147418!3d19.0321333532724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c5c3527b0327%3A0x8a63274e6c3dbdc0!2sD.A.E%20Convention%20Center!5e0!3m2!1sen!2sin!4v1684738238291!5m2!1sen!2sin" width="300" height="225" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
}

function NASI(){
//return "<div class='w-75 p-3 bg-success'>
//return "<div class='d-flex justify-content-center'>
//	<div class='w-75 p-3 bg-success'>

/*return "<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
<h3>The <raman class='text-primary font-weight-bold'>National Academy of Sciences, India </raman> (initially called “The Academy of Sciences of United Provinces of Agra and Oudh”) was founded in the year 1930, with the objectives to provide a national forum for the publication of research work carried out by Indian scientists and to provide opportunities for exchange of views among them. 
<br/><br/><p><raman class='text-primary font-weight-bold'>93<sup>rd</sup></raman> Annual Session  along with the scientific sessions on Physical and Biological sciences will be held from <raman class='text-primary font-weight-bold'>03 Dec. to 05 Dec 2023</raman> at  
<raman class='font-weight-bold'>DAE Convention Centre, Bhabha Atomic Research Centre, Mumbai.</raman>
<br/>
<br/>
The Scientific Sessions will be held in two sections. The scientific papers are presented by selected researchers/scientists in scientific sessions, for which prior submission of the Abstract(s)/Paper(s) is necessary .
</h3>
</div></div>
";
*/
return HomeNASI();
//return "Hello";
}

function Home(){
return NASI();
if(EnableMenuItem("Home"))
return NASI();
else
return Message("Will be available soon.","alert-warning");
}

function Accommodation(){

if(EnableMenuItem("Home")){}else{
return Message("Will be available soon.","alert-warning");
}
}

function PopulateResubmissionForm(){

$obj=new DB();
$query="select UploadLocation from symposium where volume=67";
$result = $obj->GetQueryResult($query);
if($result===false)
                                return Message("Query execution fails","alert-danger");

$row = $result->fetch_assoc();
$loc = $row["UploadLocation"];

$fileName = $_POST["filename"];
$uname = $_POST["uname"];
$query = 'select * from contributions where uname="'.$uname.'" and Filename="'.$fileName.'"';
$obj = new DB();
$result=$obj->GetQueryResult($query);
$row=$result->fetch_assoc();

//$loc="/home/nasiin/public_html/nasi2023/Uploads/";
//$loc="/var/www/html/Symposia/Uploads/";


$filename=$row["Filename"];

$selectedTopic=GetTopic($row["Topic"]);
$selectedCategory=GetCategory($selectedTopic,$row["Category"]);
//return $query;
$fieldNames=array("Topic","Category","Title","Filename");

$formContent='<br/><div class="container">
                <h2>Resubmit your contribution</h2>
                <form method="POST" id="login" class="">';

for($i=0 ; $i<count($fieldNames) ; $i++){
$formContent.='<div class="form-group">
                                <label for="'.$fieldNames[$i].'">'.$fieldNames[$i].':</label>';

	if($fieldNames[$i]=="Filename"){
		$fileComponent='<div class="custom-file mb-3">
	      <input type="file" class="custom-file-input uploadFile" id="uploadFile" loc="../'.$loc.'" name="uploadFile" required>
      		<label class="custom-file-label" for="uploadFile">Choose file</label>
    	</div>';
	 $formContent.=$fileComponent;
	}else{
		$code="";
		$value=$row[$fieldNames[$i]];
		$code=$value;

		if($fieldNames[$i]=="Topic")
		$value=$selectedTopic;
		
		
		if($fieldNames[$i]=="Category")
		$value=$selectedCategory;


		if($fieldNames[$i]=="Topic" || $fieldNames[$i]=="Category"){
			
			$formContent.='
                                <input type="text" class="form-control" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" value="'.$value.'" code="'.$code.'" required readonly>
                        </div>
			<div id="uploadStatus" ></div>
';
		}else{
		$formContent.='
                              
                                <input type="text" class="form-control" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" value="'.$value.'" required >
                        </div><div id="uploadStatus"></div>
';
		}
	}
}

		$formContent.=AuthorList().'<br/><hr/>';
                 $formContent.='<button type="submit" class="btn btn-primary" id="uploadAndSubmit" loc="../'.$loc.'" filename="'.$filename.'">Submit</button>';
		$formContent.='<img id="loadingGif" src="../images/loadingTransparent.gif" style="display: none;" alt="Loading...">';

$result->free();

	$associatedJs = '<script>
			$(function(){
			$("#loadingGif").hide();
			$(".custom-file-input").on("change",function(e){
				//alert("file selected...");
				var fileName = e.target.files[0].name;
				//alert(fileName);

			if(e.target.files[0].size > 1048576){

                                alert("File size exceeds the allowed size of 1 MB");
                                const form = document.querySelector("form");
                                form.reset();
                                $(this).siblings(".custom-file-label").removeClass("selected").html("Choose file");
                                return;

                        }
                        dataUp.append("file",e.target.files[0]);
                        dataUp.append("loc",$(this).attr("loc"));


				$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
			}); 
			});

			/*$("#uploadFile").on("change",function(){
			//alert("Symp for submit clicke....");
			var fileInput = document.getElementById($(this).attr("id"));
			alert(fileInput.files[0].name); 
			//console.log(fileInput);
			dataUp.append("file",fileInput.files[0]);
			//dataUp.append("loc",$(this).attr("loc"));
			//console.log("-----------------");
                	//console.log(dataUp);
                	});*/


			$("#uploadAndSubmit").on("click",function(e){


			var returnVar=0;
                        if($("#uploadFile").val()==""){
                                returnVar=1;    
                                $("#uploadFile").css("background", "yellow");
                                alert("Please select a file to upload.");
                                return;
                        }

                        $(".authorName").each(function(){
                                if($(this).val()==""){
                                   $(this).css("background", "yellow");
                                   returnVar=1;
                                   alert("Please fill the Author Name : "+returnVar);
                                }
                        });
                        if(returnVar==1){
                        return;
                        }

                        $(".authorEmail").each(function(){
                                if($(this).val()==""){
                                   $(this).css("background", "yellow");
                                   returnVar=1;
                                   alert("Please fill the Author Email : "+returnVar);
                                }
                        });
                        

                        if(returnVar==1){
                        return;
                        }


	                dataUp.append("function_name","ResubmitUpload");
			dataUp.append("topicid",$("#Topic").attr("code"));
			dataUp.append("categoryid",$("#Category").attr("code"));
			dataUp.append("loc",$(this).attr("loc"));
			dataUp.append("filename",$(this).attr("filename"));

                        e.preventDefault();

			$("#loadingGif").show();
        	        $(this).prop("disabled",true);

               		//Lets try to get the author names and email list.
                          var authorNameTextBoxValues = $(".authorName").map(function() {
                          return $(this).val();
                          }).get();
                          var authorEmailTextBoxValues = $(".authorEmail").map(function() {
                          return $(this).val();
                          }).get();
                          dataUp.append("authornameslist",authorNameTextBoxValues);
                          dataUp.append("authoremailslist",authorEmailTextBoxValues);
                         //alert(authorNameTextBoxValues+" : "+authorEmailTextBoxValues);


                        if($("#Title").val()==""){
                                alert("Please fill the paper title.");
                                return;
                        }

                        dataUp.append("title",$("#Title").val());
                        //alert("Upload and Submit clicked...");
                        console.log(dataUp);
                        $.ajax({
                                url: "../controller/func.php",
                                method: "POST",
                                data : dataUp,
                                processData : false,
                                contentType : false,
                                success: function(response) {
                                        //$("#uploadStatus").html(response);
					$("#loadingGif").hide();
                                        $("#uploadAndSubmit").prop("disabled",false);
                                        $("#result").html(response);
                                }
                        });

                });

		</script>';

	return $formContent.$associatedJs;
}

function DAECC(){
//return "DAECC cCallec....";
if(!EnableMenuItem("DAECC"))
return Message("Will be available soon.","alert-warning");

$retVal = Message("DAECC Guest House","alert-success");

$images='<div class="container">
  <div class="row py-3">
    <div class="col-md-6 px-3">
	<img src="../images/daecc1.png" class="img-fluid"/>
    </div>
    <div class="col-md-6 px-3">
	<img src="../images/daecc2.png"  class="img-fluid"/>
    </div>
    </div>
<div class="row py-3">
     <div class="col-md-6 px-3">
	<img src="../images/daecc3.png" class="img-fluid"/>
    </div>
    <div class="col-md-4 px-3">
	<img src="../images/daecc4.png"  class="img-fluid"/>
    </div>

  </div>
<div class="row py-3">
     <div class="col-md-6 px-3">
	<img src="../images/daecc6.png" class="img-fluid"/>
    </div>
    <div class="col-md-6 px-3">
	<img src="../images/daecc7.png"  class="img-fluid"/>
    </div>

  </div>

</div>';
$retVal.=$images;
return $retVal;
}

function PGHostel(){
//return "PGHOstel..";
if(!EnableMenuItem("PGHostel"))
return Message("Will be available soon.","alert-warning");

$retVal = Message("Postgraduate Hostel","alert-success");

$images='<div class="container">
  <div class="row py-3">
    <div class="col-md-6 px-3">
	<img src="../images/pg1.png" class="img-fluid"/>
    </div>
    <div class="col-md-6 px-3">
	<img src="../images/pg2.png"  class="img-fluid"/>
    </div>
    </div>';
$retVal.=$images;
return $retVal;

}

function Tunga(){
//return "Tunga...";
if(!EnableMenuItem("Tunga"))
return Message("Will be available soon.","alert-warning");
$retVal = Message("The Regenza by Tunga","alert-success");
$details='<table class="table table-striped table-bordered">
<tr>
<td>Distance</td>		<td>~10 km from the Venue (DAECC)</td></tr>
<tr>
<td>Travel time</td> 			<td> 10 minutes, under normal traffic</td></tr>
<tr>
<td>Tariff	with Buffet Breakfast</td>	<td> Rs. 7,500/- + 12% Tax, Total Rs. 8,400/- per night, for Double Occupancy</td></tr>
<td></td>
				<td> Rs. 6,500/- + 12% Tax, Total Rs. 7,280/- per night, for Single Occupancy</td></tr>
<tr></tr>
<tr><td></td>
	<td>50% Advance Payment to be made by next month</td></tr>
 </table><br/>';

$images='<div class="container">
 <div class="row py-3">
    <div class="col-md-12 px-3">
	<img src="../images/tunga1.png" class="img-fluid"/>
    </div>
    </div>
  <div class="row py-3">
    <div class="col-md-6 px-3">
	<img src="../images/tunga2.png" class="img-fluid"/>
    </div>
    <div class="col-md-6 px-3">
	<img src="../images/tunga3.png"  class="img-fluid"/>
    </div>
    </div>';
$retVal.=$details.$images;
return $retVal;

}

function JewelOfChembur(){
if(!EnableMenuItem("JewelOfChembur"))
return Message("Will be available soon.","alert-warning");
//return "JewelOfChembur....";
$retVal = Message("The Jewel of Chembur : 20 Rooms","alert-success");

$details='<table class="table table-striped table-bordered">
<tr>
<td>Distance</td>			<td>~05 km from the Venue (DAECC)</td></tr>
<tr>
<td>Travel time</td> 			<td>~16 minutes, under normal traffic</td></tr>
<tr>
<td>Tariff	with Buffet Breakfast</td>	<td> Rs. 6,400/- + 12% Tax, Total Rs. 7,168/- per night, for Double Occupancy</td></tr>
<tr>
<td></td>
				<td> 50% Advance Payment (Non Refundable) to be made by next month</td></tr></table><br/>';

$images='<div class="container">
  <div class="row py-3" >
    <div class="col-md-6 px-3">
	<img src="../images/jc1.png" class="img-fluid"/>
    </div>
    <div class="col-md-6 px-3">
	<img src="../images/jc2.png"  class="img-fluid"/>
    </div>
    </div>
 <div class="row px-3">
    <div class="col-md-12 py-3">
	<img src="../images/jc3.png" class="img-fluid"/>
    </div>
    </div>';

$retVal.=$details.$images;
return $retVal;


}

function HowToReach(){
	//return "How to reach....";
	$query='select How_To_Reach from HowToReach';
	$result = GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");

	$tableData='<table class="table">';
	while($row=$result->fetch_assoc()){
	$tableData.='<tr><td class="text-center">'.$row["How_To_Reach"].'</td></tr>';
	}
	$result->free();
	$tableData.='</table>';
	return $tableData;

}

function GetQueryResult($query){

$obj = new DB();
$result = $obj->GetQueryResult($query);
if($result===false)
                                return Message("Query execution fails","alert-danger");

return $result;
}

function Logout(){
session_start();
//$_SESSION["loggedin"]="";
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
return Message("You have successfully logged out.
		<script> 
		$(function(){
			$('#YourTasks').hide();
		});</script>","alert-success");
}


function LoadForgotPasswordForm(){
$forms = new Forms();
return $forms->ForgotPassword(); 
}

//Ajax called
function ServeForgotPassword(){
$email = $_POST["email"];
$obj=new DB();
$query = 'select * from user_credentials where email="'.$email.'"';
$result = $obj->GetQueryResult($query);
if($result===false)
                                return Message("Query execution fails","alert-danger");

$row=$result->fetch_assoc();
$uname=$row["uname"];
$passwd=$row["passwd"];
$fname=$row["firstname"];
$lname=$row["lastname"];
$body='Dear '.$fname.' '.$lname.',

We have received a request to recover your credentials for NASI-2023.

Please find below the required credentials

username : '.$uname.'
password : '.$passwd.'

With Regards,
NASI-2023
';

//return $body;
SendMail("admin",$email,"NASI 2023 : Credentials",$body);
$result->free();
return Message("Login credentials sent to email : ".$email,"alert-info");
}

function Important_Dates(){

if(!EnableMenuItem("ImportantDates"))
return Message("Will be available soon.","alert-warning");

//return Message("Dates available","alert-danger");
$query='select reg_end_date,contrib_end_date from symposium where volume=67';
$obj = new DB();
$result = $obj->GetQueryResult($query);
if($result===false)
                                return Message("Query execution fails","alert-danger");

$retVal = Message("Important Dates","alert-info");
$retVal .= '<table class="table table-striped table-bordered">';

$row=$result->fetch_assoc();
//For more info. keep on adding a line below
$regDate = date("d F Y", strtotime($row["reg_end_date"]));
$retVal.='<tr><td>Last date of Registration</td><td>'.$regDate."</td></tr>";
$contribDate = date("d F Y", strtotime($row["contrib_end_date"]));
$retVal.='<tr><td>Last date of Abstract submission</td><td>'.$contribDate.'</td></tr>';
$retVal.='</table>';
$result->free();
return $retVal;

}

/*function AttachAllotmentJS(){
$associatedJs='<script>
		var data={};
		$(".allotment").click(function(e){
		e.preventDefault();
		data["function_name"]="Allot";
		data["allotmentType"]=$(this).attr("id");
		$.ajax({
	            url: "../controller/func.php",
        	    method: "POST",
	            data : data,
        	    success: function(response) {
	            $("#result").html(response);
        	    }
          	});
	});


		</script>';
return $associatedJs;

}*/

function PopulateAllotment(){
$retVal="";
if(isset($_SESSION["logintype"]) && $_SESSION["logintype"]=="Admin"){
$retVal='<input type="button" class="btn btn-primary allotment" id="AllotCoordinator" value="Allot Coordinators"/>
<input type="button" class="btn btn-primary allotment" id="AllotReferee" value="Allot Referees"/>
';
}
if(isset($_SESSION["logintype"]) && $_SESSION["logintype"]=="Coordinator"){
$retVal='<input type="button" class="btn btn-warning allotment" id="AllotReferee" value="Allot Referees"/>
';
}

$associatedJs='<script>
		var data={};
		$(".allotment").click(function(e){
		e.preventDefault();
		data["function_name"]="Allot";
		data["allotmentType"]=$(this).attr("id");
		$.ajax({
	            url: "../controller/func.php",
        	    method: "POST",
	            data : data,
        	    success: function(response) {
	            $("#result").html(response);
        	    }
          	});
	});


		</script>';
return $retVal.$associatedJs;
}

/*function Allot(){
$allotmentType = $_POST["allotmentType"];
return $allotmentType;
}*/
function Allottt(){
	//return Message("Will be available soon.","alert-warning");
	session_start();
	$allotmentType = $_POST["allotmentType"];
	if(isset($_SESSION["loggedin"])){
	//$submitterName = GetSubmitterName();
	$query = 'select * from contributions';
 	//return $query;	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	//return $query;
	
	}else{

		return Message("Please login to view your submissions.");
}
	
}

function AllotCoordinator_Old(){
	$obj = new DB();
	$status=$_POST["decision"];
	$filename=$_POST["filename"];
	$query = "update contributions set refereeName='".$status."' where Filename='".$filename."'";
	$result = $obj->GetQueryResult($query);
	return MessageAutoClose("Status updated....","alert-warning");
}
function AllotReferee_Old(){
	$obj = new DB();
	$status=$_POST["decision"];
	$filename=$_POST["filename"];

	$ref1=$_POST["ref1"];
	$ref2=$_POST["ref2"];
	$ref3=$_POST["ref3"];
	$ref4=$_POST["ref4"];

	$query='delete from refereeAllotment where Filename="'.$filename.'"';
	$result = $obj->GetQueryResult($query);

	$query='insert into refereeAllotment (Filename,refereeName,refnum) values("'.$filename.'","'.$ref1.'","ref1")';
	$result = $obj->GetQueryResult($query);

	$query='insert into refereeAllotment (Filename,refereeName,refnum) values("'.$filename.'","'.$ref2.'","ref2")';
	$result = $obj->GetQueryResult($query);
	
	$query='insert into refereeAllotment (Filename,refereeName,refnum) values("'.$filename.'","'.$ref3.'","ref3")';
	$result = $obj->GetQueryResult($query);

	$query='insert into refereeAllotment (Filename,refereeName,refnum) values("'.$filename.'","'.$ref4.'","ref4")';
	$result = $obj->GetQueryResult($query);

	return MessageAutoClose("Status updated....","alert-warning");
}

function Allot(){
	//return Message("Will be available soon.","alert-warning");
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);
	session_start();
	if(isset($_SESSION["loggedin"])){
 	$allotmentType = $_POST["allotmentType"];
	$query="";
	if($allotmentType=="AllotReferee")	
	$query = 'select * from contributions where refereeName="'.$_SESSION["username"].'"';
	else	
	$query = 'select * from contributions where 1';//refereeName="'.$_SESSION["username"].'"';
 	//return $query;	
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");

	//return $query;
	$retValue="";
	$retTable='<table class="table table-striped table-bordered">';
	$retTable.='<tr><th>uname</th>
			<th>Title</th>
			<th>Topic</th>
			<th>Category</th>
			<th>Uploaded File</th>
			<th>'.$allotmentType.'</th>
			<th>Update Status</th>
			</tr>';
	$decArray=array();
	if($allotmentType=="AllotReferee")
	$decArray["Referee"]=GetArray("Referee");//array("RSE","BRB","SLV","ABE");
	elseif($allotmentType=="AllotCoordinator"){
	$decArray["Coordinator"]=GetArray("Coordinator");//array("RSE","BRB","SLV","ABE");
	}
	else
	$decArray["Decision"]=array("RSE","BRB","SLV","ABE");
	while($row = $result->fetch_assoc()){
		$retTable.='<tr>';
		//$retValue.=$row["Topic"]." : ".$row["Category"]."<br/>";
		//$retValue.="Hello <br/>";
		$authorName=$row["uname"];
		$paperTitle=$row["Title"];
		$authorNamesList=$row["AuthorNamesList"];
		$authorEmailsList=$row["AuthorEmailsList"];
		$fileName=$row["Filename"];
		$queryTopic=$row["Topic"];
		$status=$row["refereeName"];
		$remarks=$row["remarks"];
		$queryCategory=$row["Category"];

		$updateButtonId=preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
		

		//$retValue.=GetTopic($queryTopic)." : ";
		//$retValue.=GetCategory($queryTopic,$queryCategory);
		$selectedTopic=GetTopic($queryTopic);
		$retValue.=$selectedTopic." : ";
		$selectedCategory=GetCategory($selectedTopic,$queryCategory);
		$retValue.=$selectedCategory;
		$retValue.="<br/>";
		$retTable.='<td>'.$authorName.'</td>';
		//$retTable.='<td>'.$submitterName.'</td>';
		$retTable.='<td>'.$paperTitle.'</td>';
		$retTable.='<td>'.$selectedTopic.'</td>';
		$retTable.='<td>'.$selectedCategory.'</td>';
		$retTable.='<td><a href="../'.$_SESSION["uploadlocation"].'/'.$fileName.'">'.$fileName.'</a></td>';
		//$retTable.='<td><textarea class="form-control" id="remarks_'.$updateButtonId.'">'.$remarks.'</textarea></td>';
		if($allotmentType=="AllotReferee"){
		$query='select * from refereeAllotment where Filename="'.$fileName.'"';
		$result_coord=$obj->GetQueryResult($query);

		$refArray = array();
		while($row=$result_coord->fetch_assoc()){
			$refArray[$row["refnum"]]=$row["refereeName"];
		}

		/*if($result){
		$row_coord=$result_coord->fetch_assoc();
		$status1=$row_coord["refereeName"];

		$row_coord=$result_coord->fetch_assoc();
		$status2=$row_coord["refereeName"];

		$row_coord=$result_coord->fetch_assoc();
		$status3=$row_coord["refereeName"];

		$row_coord=$result_coord->fetch_assoc();
		$status4=$row_coord["refereeName"];
		}*/



		$referees='<td><table class="table">
			   <tr>				
			   <td>'.AddDecisionEntries($decArray,"Referee",$updateButtonId,$refArray["ref1"],$fileName,$allotmentType,1).'</td>
			   <td>'.AddDecisionEntries($decArray,"Referee",$updateButtonId,$refArray["ref2"],$fileName,$allotmentType,2).'</td>
			   <td>'.AddDecisionEntries($decArray,"Referee",$updateButtonId,$refArray["ref3"],$fileName,$allotmentType,3).'</td>
			   <td>'.AddDecisionEntries($decArray,"Referee",$updateButtonId,$refArray["ref4"],$fileName,$allotmentType,4).'</td>
			   </tr>
			   </table>';	

		$retTable.=$referees;//'<td>'.AddDecisionEntries($decArray,"Referee",$updateButtonId);

		}
		elseif($allotmentType=="AllotCoordinator")
		$retTable.='<td>'.AddDecisionEntries($decArray,"Coordinator",$updateButtonId,$status,$fileName,$allotmentType);
		else
		$retTable.='<td>'.AddDecisionEntries($decArray,"Decision",$updateButtonId,$status,$fileName,$allotmentType);
		if($status=="")
				$retTable.='<input type="text" id="decisionText_'.$updateButtonId.'" value="'.$status.'" class="form-control bg-warning"/></td>';
	//	else
	//			$retTable.='<input type="text" id="decisionText_'.$updateButtonId.'" value="'.$status.'" class="form-control refereeText"/></td>';
	//	$retTable.='<td><input type="button" id="'.$updateButtonId.'" class="btn btn-primary updateDecision" value="Update" functionName="'.$allotmentType.'"/></td>';
		

		$innerTab='<table class="table">';
		//$retTable.=
		$innerTab.='<tr><td><input type="text" id="score_'.$updateButtonId.'" class="scoreText"/></td></tr>';
		$innerTab.='<tr><td><input type="button" id="'.$updateButtonId.'" class="btn btn-primary updateScore" value="GetScore" functionName="GetScore"/></td></tr>';

		$innerTab.='</table>';

		$retTable.='<td>'.$innerTab.'</td>';

		$retTable.='</tr>';
	}

$result->free();
	
	$associatedJs='<script> 
			$(function(){
				$(".alert-autoclose").delay(5000).fadeOut("slow");
			});

			var functionName="";
			var data={};
			$(".updateDecision, .updateScore").click(function(e){

				
				e.preventDefault();
				//alert("MyID : "+$(this).attr("id"));
				var decisionTextId = "#decisionText_"+$(this).attr("id")+"_0";
				//var remarksTextId = "#remarks_"+$(this).attr("id");
				//alert($(decisionTextId).val());
				//alert($(remarksTextId).val());
				functionName=$(this).attr("functionName");
				data["function_name"]=functionName;
				//data["remarks"]=$(remarksTextId).val();
				data["decision"]=$(decisionTextId).val();
				var btnID = $(this).attr("id");

				data["ref1"]=$("#decisionText_"+$(this).attr("id")+"_1").val();
				data["ref2"]=$("#decisionText_"+$(this).attr("id")+"_2").val();
				data["ref3"]=$("#decisionText_"+$(this).attr("id")+"_3").val();
				data["ref4"]=$("#decisionText_"+$(this).attr("id")+"_4").val();

				//alert(data["ref1"]+" : "+data["ref2"]+" : "+data["ref3"]+" : "+data["ref4"]);
				//data["decision"]="decisionText_"+$(this).attr("id")+"_0";
				//alert(data["decision"]);
				data["filename"]=$(this).attr("id")+".pdf";

				    $.ajax({
				    url: "../controller/func.php",
				    method: "POST",
				    data : data,
				    success: function(response) {
					//alert("response");
					if(functionName=="GetScore"){
					var scoreTextId = "#score_"+btnID;
					//alert(scoreTextId);
					//alert(response);

					
					if(response >= 7){
						$(scoreTextId).val(response+" : Oral");
						//alert("Oral");
						$(scoreTextId).addClass("bg-info");
					}
					if(response >= 4 && response < 7){
						$(scoreTextId).val(response+" : Poster");
						//alert("Oral");
						$(scoreTextId).addClass("bg-warning");
					}
					if(response < 4){
						$(scoreTextId).val(response+" : Rejected");
						//alert("Oral");
						$(scoreTextId).addClass("bg-danger");
					}


					
					}
					else
				    	$("#refereeUpdateStatus").html(response);
				    }
				    });

			});
			$(".Decision,.Referee,.Coordinator").click(function(e){
				$("#loadingGif").show();
				e.preventDefault();
				var textBoxId="#decisionText_"+$(this).attr("buttonid");
				alert(textBoxId);
				var dataRef={};
				var prevValue = $(textBoxId).val();		
				var newValue = $(this).attr("value");	
				var functionName = $(this).attr("functionName");// "AllotReferee_V2";	
				dataRef["function_name"]=functionName;

				dataRef["prevValue"]=prevValue;
				dataRef["newValue"]=newValue;
				dataRef["filename"]=$(this).attr("filename");
				dataRef["refnum"]=$(this).attr("refnum");

				alert(dataRef["prevValue"]+" : "+dataRef["newValue"]+" : "+dataRef["filename"]+" : "+dataRef["refnum"]);

								var okornot=false;
				if(prevValue!=newValue){
					//alert("Attention : Your are changing a referee.");
					okornot = confirm("Are you sure you want to change the referee. \n You will lose the work done by previous referee.");

				$.ajax({
				    url: "../controller/func.php",
				    method: "POST",
				    data : dataRef,
				    success: function(response) {
				   	 
				    	$("#refereeUpdateStatus").html(response);
					$("#refereeUpdateStatus").show();
					//$("#loadingGif").hide();
					$("#refereeUpdateStatus").delay(800).fadeOut(); 
					$("#loadingGif").delay(1000).fadeOut(); 
					}
				    });

					
					
				}
				if(!okornot)
					return;
				
				$(textBoxId).val($(this).attr("value"));
				//$(textBoxId).attr("value",$(this).attr("value"));
				
			});

			$(".decisionText").on("change",function(){
				alert("hellooooo");
			});

			$(".updateScore").each(function(){
				$(this).click();
			});		
			</script>';
	 
	//return $retValue;
	return $retTable.$associatedJs;
}else{

		return Message("Please login to view your submissions.");
}
	
}
function AllotCoordinator(){
	$obj = new DB();
	//$status=$_POST["decision"];
	//$filename=$_POST["filename"];

	$filename=$_POST["filename"];
	$refnum=$_POST["refnum"];
	$prevValue=$_POST["prevValue"];
	$newValue=$_POST["newValue"];
	$query = "update contributions set refereeName='".$newValue."' where Filename='".$filename."'";
	$result = $obj->GetQueryResult($query);
	if($result===false)
                                return Message("Query execution fails","alert-danger");

	//$result->free();
	return MessageAutoClose("Coordinator updated....","alert-warning");
}

function AllotReferee(){
$filename=$_POST["filename"];
$refnum=$_POST["refnum"];
$prevValue=$_POST["prevValue"];
$newValue=$_POST["newValue"];

$obj = new DB();
$query="";

if($prevValue=="")
$query='insert into refereeAllotment (Filename, refereeName,refnum) values("'.$filename.'","'.$newValue.'","'.$refnum.'")';
else
$query='update refereeAllotment set Filename="'.$filename.'",refereeName="'.$newValue.'",refnum="'.$refnum.'",marks=0,remarks="" where Filename="'.$filename.'" and refereeName="'.$prevValue.'" and refnum="'.$refnum.'" ';

$obj->GetQueryResult($query);
return Message("Referee Updated","alert-success");
}

function UpdateRegistration(){
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	//return Message("Registration data updated","alert-success");
	session_start();
	$uname=trim($_POST["uname"]);
	$initials=trim($_POST["Initials"]);
	$firstname = trim($_POST["FirstName"]);
	$lastname=trim($_POST["LastName"]);
	$gender=trim($_POST["Gender"]);
	$email = trim($_POST["Email"]);
	$mobile=trim($_POST["Mobile"]);
	$affil = trim($_POST["Affiliation"]);
	$desig = trim($_POST["Designation"]);
	$nationality = trim($_POST["Nationality"]);
	$accommReq=trim($_POST["Accommodation_Required"]);
	$accommPref=trim($_POST["Accommodation_Preference"]);
	$accommType=trim($_POST["Accommodation_Type"]);
	$checkinDate=trim($_POST["Arrival_Date"]);
	$checkoutDate=trim($_POST["Departure_Date"]);


	$obj = new DB();

	$query = 'select uname, count(*) as counter from registration where uname="'.$_SESSION["username"].'"';
	//return $query;
	$result = $obj->GetQueryResult($query);
	$row = $result->fetch_assoc();
	$counter = $row["counter"];

	//return $counter;

	if($counter==0){
		//$query = 'insert into registration (uname,Initials,FirstName,LastName,Gender,Email,Affiliation,Designation,Nationality,Mobile) values("'.$uname.'","'.$initials.'","'.$firstname.'","'.$lastname.'","'.$gender.'","'.$email.'
	//","'.$affil.'","'.$desig.'","'.$nationality.'","'.$mobile.'")';
	$query='insert into registration (uname,Initials,FirstName,LastName,Gender,Email,Affiliation,Designation,Nationality,Mobile,Accommodation_Required,
			Accommodation_Preference,Accommodation_Type,Arrival_Date,Departure_Date) values ("'.$uname.'","'.$initials.'","'.$firstname.'","'.$lastname.'"
			,"'.$gender.'","'.$email.'","'.$affil.'","'.$desig.'","'.$nationality.'","'.$mobile.'","'.$accommReq.'","'.$accommPref.'","'.$accommType.'"
			,"'.$checkinDate.'","'.$checkoutDate.'")';
			//return $query;
	}

	else
		$query = 'update registration set FirstName="'.$firstname.'
				 ",Initials="'.$initials.'
				 ",Gender="'.$gender.'
				 ",LastName="'.$lastname.'
				 ",Email="'.$email.'
				 ",Affiliation="'.$affil.'
				 ",Designation="'.$desig.'
				 ",Nationality="'.$nationality.'
				 ",Mobile="'.$mobile.'
				 ",Accommodation_Required="'.$accommReq.'
				 ",Accommodation_Preference="'.$accommPref.'
				 ",Accommodation_Type="'.$accommType.'
				 ",Arrival_Date="'.$checkinDate.'
				 ",Departure_Date="'.$checkoutDate.'" where uname="'.$_SESSION["username"].'"';
//return $query;

		$obj->GetQueryResult($query);

	return Message("Registration data updated","alert-success");


}

function Register(){
	//ini_set('display_errors', 1);
	//ini_set('display_startup_errors', 1);
	//error_reporting(E_ALL);

	if(!EnableMenuItem("Register"))
	return Message("Will be available soon.","alert-warning");

	$obj = new DB();
	$query = "select reg_start_date,reg_end_date from symposium where volume=67";
	$result = $obj->GetQueryResult($query);
	$row = $result->fetch_assoc();
	$reg_start_date = $row["reg_start_date"];
	$reg_end_date = $row["reg_end_date"];

	$now = time();
	$reg_start_time = GetStartTime($reg_start_date);
	$reg_end_time = GetEndTime($reg_end_date);

	if($now < $reg_start_time)
		return Message("Registration will start on ".date("d-M-Y",strtotime($reg_start_date)), "alert-info");

	if($now > $reg_end_time)
		return Message("Registration Deadline crossed on ".date("d-M-Y",strtotime($reg_end_date)).", Kindly contact Convener.", "alert-danger");

	//return "REgitration fucntion called...";
	$fieldNames = $obj->GetFieldNames("registration");
	$forms = new Forms();
	  return $forms->Register($fieldNames);
}

function Submission_Guidelines(){
if(!EnableMenuItem("Submission_Guidelines"))
return Message("Will be available soon.","alert-warning");

$guidelines="<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
";
$guidelines.="<h5>Submission of Abstracts can be made at this website from <textcolor class='text-primary'>".GetStartDate("contrib")."</textcolor> to <textcolor class='text-primary'>".GetLastDate("contrib")."</textcolor>.
<br/><br/>
You will need to create a ‘user account’ at the symposium website to submit a paper. Please download template file from the symposium website to prepare  abstracts, and kindly upload the PDF of the abstract before the due date.
<br/><br/>
Please note that papers given in the proper format only will be considered for review.
<br/><br/>
Maximum allowed file size is 1 MB.
<br/><br/>
Users would be able to edit/modify the submitted papers via resubmission till <textcolor class='text-primary'>".GetLastDate("contrib")."</textcolor>.
<br/><br/>
The Paper submission gateway will be closed on <textcolor class='text-primary'>".GetLastDate("contrib")."</textcolor>.";

$guidelines.="</h5></div></div>";

return $guidelines;
}

function YourTasks_orig(){
session_start();
if($_SESSION["logintype"]=="Admin" || $_SESSION["logintype"]=="Coordinator")
return "<div><h3 class='alert alert-success' role='alert'> Welcome ".$_SESSION["logintype"]." : ".$_SESSION["username"]."</h3><br/>".PopulateAllotment();
if($_SESSION["logintype"]=="Referee")
return "<div><h3 class='alert alert-success' role='alert'> Welcome ".$_SESSION["logintype"]." : ".$uname."</h3><br/>".$loginStatusMsg.'<br/>'.Referee_UpdatePaperStatus();
}

function Templates(){
if(!EnableMenuItem("Templates"))
return Message("Will be available soon.","alert-warning");

$templates="<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
";
$templates.="<h2>Abstract Templates</h2> <br/><table class='table table-bordered table-striped'>";
$templates.="<tr><td>Word templates for abstracts</td><td><a href='../docs/word_template.zip'>Download</a></td>";
$templates.="<tr><td>Latex templates for abstracts</td><td><a href='../docs/latex_template.zip'>Download</a></td>";
$templates.="<tr><td>PdfLatex templates for abstracts</td><td><a href='../docs/pdflatex_template.zip'>Download</a></td>";

$templates.="</table></h3></div></div>";
return $templates;
}

if (isset($_POST['function_name'])) {
  $function_name = $_POST['function_name'];
  if (function_exists($function_name)) {
    $response_data = call_user_func($function_name);
    echo $response_data;
  }
}

?>
