<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Menu Example</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
$('.symposiaForms').on('submit',function(event){
	//alert('hahahaa');
	alert($(this).attr('id'));
});
/*
$('.sympFormSubmit').click(function(event){
	alert('hahahaa');
	//alert($(this).attr('id'));
});
 */


$('.symposiaForms').on('submit',function(event){
	event.preventDefault();
	var funcName="";
if($(this).attr('id')=="login"){
funcName="ServeLogin";
}
if($(this).attr('id')=="signup"){
funcName="ServeSignup";
}

$.ajax({
    url: "TestAjax/func.php",
    method: "POST",
    //dataType: "json",
    //data: {function_name: "my_function"},
    data: {function_name: funcName},
    success: function(response) {
      console.log(response);
      //var data = response.data;
      //alert(response.cand);
      //$("#result").html(data);
      $("#result").html(response);
    }
  });
});

});
</script>

</head>
<body>
<?php

require "globals.php";
require "Symposia.php";
require "Forms.php";
$objSympo = new Symposia();
echo $objSympo->Menu();

echo "<div id='result'></div>";


$forms = new Forms();

if (isset($_GET['function']) && $_GET['function'] == 'Signup') {
	$funcName='Signup';
    // call the function
	//$myClass->myFunction();
	echo $forms->Signup();
}
if (isset($_GET['function']) && $_GET['function'] == 'Login') {
	$funcName='Login';
	echo $funcName."<br/>";
	// call the function
	//$myClass->myFunction();
	echo $forms->Login();
	//GenJs();
}

function GenJs(){ return "<script> alert('Hello Raman') </script>";}

//require "FormServers.php";
//echo $funcName;

/*
 * For every form that needs to be processed at the backend
 * add a function in the Forms.php, and a correponding
 * block below
 */
/*
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Signup') {
                    // call the function to process the form data
                    echo $forms->ServeSignup();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Login') {
                    // call the function to process the form data
                    echo $forms->ServeLogin();
}
 */
//echo $forms->Signup();
?>

</body>
</html>

