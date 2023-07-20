<?php

require_once "../model/Symposia.php";

//public function ViewerUpdater($tableName,$showUname=0,$allowDeletion=0){
function GenerateView($tableName,$showUname=0,$allowDeletion=0){
$obj=new DB();
$table="<table border='1' class='table table-striped'>";
        $columnNames = $obj->GetFieldNames($tableName);
        $query = "SELECT * FROM $tableName";
        //$result = $obj->conn->query($query);
        $result = $obj->GetQueryResult($query);
        //echo
        $table.="<tr class='table-warning'>";
                foreach ($columnNames as $columnName) {
        //echo
                if($columnName=='uname'){
                if($showUname==1){
                $table.="<th >" . $columnName . "</th>";
                }
                }else{
                $table.="<th >" . $columnName . "</th>";
                }
                }
                if($allowDeletion==1)
                $table.="<td>Update</td>";
        //echo
               $table.="</tr>";
        while ($row = $result->fetch_assoc()) {
                //echo 
                $table.= "<tr>";
                foreach ($columnNames as $columnName) {
                        //echo

                         if($columnName=='uname'){
                        if($showUname==1)
                                $table.="<td>" . $row[$columnName] . "</td>";
                        }else{
                                $table.="<td>" . $row[$columnName] . "</td>";
                        }
                }
                if($allowDeletion==1)
                $table.="<td><input type='button' class='deleteEntry' oftable='".$tableName."' id='".$row['uname']."' value='Delete'></input></td>";
                //echo 
                $table.="</tr>";
        }
                        //echo
        /*if($showUname==1)
        $table.="</table><br/>"."ShowUname set <br/>";
        else
        $table.="</table><br/>"."ShowUname NOT set <br/>";*/
        return $table;

}

function GenerateUpdaterView(){
$obj=new DB();
$tableName = $_POST["tablename"];
$showUname=1;
//if($tableName=="refereeList")
//$showUname=1;
$allowDeletion=0;
$allowUpdation=1;
$table="<table border='1' class='table table-striped'>";
        $columnNames = $obj->GetFieldNames($tableName);
        $query = "SELECT * FROM $tableName";
        //$result = $obj->conn->query($query);
        $result = $obj->GetQueryResult($query);
        //echo
        $table.="<tr class='table-warning'>";
                foreach ($columnNames as $columnName) {
        //echo
                if($columnName=='uname'){
                if($showUname==1){
                $table.="<th >" . $columnName . "</th>";
                }
                }else{
                $table.="<th >" . $columnName . "</th>";
                }
                }
                if($allowDeletion==1)
                $table.="<td>Update</td>";

		if($allowUpdation==1)
                $table.="<td class='font-weight-bold'>Change It</td>";

        //echo
               $table.="</tr>";

	$counter=0;
        while ($row = $result->fetch_assoc()) {
		$counter++;
		$buttonId="Button_".$counter;
                //echo 
                $table.= "<tr>";
                foreach ($columnNames as $columnName) {
                        //echo

                         if($columnName=='uname'){
                        if($showUname==1)
                                $table.="<td class='".$buttonId."'>" . $row[$columnName] . "</td>";
                        }else{
                                $table.="<td class='".$buttonId."'>" . $row[$columnName] . "</td>";
                        }
                }
                //if($allowDeletion==1)
                if($allowUpdation==1)
                //$table.="<td><input type='button' class='deleteEntry' oftable='".$tableName."' id='".$row['uname']."' value='Update'></input></td>";
                $table.="<td><input type='button' class='btn btn-primary deleteEntry' oftable='".$tableName."' id='".$buttonId."' value='Update'></input></td>";
                //echo 
                $table.="</tr>";
        }
                        //echo
        /*if($showUname==1)
        $table.="</table><br/>"."ShowUname set <br/>";
        else
        $table.="</table><br/>"."ShowUname NOT set <br/>";*/
        return $table;

}

function FillDropDown(){
$obj = new DB();
$query = "select * from mapping";
$result = $obj->GetQueryResult($query);
$dropDownMsg='<h2 class="text-primary">Select a table to view</h2><select class="custom-select" id="tableToView">';
while($row = $result->fetch_assoc()){
$dropDownMsg.='<option class="optionTable" tablename="'.$row["tablename"].'">'.$row["taskname"].'</option>';
}
$dropDownMsg.='</select><br/><hr/>';

//div to load the table
$dropDownMsg.='<div id="viewTable"></div>';

$associatedJS='<script>
		$(function(){
			//alert("JS loaded");
			var data={};
			data["function_name"]="GenerateUpdaterView";
			//alert(data["function_name"]);

			/*$("#tableToView").change(function() {
			var id = $(this).children(":selected").attr("tablename");
			alert(id);
			});
			*/

			$("#tableToView").change(function(e) {
				e.preventDefault();
				data["tablename"]=$(this).children(":selected").attr("tablename");
				alert(data["tablename"]);
				$.ajax({
				    url: "../controller/func.php",
				    method: "POST",
				    data : data,
				    success: function(response) {
				    $("#viewTable").html(response);
				    }
				  });
		
			});
			
		});
		</script>';
return $dropDownMsg.$associatedJS;
}

function ViewerUpdater(){
	//return "ViewerUpdater";
	//return GenerateView("mapping");
	return FillDropDown();
}

?>
