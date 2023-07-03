<?php
session_start();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
The National Academy of Sciences, India, NASI-2023.
</title>
  <!-- Bootstrap CSS -->
<!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/cosmetic.css">
 <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

.custom-navbar,.footer,.header{
background: #5b2c6f ;
}
.colHeader{
	padding-left:0;
	padding-right:0;
}


.navbar {
      padding-top: 0;
      padding-bottom: 0;
    }

    .navbar-nav > li > a {
      padding-top: 10px;
      padding-bottom: 10px;
    }


.btn-custom {
  font-size: 24px;
}

#loadingGif {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display:none;
  /* Add any additional styling you need */
}
</style>
<script>
$(document).ready(function(){
	//This block control the hover color of drop down menus
	$(".dropdown-item").hover(function(){
		$(".dropdown-item").each(function(){
			$(this).css("background-color","273746");
		});
		//$(this).css("background-color","ffaf33");
		$(this).css("background-color","b03a2e");
	});
	//-----------------------------------------------------

	$("#YourTasks").hide();

	setTimeout(function(){
	$("refereeUpdateStatus").alert("close");
	},2000);
//--------------------------------------------------
//this block is just to read the home text using ajax
var dataHome={};
dataHome['function_name']="NASI";
$.ajax({
            url: "../controller/func.php",
            method: "POST",
            data : dataHome,
            success: function(response) {
            $("#result").html(response);
            }
          });
//-------------------------------------------------

$('.signupForm').each(function() {
  //Perform operations on each element here
	   console.log($(this).attr("id")); // Example operation: log the text content of each element
 });
			
/*$('.symposiaForms').on('submit',function(event){
	//alert('hahahaa');
	alert($(this).attr('id'));
});*/
/*
$('.sympFormSubmit').on('submit',function(event){
	console.log("jlkjkljkljkjkljkl");
	alert('hahahaa');
	//alert($(this).attr('id'));
});
 */


$('.nasiMenu,.menuCommon').on('click',function(event){
	//alert("Nasi Menu clicked.......");
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName="SympnpHeader";//$(this).attr("id");
	//alert(funcName);
	data['function_name']=funcName;
	data['value']=$(this).attr("id");
	//alert(data['value']);
	console.log(data);
	$.ajax({
	    url: "../controller/func.php",
	    method: "POST",
	    data : data,
	    success: function(response) {
	    $("#headerDiv").hide();
	    //$("#result").delay(1000).fadeIn();
	    $("#headerDiv").html(response);
	    $("#headerDiv").fadeIn(1000);
	    }
	  });

});

$('.nasiMenu,.menuCommon').on('click',function(event){
	//alert("Nasi Menu clicked.......");
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName=$(this).attr("id");
	//alert(funcName);
	data['function_name']=funcName;
	data['value']=$(this).attr("id");
	//alert(data['value']);
	console.log(data);
	$.ajax({
	    url: "../controller/func.php",
	    method: "POST",
	    data : data,
	    success: function(response) {
	    $("#result").hide();
	    $("#result").html(response);
	    $("#result").fadeIn(1000);
	    }
	  });

});

//$('.Submissions').on('click',function(event){
/*$('.menuCommon').on('click',function(event){
	//alert(" Menu clicked.......");
	//alert($(this).attr("id"));
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName=$(this).attr("id");

	//alert(funcName);
	data['function_name']=funcName;
	console.log(data);

	$.ajax({
	    url: "../controller/func.php",
	    method: "POST",
	    data : data,
	    success: function(response) {
	    $("#result").html(response);
	    }
	  });

});
*/
$('.Accommodation').on('click',function(event){
	//alert(" Menu clicked.......");
	//alert($(this).attr("id"));
	
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName=$(this).attr("functionName");

	//alert(funcName);
	data['function_name']=funcName;
	console.log(data);

	$.ajax({
	    url: "../controller/func.php",
	    method: "POST",
	    data : data,
	    success: function(response) {
	    $("#result").html(response);
	    }
	  });

});

$('.Committees').on('click',function(event){
	//alert("Committees Menu clicked.......");
	event.preventDefault();
	var funcName="";
	var data={};
	var funcName=$(this).attr("id");
	//alert(funcName);
	data['function_name']=funcName;
	console.log(data);

	$.ajax({
	    url: "../controller/func.php",
	    method: "POST",
	    data : data,
	    success: function(response) {
	    $("#result").html(response);
	    }
	  });

});

$('.symposiaForms').on('submit',function(event){
	alert("Submit of Signup clicke....");
	event.preventDefault();
	var funcName="";
	var data={};
	$('.signupForm').each(function() {
		console.log($(this).val()); 
		data[$(this).attr('id')]=$(this).val();
	});
	$('.loginForm').each(function() {
		console.log($(this).val()); 
		data[$(this).attr('id')]=$(this).val();
	});


if($(this).attr('id')=="login"){
	funcName="ServeLogin";
	data['function_name']=funcName;

}
if($(this).attr('id')=="signup"){
	var funcName="ServeSignup";
	data['function_name']=funcName;
	
}
$.ajax({
    url: "../controller/func.php",
    method: "POST",
    data : data,
    success: function(response) {
      console.log(response);
      $("#result").html(response);
    }
  });
});

/*$('#Poster').click(function(){

    var iframe = $('<iframe>');
    iframe.attr('src','../docs/poster.pdf');
    $('#result').html(iframe);
});*/
$("#logout").on("click",function(e){
      //e.preventDefault();
      //alert("logout");
	var data={};
	data["function_name"]="Logout";
        $.ajax({
            url: "../controller/func.php",
            method: "POST",
            data : data,
            success: function(response) {
            $("#loginstatus").html(response);
            }
          });

});

});
var dataUp=new FormData();
                        //var data={};
</script>

<style>
    iframe{
        width: 100%;
	height: 100%;
        border: 2px solid #ccc;
    }
</style>

</head>
<body>
<?php
//require_once "../controller/helpers.php";
//$_SESSION["loggedin"]=TRUE;
//$_SESSION["username"]="ABCD";
//session_write_close();
//$_SESSION['logged']=TRUE;

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require "../globals.php";
require "../model/Symposia.php";
require "Forms.php";
require "footer.php";
require "header.php";
require "MyCarousel.php";
$objSympo = new Symposia();
echo "<div class='row'>";
echo "<div class='col nasiheader'></div>";
echo "</div>";

//--------------------------------------------


//--------------------------------------------

echo "<div class='row' >";
echo "<div class='col-1'></div>";
echo "<div class='col maincontent border border-dashed border-primary'>";
echo "<div id='menuDiv'>";
echo $objSympo->Menu();
echo "</div>";


echo SympnpCarousel();

echo "<div id='headerDiv' class='header'>".SympnpHeader()."</div>";
//echo $objSympo->Menu();
echo "<div id='container'>";
echo "<div id='refereeUpdateStatus'class='alert alert-dismissible fade show' ></div>";

echo "<div id='result' class='' ></div>";
echo "<div id='loginstatus' ></div>";
echo '<img id="loadingGif" src="../images/loadingTransparent.gif" alt="Loading...">';

echo "</div>";

function GenJs(){ return "<script> alert('Hello Raman') </script>";}

echo DisplayFooter();
echo "</div>";
echo "<div class='col-1'></div>";
echo "</div>"; //row div
?>

</body>
</html>

