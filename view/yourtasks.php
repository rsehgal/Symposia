<?php
require_once "../components/Components.php";
require_once "../model/Symposia.php";
require_once "Forms.php";
require_once "../controller/helpers.php";
function AuthorTasks(){
    $yourTasksMsg='<div class="about wow fadeInUp" data-wow-delay="0.1s" style="margin-top:20px;">
                <div class="container">
                    <div  class="row justify-content-center align-items-center">';
    $yourTasksMsg.='<div class="col-lg-4 col-md-12" style="text-align: center;">
                            
                        <div class="about-text">
                       
                       <div class="about-text" align="center">
                <p align="center"><a href="#" target="_blank" class="btn contributions" id="Upload_Contribution" style="width:100%;">Online Abstract Submission</a>   </p>
                
                </div>
                </div>
                </div>';
    
    $yourTasksMsg.='<div class="col-lg-4 col-md-12" style="text-align: center;">
                            
                        <div class="about-text">
                       
                       <div class="about-text" align="center">
                <p align="center"><a href="#" target="_blank" class="btn contributions" id="View_Contribution" style="width:100%;">View your Contributions</a>   </p>
                
                </div>
                </div>
                </div>';
    
    
    $yourTasksMsg.='<div class="col-lg-4 col-md-12" style="text-align: center;">
                            
                        <div class="about-text">
                       
                       <div class="about-text" align="center">
                <p align="center"><a href="#" target="_blank" class="btn contributions" id="PaymentForm" style="width:100%;">Fill Payment details</a>   </p>
                
                </div>
                </div>
                </div>';
    
    $yourTasksMsg.='</div></div></div>';
    
    return $yourTasksMsg;
    }
    function AdminTasks(){
    $yourTasksMsg='<div class="about wow fadeInUp" data-wow-delay="0.1s" style="margin-top:20px;">
                <div class="container">
                    <div  class="row justify-content-center align-items-center">';
    $yourTasksMsg.='<div class="col-lg-4 col-md-12" style="text-align: center;">
                            
                        <div class="about-text">
                       
                       <div class="about-text" align="center">
                <p align="center"><a href="#" target="_blank" class="btn contributions" id="ShowRegistration" style="width:100%;">Registration Details</a>   </p>
                
                </div>
                </div>
                </div>';
    
    
    $yourTasksMsg.='</div></div></div>';
    
    return $yourTasksMsg;
    }
   function GetTasks(){
    session_start();
    $yourTasksMsg='<div class="about wow fadeInUp" data-wow-delay="0.1s" style="margin-top:20px;">
                   <div class="container">
                   <div  class="row justify-content-center align-items-center">';

    $logintype=$_SESSION['logintype'];

    $obj = new DB();
    $query = "select taskname,function_name,logintype,tasktype,registration_required,colorclass from yourtasks where logintype='".$logintype."' order by sno";
    $result = $obj->GetQueryResult($query);

    //$additionalClasses=" yourtask";
    $additionalClasses=" yourtask ".$row["colorclass"];
	
	

    while($row = $result->fetch_assoc()){

    //$additionalClasses=" yourtask";
    $additionalClasses=" yourtask ".$row["colorclass"];

    if($row["registration_required"]==1){
    if(RegisteredUser()===0)
	$additionalClasses=" kindlyregister";
    }

    $yourTasksMsg.='<div class="col-lg-4 col-md-12" style="text-align: center;">
                    <div class="about-text">
                    <div class="about-text" align="center">
                	<p align="center"><a href="#" target="_blank" class="btn '.$additionalClasses.'" id="'.$row["function_name"].'" tasktype="'.$row["tasktype"].'" style="width:100%;" readonly="'.$readonly.'">'.$row["taskname"].'</a>   </p>
                
                </div>
                </div>
                </div>';

    }
    
    
    $yourTasksMsg.='</div></div></div>';
    
    return $yourTasksMsg;
    }
 
    function YourTasks(){
    
    session_start();

    $associatedJs = "<script>
                     $(function(){
				var data={};

				$('.kindlyregister').click(function(e){
					e.preventDefault();
					alert('Kindly register to the sympsium to use this feature.');
					return;
				});
				$('.yourtask').click(function(e){
					e.preventDefault();
					$('#pdfIframe').hide();
					$('#pdfIframe').attr('src','');
					// alert($(this).attr('id'));
					var funcName=$(this).attr('id');
					data['function_name']=funcName;
					data['allotmentType']=$(this).attr('tasktype');
					console.log(data);
					//alert(data['function_name']);
					if(data['function_name'] == 'DownloadReceipt'){
					$.ajax({
						url: '../controller/func.php',
						method: 'POST',
						data : data,
						xhrFields: {responseType: 'blob'},
						success: function(response) {
						if(data['function_name'] == 'DownloadReceipt'){
							$('#pdfIframe').show();
							var reader = new FileReader();
							reader.onloadend = function() {
							$('#pdfIframe').attr('src', reader.result);
							};
							reader.readAsDataURL(response);
							
							}else{
							$('#result').hide();
							//$('#result').delay(1000).fadeIn();
							$('#result').html(response);
							$('#result').fadeIn(1000);
							}
						}
				      });

					}else{
					$.ajax({
                                                url: '../controller/func.php',
                                                method: 'POST',
                                                data : data,
                                                success: function(response) {
                                                        $('#result').hide();
                                                        //$('#result').delay(1000).fadeIn();
                                                        $('#result').html(response);
                                                        $('#result').fadeIn(1000);
                                                        }
                                      });

					}
                     		});
                     	});
                     </script>";
    
    if(isset($_SESSION["loggedin"])){

	if($_SESSION["logintype"]=="Referee"){

                $refAcceptanceStatus = RefereeAcceptanceStatus();
                //return $refAcceptanceStatus;

                $loginStatusMsg='<h4><mark >Logged in as : '.$_SESSION["username"].'</mark> <input type="button" class="btn btn-custom btn-danger" id="logout" value="Logout"/></h4>';
                $localJs = '<script>
                                $(function(){

                                $("#loginstatus").html("<h4><mark>Logged in as : '.
                                $_SESSION["username"].'");
                                });</script>';
                $returnFromRefLogin=$localJs.$js." <div><h3 class='alert alert-success' role='alert'> Welcome ".$_SESSION["logintype"]." : ".$uname."</h3><br/>".$loginStatusMsg.'<br/>';


                if($refAcceptanceStatus=="allotted"){
                        $forms = new Forms();
                        return $forms->RefereeingConfirmation();//"Acceptance Form...";
                }elseif($refAcceptanceStatus=="accepted"){
                        //return $returnFromRefLogin.Referee_UpdatePaperStatus().$adCordJS;
			return GetTasks().$associatedJs;
                }elseif($refAcceptanceStatus=="declined"){
                        return Message("It seems you had already declined our invitation. Kindly contact secretary.","alert-danger");
                }

                }
    
	return GetTasks().$associatedJs;
    }else{
    
    return Message("Please login first","alert-danger");
    }
    }
    
    
    function ShowRegistration(){
    //return Message("Helllo","alert-success");
    session_start();
    if(isset($_SESSION["loggedin"])){
    $obj = new DB();
    $queryReg = "select * from user_credentials";
    $resultReg = $obj->GetQueryResult($queryReg);
    $tabMsg= "<table class='table table-bordered'>";
    $tabMsg.="<tr class='text-center'> 
        <th>Username</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Institute</th>
        <th>Accomm Req.</th>
        <th>BankName</th>
        <th>Trans. Date</th>
        <th>Ref. Number</th>
        <th>Amount</th>
        <th>Abstract <input type='button' id='DownloadAll' class='btn btn-primary' value='Download All'/></th>
        </tr>";
    while($row = $resultReg->fetch_assoc()){
    if($row["uname"]=="admin"){
    }else{
    
    /*
    $tabMsg.= "<tr>";
    $tabMsg.= "<td> ".$row["uname"]." </td>";
    $tabMsg.= "<td> ".$row["firstname"]." </td>";
    $tabMsg.= "<td> ".$row["lastname"]." </td>";
    $tabMsg.= "<td> ".$row["email"]." </td>";
    $tabMsg.= "<td> ".$row["institute"]." </td>";
    */
    
    $queryPayment = "select * from sympnp_payment_detail where uname='".$row["uname"]."'";
    $resultPayment=$obj->GetQueryResult($queryPayment);   
     
    $paymentCounter = $obj->GetCounter("sympnp_payment_detail",$row["uname"]); 

    //if($resultPayment->num_rows === 0){
    if($paymentCounter === 0){
        $tabMsg.= "<tr class='bg-warning font-weight-bold' >";
        $tabMsg.= "<td> ".$row["uname"]." </td>";
        $tabMsg.= "<td> ".$row["firstname"]." </td>";
        $tabMsg.= "<td> ".$row["lastname"]." </td>";
        $tabMsg.= "<td> ".$row["email"]." </td>";
        $tabMsg.= "<td> ".$row["institute"]." </td>";
        $tabMsg.= "<td> ".$row["accomm_req"]." </td>";

    $tabMsg.="<td></td>";
    $tabMsg.="<td></td>";
    $tabMsg.="<td></td>";
    $tabMsg.="<td></td>";
    $tabMsg.="<td>".GetAbstractTable($row["uname"])."</td>";
    $tabMsg.= "</tr>";
    }else{
    $rowResPayment=$resultPayment->fetch_assoc();



    $tabMsg.= "<tr class='bg-success font-weight-bold'>";
        $tabMsg.= "<td> ".$row["uname"]." </td>";
        $tabMsg.= "<td> ".$row["firstname"]." </td>";
        $tabMsg.= "<td> ".$row["lastname"]." </td>";
        $tabMsg.= "<td> ".$row["email"]." </td>";
        $tabMsg.= "<td> ".$row["institute"]." </td>";
        $tabMsg.= "<td> ".$row["accomm_req"]." </td>";

    $tabMsg.="<td>".$rowResPayment["bankname"]."</td>";
    $tabMsg.="<td>".$rowResPayment["dateoftrans"]."</td>";
    $tabMsg.="<td>".$rowResPayment["refnum"]."</td>";
    $tabMsg.="<td>".$rowResPayment["amount"]."</td>";
    /*$tabMsg.="<td>
		<table>";
    while($rowAbs = $resAbs->fetch_assoc()){
	$tabMsg.="<tr><td><a href='Uploads/".$rowAbs["Filename"]."'>".$rowAbs["Filename"]."</a></td></tr>";
    }
		
	$tabMsg.="</table>
	      </td>";*/

    $tabMsg.="<td>".GetAbstractTable($row["uname"])."</td>";

    $tabMsg.= "</tr>";
    
    }
    }
    }
    $tabMsg.="</table>";
    //$result->free();

    $associatedJs = "<script>
       $(function(){
               var data={};
               $('#DownloadAll').click(function(e){
               e.preventDefault();
                    var funcName=$(this).attr('id');
                    alert(funcName);
                    data['function_name']=funcName;
                    console.log(data);
                    $.ajax({
                        url: 'controller.php',
                        method: 'POST',
                        data : data,
                        success: function(response) {
				//$('#result').html(response);
                        }
                      });
		});
		});
		      </script>";

    return $tabMsg.$associatedJs;

    }else{
    return Message("Please login","alert-danger");
    }
    }
   
function GetAbstractTable($uname){
    $obj = new DB();
    $queryAbs = "select Filename,AbstractType,Preference from contributions where uname='".$uname."'";
    $resAbs = $obj->GetQueryResult($queryAbs);
	
    $absTable="<table>
		<tr><th>Abstract</th><th>Type</th><th>Preference</th></tr>";
    while($rowAbs = $resAbs->fetch_assoc()){
        $absTable.="<tr>
			<td><a href='Uploads/".$rowAbs["Filename"]."'>".$rowAbs["Filename"]."</a></td>
			<td>".$rowAbs["AbstractType"]."</td>
			<td>".$rowAbs["Preference"]."</td>
		    </tr>";
    }

        $absTable.="</table>";

	return $absTable;
}

function DownloadAll(){
shell_exec("rm -rf sympnp_abstracts.zip");
$paperDir = "Uploads";
$destinationFile = "sympnp_abstracts.zip";
exec("zip -r $destinationFile $paperDir");
/*echo '<script type="text/javascript">
        alert("Zipping done.");
      </script>';*/

$filename='sympnp_abstracts.zip';
@header("Content-type: application/zip");
@header("Content-Disposition: attachment; filename=$filename");
}

function DownloadAll2(){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the path to the folder you want to zip and download
$folderPath = 'Uploads';

// Create a temporary zip file
$zipFile = tempnam(sys_get_temp_dir(), 'sympnp_abstracts');
$zip = new ZipArchive();
$zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Add all files and directories from the folder to the zip archive
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($folderPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    // Skip directories (they are added automatically)
    if (!$file->isDir()) {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($folderPath) + 1);

        $zip->addFile($filePath, $relativePath);
    }
}

// Close the zip archive
$zip->close();

// Set the appropriate headers for the download
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="sympnp_abstracts.zip"');
header('Content-Length: ' . filesize($zipFile));

// Read the zip file and output it to the browser
readfile($zipFile);

// Delete the temporary zip file
//unlink($zipFile);
//return Message("File downloaded","alert-info");
} 

function PaymentForm(){
                session_start();
		$payment_type=$_POST["allotmentType"];
		$obj = new DB();
                if(isset($_SESSION["loggedin"])){
			$tablename = $payment_type."_payment_detail";
                        $counter=$obj->GetCounter($tablename);
                        if($counter===0){       
                        $forms = new Forms();
                        return $forms->PaymentForm($payment_type);
                        }else{ 
                                $filledMsg = Message("It seems you had already filled the below mentioned payment details, Kindly contact Secretary","alert-info");
                                $filledMsg.="<table class='table'>";
                                $obj = new DB();
                                //$query = "select * from sympnp_payment_detail where uname='".$_SESSION["username"]."'";
                                $query = "select * from $tablename where uname='".$_SESSION["username"]."'";
                                $result = $obj->GetQueryResult($query);
                                $row = $result->fetch_assoc();
				
                                $filledMsg.="<tr bgcolor='d5f9f9'><th>uname</th><th>Name</th><th>BankName</th>
                                          <th>Date of Transation</th><th>Ref. Number</th><th>
                                          Amount</th> <th> Status </th></tr>";
                                $filledMsg.="<tr><td>".$row["uname"]."</td><td>".$row["name"]."</td><td>".$row["bankname"]."</td>
                                          <td>".$row["dateoftrans"]."</td><td>".$row["refnum"]."</td><td>".$row["amount"]."</td><td class='font-weight-bold text-".$row["status"]."'> ".$row["status"]."</td></tr>";

                                $filledMsg.="</table>";

                                return $filledMsg;
                        }
                }
                else{
                    return Message("Please login to fill the payment details.");
                }
        }

//function ConfirmRegistrationPayment(){
function ConfirmPayment(){
$payment_type = $_POST["allotmentType"];
//return "Confirm Payment for $payment_type";
$tablename=$payment_type."_payment_detail";
$obj = new DB();
//$query = 'select * from sympnp_payment_detail';
$query = 'select * from '.$tablename;
$result = $obj->GetQueryResult($query);

$regisPaymentMsg = '<table class="table" id="'.$payment_type.'">
		    <tr>
		    <th>Username</th>
		    <th>Name</th>
		    <th>Bank Name</th>
		    <th>Date of Trans.</th>
		    <th>Trans. Ref. Num.</th>
		    <th>Amount</th>
		    <th>Status</th>
		    </tr>';
while($row = $result->fetch_assoc()){
	if($row["uname"]=="admin"){
	}else{

	$submittedSelected="";	
	$receivedSelected="";	

	if($row["status"]=="Submitted"){
		$submittedSelected='selected';
	}

	if($row["status"]=="Received"){
		$receivedSelected='selected';
	}

	$regisPaymentMsg.='<tr class="tr-'.$row["status"].'"
				id="tr-'.$row["uname"].'">
				<td>'.$row["uname"].'</td>
				<td>'.$row["name"].'</td>
				<td>'.$row["bankname"].'</td>
				<td>'.$row["dateoftrans"].'</td>
				<td>'.$row["refnum"].'</td>
				<td>'.$row["amount"].'</td>
				<td>
					<select id="'.$row["uname"].'" function_name="UpdatePayment" class="custom-select payment-status">
					<option myid="Submitted" value="Submitted" '.$submittedSelected.'>Submitted</option>
					<option myid="Received" value="Received"  '.$receivedSelected.'>Received</option>
					</select>
				</td>
			   </tr>';
	}
}

$regisPaymentMsg.='</table>';

$associatedJs ='<script>
		$(function(){
			var data={};
			$(".payment-status").on("change",function(e){
				data["function_name"]=$(this).attr("function_name");
				data["uname"]=$(this).attr("id");
				data["status"]=$(this).val();
				data["payment_type"]=$("table").attr("id");
				//alert($(this).val());


				$.ajax({
				    url: "../controller/func.php",
				    method: "POST",
				    data : data,
				    success: function(response) {
				    //$("#result").html(response);
					$("#tr-"+data["uname"]).removeClass();
					$("#tr-"+data["uname"]).addClass("tr-"+data["status"]);
					
				    }
				  });
			});
		});
		
		</script>';
return $regisPaymentMsg.$associatedJs;

}


function RefereeStats(){
//$query='select refereeName , count(refereeName) as refCount from refereeAllotment group by refereeName order by refereeName';
$query='select refereeName , count(refereeName) as refCount, COUNT(CASE WHEN remarks IS NOT NULL THEN 1 ELSE NULL END) as reviewed from refereeAllotment group by refereeName order by refereeName';
$obj=new DB();
$result=$obj->GetQueryResult($query);

$refStatsMsg='<table class="table table-striped table-bordered">';
$refStatsMsg.='<tr>
		<th>S. No.</th>
		<th>Referee Code</th>
		<th>Referee Name</th>
		<th>Referee Email</th>
		<th>Review Request</th> 
		<th>Papers Assigned</th> 
		<th >Reviewed</th> 
		<th>Pending</th> 
		<th>Final Status</th> 
		</tr>';

$counter=0;
while($row = $result->fetch_assoc()){
	if($row["refereeName"]==="")
		continue;
	$counter++;
	$queryName="select refereeName,refereeEmail from refereeList where uname='".$row["refereeName"]."'";
	$resName=$obj->GetQueryResult($queryName);
	$rowName=$resName->fetch_assoc();

	$queryStatus="select status,screeningStatus from refereeConfirmation where uname='".$row["refereeName"]."'";
	$resStatus=$obj->GetQueryResult($queryStatus);
	$rowStatus=$resStatus->fetch_assoc();
	$finalStatus="Not Locked";
	$statusClass="text-danger";
	$acceptanceClass="";
	if($rowStatus["status"]==="accepted"){
		$acceptanceClass="text-success";
	}
	if($rowStatus["status"]==="declined"){
		$acceptanceClass="text-danger";
	}

	
	if((int)$rowStatus["screeningStatus"]===1){
		$finalStatus="Locked";
		$statusClass="text-success";
	}

	$pending = $row["refCount"]-$row["reviewed"];
	$refStatsMsg.='<tr>
			<td>'.$counter.'</td>
			<td>'.$row["refereeName"].'</td>
			<td>'.$rowName["refereeName"].'</td>
			<td>'.$rowName["refereeEmail"].'</td>
			<td class="font-weight-bold '.$acceptanceClass.'">'.$rowStatus["status"].'</td>
			<td class="font-weight-bold">'.$row["refCount"].'</td>
			<td class="font-weight-bold text-success">'.$row["reviewed"].'</td>
			<td class="font-weight-bold text-danger">'.$pending.'</td>
			<td class="font-weight-bold '.$statusClass.'">'.$finalStatus.'</td>
			</tr>';
}

$refStatsMsg.='</table>';
$result->free();
return $refStatsMsg;

}

function ShowDetails(){
	$category = $_POST["category"];
	$topic = $_POST["topic"];
	$query="";
	if($topic=="None")
		$query='select * from contributions where Category="'.$category.'" and status <> "Deleted"';
	else
		$query='select * from contributions where Category="'.$category.'" and Topic="'.$topic.'" and status <> "Deleted"';
	return ViewPapersTable($query);
}

function ViewPapers(){
	return ViewPapersTable("select * from contributions");
}

function ViewPapersTable($query){
	//$query='select * from contributions';
	$obj = new DB();
	$result = $obj->GetQueryResult($query);
	$viewPaperMsg = '<table class="table table-dark table-striped table-bordered">';
	$viewPaperMsg.= '<tr>
			<th>S.No.</th>
			<th>uname</th>
			<th>Title</th>
			<th>Category</th>
			<th>Topic</th>
			<th>Filename</th>
			</tr>';
	$counter=0;
	while($row = $result->fetch_assoc()){
		$counter++;
		$viewPaperMsg.='<tr>
				<td>'.$counter.'</td>
				<td>'.$row["uname"].'</td>
				<td>'.$row["Title"].'</td>
				<td>'.$row["Category"].'</td>
				<td>'.$row["Topic"].'</td>
				<td><a href="../Uploads/'.$row["Filename"].'">'.$row["Filename"].'</a></td>
				</tr>';
	}
	$viewPaperMsg.='</table>';
	return $viewPaperMsg;
}

function RegistrationDetails(){

}

function ViewContributionsSummary(){
	$associatedJS="<script>
			$(function(){

				var data={};
				$('.details').click(function(e){
				data['function_name']=$(this).attr('function_name');
				data['category']=$(this).attr('category');
				data['topic']=$(this).attr('topic');
				$.ajax({
                                                url: '../controller/func.php',
                                                method: 'POST',
                                                data : data,
                                                success: function(response) {
                                                        $('#paperDetails').hide();
                                                        $('#paperDetails').html(response);
                                                        $('#paperDetails').fadeIn(1000);
                                                        }
                                      });

				});	
			});
			</script>";
	return ViewTable(FALSE,"select * from categories").
			"<hr/><div id='paperDetails'></div><hr/>
			<h3 class='text-center font-weight-bold'>Contributory Papers</h3>".
			ViewTable(TRUE,"select * from topics").$associatedJS;
}

function ViewTable($contr,$queryTab){
	//return "Contribution summary...";
	//$queryCat = "select * from categories";
	$type="category";
	if($contr){
		$type="Topic";
	}
	$obj = new DB();
	$resultCat = $obj->GetQueryResult($queryTab);
	$summaryMsg='<table class="table table-striped table-bordered">';
	$summaryMsg.='<tr class="bg-warning">
			<th>Category</th>
			<th>No. Of Papers</th>
			<th>Detail</th>
			</tr>';
	while($rowCat = $resultCat->fetch_assoc()){
		if($contr)
			$queryCount = 'select Filename from contributions where Topic="'.$rowCat["code"].'"';
		else
			$queryCount = 'select Filename from contributions where Category="'.$rowCat["code"].'"';
		$count = $obj->GetCounterFromQuery($queryCount);
		$summaryMsg.='<tr>
				<td>'.$rowCat["code"].' . '.$rowCat[$type].'</td>
				<td>'.$count.'</td>';
		if(!$contr){
		if($rowCat["code"]==="C")
			$summaryMsg.='<td>See Below</td>';
		else
			$summaryMsg.='<td><input type=button class="btn btn-primary details" value="Show" function_name="ShowDetails" category="'.$rowCat["code"].'" topic="None"/></td>';
		}else
			$summaryMsg.='<td><input type=button class="btn btn-primary details" value="Show" function_name="ShowDetails" category="C" topic="'.$rowCat["code"].'"/></td>';

		$summaryMsg.='</tr>';
	}

	$summaryMsg.='</table>';
	return $summaryMsg;
}

function ForScreening(){
$uploadType = $_POST["allotmentType"];
$compObj = new Components();
if($uploadType==="refereeList")
return $compObj->RenderFileUpload_V2("refereeList.csv");
if($uploadType==="refereeAllotment")
return $compObj->RenderFileUpload_V2("refereeAllotment.csv");

//return "For Screening.........";
}
?>
