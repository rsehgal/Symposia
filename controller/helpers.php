<?php
 //function AddSubEntries($subEntries,$mainEntry){
 function AddSubEntries($associativeSubEntries,$mainEntry){
	$subEntries = $associativeSubEntries[$mainEntry];
	$catEntries = $associativeSubEntries["code"];
        $main='<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" id="topicDropDown" data-toggle="dropdown">'.
      $mainEntry.'
    </button>';
        $subMenu='<div class="dropdown-menu">';
        for($i= 0 ; $i < count($subEntries) ; $i++){
           
           $subMenu.='<a class="dropdown-item '.$mainEntry.'" id="'.$subEntries[$i].'" name="'.$subEntries[$i].'" catid="'.$catEntries[$i].'">'.$catEntries[$i]." : ".$subEntries[$i].'</a>';
}
        
        $subMenu.='</div>';
        return $main.$subMenu."</div>";
}

 function GetDropDown($tablename,$mainEntry){
                //return "Hello Raman";
                $obj = new DB();
                //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
                //$obj->Connect();
                //$valArray = $obj->GetColumnArray("topics","Topic");     
                //$valArray = $obj->GetColumnArray($tablename,$mainEntry);     
                $valArray = $obj->GetAssociativeArray($tablename);     
                //return AddSubEntries($valArray[$mainEntry],$mainEntry);
                return AddSubEntries($valArray,$mainEntry);
                //return $valArray[0];
        }

 function AddDecisionEntries($associativeSubEntries,$associativeSubNameEntries,$mainEntry,$buttonId,$status,$filename,$allotmenType,$id=0){
	$subEntries = $associativeSubEntries[$mainEntry];
	$subNameEntries = $associativeSubNameEntries[$mainEntry];
	$catEntries = $associativeSubEntries["code"];
	$str='<table class="table">
		<tr>
		<td>';
        $main='<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" id="topicDropDown" data-toggle="dropdown">'.
      $mainEntry.'
    </button>';
        $subMenu='<div class="dropdown-menu" style="height: 200px; overflow-y: auto;">';
        $codeNameMapping=array();
        for($i= 0 ; $i < count($subEntries) ; $i++){
		$codeNameMapping[$subEntries[$i]]=$subNameEntries[$i];
           
           $subMenu.='<a class="dropdown-item '.$mainEntry.'" functionName="'.$allotmenType.'" filename="'.$filename.'" refnum="ref'.$id.'" id="'.$subEntries[$i].'" buttonid="'.$buttonId.'_'.$id.'" value="'.$subEntries[$i].'" refid="'.$id.'" name="'.$subEntries[$i].'" catid="'.$catEntries[$i].'" title="'.$subNameEntries[$i].'" data-toggle="tooltip" data-placement="right">'.$subEntries[$i].'</a>';
}
        
        $subMenu.='</div>';

	$str.=$main.$subMenu.'</td></tr>';
	$str.='<tr></td><input type="text" id="decisionText_'.$buttonId.'_'.$id.'" value="'.$status.'" title="'.$codeNameMapping[$status].'" class="form-control decisionText" data-toggle="tooltip" data-placement="right"/></td></tr>';

	if($allotmenType=="AllotReferee"){
	$obj = new DB();
	$query = 'select marks, remarks from refereeAllotment where refereeName="'.$status.'" and Filename="'.$filename.'"';
	$result = $obj->GetQueryResult($query);
	if($result){
	$row=$result->fetch_assoc();
	$remarksArea='<tr><td> <textarea class="form-control" id="remarks_'.$buttonId.'_'.$id.'">'.$row["marks"].' : '.$row["remarks"].'</textarea></td></tr>';
	$str.=$remarksArea;
	}

	}
	$str.='</table>';

	$associatedJs = '<script>
			$(".decisionText").change(function(){
				//alert($(this).attr("id"));
			});
			 </script>
			';

	return $str.$associatedJs;
        //return $main.$subMenu."</div>";
}

function GetArray($allotmenType){
$obj=new DB();
$query="";
if($allotmenType=="Referee")
$query='select * from refereeList where 1';

if($allotmenType=="Coordinator")
$query='select * from coordinatorList where 1';

$result = $obj->GetQueryResult($query);

$coordinatorsArray = array();
$coordinatorsArrayUname = array();
$coordinatorsArrayName = array();
$superArray = array();
$counter=0;
while($row = $result->fetch_assoc()){
 $coordinatorsArrayUname[$counter]=$row["uname"];
if($allotmenType=="Referee")
 $coordinatorsArrayName[$counter]=$row["refereeName"];
if($allotmenType=="Coordinator")
 $coordinatorsArrayName[$counter]=$row["name"];
 $counter++;
}

$superArray["uname"]=$coordinatorsArrayUname;
$superArray["name"]=$coordinatorsArrayName;

//return $coordinatorsArray;
return $superArray;
}

//For Ajax Call
function GetScore(){
	$fileName = $_POST["filename"];
	$obj = new DB();
	$query = 'select sum(marks) as total from refereeAllotment where Filename="'.$fileName.'"';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	$total = $row["total"];

	$query = 'select count(marks) as num from refereeAllotment where Filename="'.$fileName.'" and marks <> 0';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	$num = $row["num"];

	return ($total/$num);

}

//For Normal Call
function GetScore_Normal($fileName){
	//$fileName = $_POST["filename"];
	$obj = new DB();
	$query = 'select sum(marks) as total from refereeAllotment where Filename="'.$fileName.'"';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	$total = $row["total"];

	$query = 'select count(marks) as num from refereeAllotment where Filename="'.$fileName.'" and marks <> 0';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	$num = $row["num"];

	return ($total/$num);

}

function GetFinalDecision($fileName){
	$totalMarks  = GetScore_Normal($fileName);
        if($totalMarks >= 7){
		return "Oral";
	}elseif($totalMarks >= 4 && totalMarks < 7){
		return "Poster";
	}else{
		return "Rejected";
	}
}

function HomeNASI(){
$homeMsg="<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
<h3>";
$homeMsg.= "<raman class='font-weight-bold'>DAE Symposium on Nuclear Physics</raman> covering a wide range of topics is conducted annually. The aim of this series of symposia is to provide a scientific forum to the nuclear physics community to present their research work and to interact with the researchers in this area. This year the symposium will be held at <raman class='font-weight-bold'> Indian Institute of Technology Indore, Madhya Pradesh </raman> during 
<raman class='font-weight-bold'> December 09-13, 2023.</raman> 
The scientific deliberations of the symposium will consist of plenary
talks, oral / poster presentations of contributory paper and
 theses presentations. 
In addition, there will be talks by selected Young Achiever Award (YAA) nominees. 
<raman class='font-weight-bold'>A one-day pre-symposium Orientation Programme</raman> 
will be held on <raman class='font-weight-bold'>December 8, 2023.</raman>";
$homeMsg.="</h3></div></div>";

return $homeMsg;
/*return "<hr/><br/><div class='align-items-center justify-content-center'>
<div class='w-75 p-3 bg-light bg-darken-sm mx-auto text-justify'>
<h5>The <raman class='text-primary font-weight-bold'>National Academy of Sciences, India </raman> (initially called “The Academy of Sciences of United Provinces of Agra and Oudh”) was founded in the year 1930, with the objectives to provide a national forum for the publication of research work carried out by Indian scientists and to provide opportunities for exchange of views among them. 
<br/><br/><p><raman class='text-primary font-weight-bold'>93<sup>rd</sup></raman> Annual Session  along with the scientific sessions on Physical and Biological sciences will be held from <raman class='text-primary font-weight-bold'>03 Dec. to 05 Dec 2023</raman> at  
<raman class='font-weight-bold'>DAE Convention Centre, Bhabha Atomic Research Centre, Mumbai.</raman>
<br/>
<br/>
The Scientific Sessions will be held in two sections. The scientific papers are presented by selected researchers/scientists in scientific sessions, for which prior submission of the Abstract(s)/Paper(s) is necessary .
</h5>
</div></div>
";*/
}


function GetTime($timestr,$start=1){

	if($start==1){
		return strtotime($timestr);
	}else{
		return strtotime($timestr)+(24*60*60);
	}

}

function GetStartTime($timestr){
	return GetTime($timestr,1);
}

function GetEndTime($timestr){
	return GetTime($timestr,0);
}

function GetSympDuration(){
	$obj = new DB();
        $query = "select datefrom,dateto from symposium where volume=67";
        $result = $obj->GetQueryResult($query);
        $row = $result->fetch_assoc();
        $start_date = $row["datefrom"];
        $end_date = $row["dateto"];
	//return date("d-M-Y",strtotime($end_date));
	return date("M",strtotime($start_date))." ".date("d",strtotime($start_date))."-".date("d",strtotime($end_date)).", ".date("Y",strtotime($end_date));

}

function GetSympLastDate(){
	$obj = new DB();
	$queryField="dateto";
        $query = "select ".$queryField." from symposium where volume=67";
        $result = $obj->GetQueryResult($query);
        $row = $result->fetch_assoc();
        $end_date = $row[$queryField];
	return date("d-M-Y",strtotime($end_date));
}
function GetSympStartDate(){
	$obj = new DB();
	$queryField="datefrom";
        $query = "select ".$queryField." from symposium where volume=67";
        $result = $obj->GetQueryResult($query);
        $row = $result->fetch_assoc();
        $start_date = $row[$queryField];
	return date("d-M-Y",strtotime($start_date));
}

function GetLastDate($type="reg"){
	$obj = new DB();
	$queryField=$type."_end_date";
        $query = "select ".$queryField." from symposium where volume=67";
        $result = $obj->GetQueryResult($query);
        $row = $result->fetch_assoc();
        $end_date = $row[$queryField];
	return date("d-M-Y",strtotime($end_date));
}
function GetStartDate($type="reg"){
	$obj = new DB();
	$queryField=$type."_start_date";
        $query = "select ".$queryField." from symposium where volume=67";
        $result = $obj->GetQueryResult($query);
        $row = $result->fetch_assoc();
        $start_date = $row[$queryField];
	return date("d-M-Y",strtotime($start_date));
}


function RegisteredUser(){
        session_start();
        $obj = new DB();
        $query = "select * from registration where uname='".$_SESSION["username"]."'";
        $counter = $obj->GetCounterFromQuery($query);
        return $counter;

}

function RefereeAcceptanceStatus(){
	session_start();
	$obj = new DB();
	$query = "select * from refereeConfirmation where uname='".$_SESSION["username"]."'";
	$counter = $obj->GetCounterFromQuery($query);
	if($counter===0){
		return false;
	}else{
		$result = $obj->GetQueryResult($query);
		$row = $result->fetch_assoc();
		return $row["status"];
	}
	
}

function EmailExist($email){
$query = 'select email from user_credentials where email="'.$email.'"';
$obj = new DB();
$counter = $obj->GetCounterFromQuery($query);
if((int)$counter===0)
	return FALSE;
else
	return TRUE;
}

//Will be useful if the function_name is set properly
function LinkJS(){
$associatedJS = '<script>
                $(function(){
                 $(".link").click(function(e){
			var funcName=$(this).attr("function_name");
                        $("#"+funcName).trigger("click");
                });
                });
                </script>';
return $associatedJS;
}

function DownloadCSV_FromTable(){
//return "DownloadCSV_FromTable....";
$tablename=$_POST["tablename"];
$query = "select * from $tablename";
//return 
DownloadCSV_FromQuery($query);
}

function DownloadCSV_FromQuery($query){
//return "DownloadCSV_FromQuery";
$obj = new DB();
$result = $obj->GetQueryResult($query); 
/*$outp="";
while($row = $result->fetch_assoc()){
$outp.=$row."<br/>";
}
return $outp;*/

if ($result->num_rows > 0) 
{
    // Create a file pointer
    //$output = fopen('test.csv', 'w');
    $output = fopen('php://output', 'w');

    // Output CSV header
    $header = array_keys($result->fetch_assoc());
    fputcsv($output, $header);

    // Output CSV data
    //$out="";
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
	//$out.=$row."<br/>";
	//echo $output;
    }

	//return $out;

    // Close the file pointer
    fclose($output);

    // Set headers for file download
    //header('Content-Type: text/csv');
    //header('Content-Disposition: attachment; filename="data.csv"');
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Output the contents of the file
    //return readfile('test.csv');
    return readfile('php://output');
} 
else {
    echo "No records found in the table.";
}
}
?>
