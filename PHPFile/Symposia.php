<?php
class Symposium {
  public $variable1;
  private $variable2;

    function __construct($var1, $var2) {
    $this->variable1 = $var1;
    $this->variable2 = $var2;
  }

  public function getVariable1() {
    return $this->variable1;
  }

  private function getVariable2() {
    return $this->variable2;
  }
}

class Symposia{

function __construct(){

}

function Menu(){
	return '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Test symposium on HPC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?function=Contact">Contact</a>
	</li>
	<li class="nav-item">
          <a class="nav-link" href="?function=Signup">Signup</a>
	</li>
	<li class="nav-item">
          <a class="nav-link" href="?function=Login">Login</a>
	</li>


       
      </ul>
    </div>
  </nav>
';
}

}

class DB{
private $sname;
private $uname;
private $passwd;
private $dbname;
private $tablename;
private $conn;

function __construct() {
  //echo "Constructor called...........<br/>";
  $this->sname='localhost';
  $this->uname='sympadmin';
  $this->passwd='sympadmin';
  $this->dbname='symposia';    
}

public function Set($servName,$userName,$passWord,$databaseName){
	//echo "Reached Set";
	$this->sname=$servName;
	$this->uname=$userName;
	$this->passwd=$passWord;
	$this->dbname=$databaseName;
	//echo "Exiting SEt function...<br/>"; 
}

public function Connect(){
	//echo "$this->sname : $this->uname : $this->passwd : $this->dbname <br/>";
	$this->conn = new mysqli($this->sname, $this->uname, $this->passwd, $this->dbname);
	// Check for connection errors
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//echo "Connection Established...<br/>";
}

public function GetFieldNames($tableName){
	//echo "GetFieldName called.... <br/>";
	$query = "SELECT * FROM $tableName LIMIT 1";
	$result = $this->GetQueryResult($query);// $this->conn->query($query);
	if ($result->num_rows > 0) {
	    $fieldNames = [];
	        $row = $result->fetch_assoc();
	    foreach ($row as $fieldName => $value) {
		    //echo $fieldName;
			        $fieldNames[] = $fieldName;
	    }
	return $fieldNames;
	}
}

public function GetQueryResult($query){

$result = $this->conn->query($query);
return $result;
}

public function MakeTableRow($row){
	$tabrow="<tr>";
	$fieldNames = GetFieldNames($tablename);
	for($i=0;$i<sizeof($fieldNames);$i++){
	$rowData = "<td>Hello</td>";
	$tabrow.=$rowData;
	}
	echo $tabrow;
	return $tabrow."</tr>";
}
public function GetTableData($tableName){
	$table="<table border='1' class='table table-striped'>";
	$columnNames = $this->GetFieldNames($tableName);
	$query = "SELECT * FROM $tableName";
	$result = $this->conn->query($query);
	//echo
	$table.="<tr class='table-warning'>";
	        foreach ($columnNames as $columnName) {
	//echo
		$table.="<th >" . $columnName . "</th>";
				            }
	//echo
	       $table.="</tr>";
	while ($row = $result->fetch_assoc()) {
		//echo 
		$table.= "<tr>";
			                foreach ($columnNames as $columnName) {
						//echo
						$table.="<td>" . $row[$columnName] . "</td>";
								            }
		//echo 
		$table.="</tr>";
			            }
		//echo
	$table.="</table>";
	return $table;
}
/*
public function GetTableData($tablename){
	echo "tableData..... <br/>";
	$fieldNames = GetFieldNames($tablename);
	$query = "select * from $tablename";
	$result = $this->conn->query($query);//GetQueryResult($query);
	echo "Num of rows : ".$result->num_rows."<br/>";
	
	$table = "<table border='2'>";
	$tabrow="";
	$numofrows=$result->num_rows;
	echo "Num of rows : ".$numofrows."<br/>";
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			//echo "Hello";
			//$tabrow.= MakeTableRow($row);
			echo "Size : ".sizeof($fieldNames);
		}
	}
	return $table.$tabrow."</table>";
	
}
*/
/*
public function Connect($servername,$username,$password,$databasename){
$this->sname = $servername;
$this->uname = $username;
$this->passwd = $password;
$this->dbname = $databasename;
$conn = new mysqli($sname, $uname, $passwd, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection Established...";
}
 */
}
?>
