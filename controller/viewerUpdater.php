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
function FillDropDown(){
$obj = new DB();
$query = "select * from mapping";
$result = $obj->GetQueryResult($query);
$dropDownMsg='<select class="select">';
while($row = $result->fetch_assoc()){
$dropDownMsg.='<option>'.$row["taskname"].'</option>';
}
$dropDownMsg.='</select>';
return $dropDownMsg;
}

function ViewerUpdater(){
	//return "ViewerUpdater";
	//return GenerateView("mapping");
	return FillDropDown();
}

?>
