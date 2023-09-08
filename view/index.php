<?php
session_start();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
DAE-BRNS Nuclear Physics Symposium
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
.text-Submitted{
  color :  #641e16;
}
.text-Received{
  color :  green;
}
.tr-Received{
  background-color: #abebc6;

}
.tr-Submitted{
  background-color: #f5b7b1;

}
.tr-peach{
  background-color :   #ec7063 ;
}
.tr-lightgreen{
  background-color :   #abebc6 ;
}
.btn-countdown{
  padding: 2px 2px;
  color: #fff;
  border-radius: 35px;
  border: 2px solid rgba(0, 70, 147, 0.75);
}

.tr-red{
background-color: #ff0000;
}
.tr-purple{
background-color: #5b2c6f ;
}

.text-brown{
  color :  #641e16;
}
.text-chrome{
  color :   #f1c40f ;
}
.text-purple{
  color :   #8e44ad ;
}
.text-peach{
  color :   #ec7063 ;
}

.btn-gray{
  background-color: #abb2b9 ;
}
.btn-rounded{
  color: #fff;
  border-radius: 35px;
  border: 2px solid rgba(0, 70, 147, 0.75);
}

.taskbutton {
  color: #fff;
  background-color: #5b2c6f;
  border-radius: 35px;
  border: 2px solid rgba(0, 70, 147, 0.75);
}
.taskbutton-danger {
  color: #fff;
  background-color: #ff0000;
  border-radius: 35px;
  border: 2px solid rgba(0, 70, 147, 0.75);
}

.taskbutton:hover {
  color:  #17202a;
  background: rgb(39,174,96, 0.75);
  border: 2px solid rgba(39,174,96, 0.75);
}

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

function startCountdown(currtime,reftime) {
      const countdownElement = document.getElementById('countdownn');

      function updateCountdown() {
	//alert("Hello");
        const timeDifference = reftime-currtime;

        const days = Math.floor(timeDifference / ( 60 * 60 * 24));
        const hours = Math.floor((timeDifference % ( 60 * 60 * 24)) / (60 * 60));
        const minutes = Math.floor((timeDifference % ( 60 * 60)) / (60));
        const seconds = Math.floor((timeDifference % ( 60)) / 1);

	//alert(days+" : "+hours+" : "+minutes+" : "+seconds);

        //countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
	$("#countdownDays").html(days);
	$("#countdownHours").html(hours);
	$("#countdownMinutes").html(minutes);
	$("#countdownSeconds").html(seconds);

	currtime = currtime+1;

        if (timeDifference <= 0) {
          countdownElement.innerHTML = 'Countdown expired!';
          clearInterval(interval);
        }
      }

      //updateCountdown();
      const interval = setInterval(updateCountdown, 1000);
    }


$(document).ready(function(){

	$.getJSON('../controller/get_server_time.php', function(data) {
	      const serverTime = data.currtime ; // Convert seconds to milliseconds
		console.log(data);
		startCountdown(data.currtime,data.reftime);
      		//startCountdown(serverTime);
    	});

	$("#RegistrationForm").hide();
	
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
	$("#pdfContainer").hide();
	$("#pdfIframe").hide();

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
require_once "../controller/countdown.php";
$objSympo = new Symposia();
echo "<div class='row'>";
echo "<div class='col nasiheader'></div>";
echo "</div>";

//--------------------------------------------


//--------------------------------------------

echo "<div class='row' >";
echo "<div class='col-1'></div>";
echo "<div class='col maincontent border border-dashed border-primary'>";
echo "<div id='menuDiv' class='sticky-top'>";
echo $objSympo->Menu();
echo "</div>";


echo SympnpCarousel();

echo "<div id='headerDiv' class='header'>".SympnpHeader()."</div>";
echo "<div id='countdown' class='countdown'>".CountDown()."</div>";
echo "div id='message' class='blink font-weight-bold text-danger'>
Last date of abstract submission is 15 September 2023
</div>";
echo " <div id='countdownn'></div>";
//echo $objSympo->Menu();
echo "<div id='container'>";
echo "<div id='refereeUpdateStatus'class='alert alert-dismissible fade show' ></div>";

echo "<div id='result' class='' ></div>";
echo "<div id='loginstatus' ></div>";
echo '<div id="pdfContainer">
  <object id="pdfObject" data="" type="application/pdf" width="100%" height="500px">
    <p>Unable to Generated PDF.</p>
  </object>
</div>';
echo '<iframe id="pdfIframe" width="100%" height="500px"></iframe>';
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

