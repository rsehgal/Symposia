<?php
require "../model/Symposia.php";
function my_function() {
  // Your function logic here
  $data = array("Hello", "Ha ha aha d");
  return json_encode(array("data" => implode(" ", $data)));
}
function ServeSignup(){
		$obj = new DB();
		$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
		$obj->Connect();	
 		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query = "insert into user_credentials values('$username','$password','$firstname','$lastname','$email')";
		echo $query."<br/>";
		$obj->GetQueryResult($query);
		echo "$username : $password : $firstname : $lastname : $email";	
               return "<div>ServeSignup function called..........</div><br/>".$_POST['firstname'];
}

function ServeLogin(){
               return "<div>ServeLogin function called..........</div><br/>".$_POST['username'];
}

if (isset($_POST['function_name'])) {
  $function_name = $_POST['function_name'];
  if (function_exists($function_name)) {
    $response_data = call_user_func($function_name);
    echo $response_data;
  }
}

?>