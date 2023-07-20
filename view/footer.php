<?php
require_once "../model/Symposia.php";

function DisplayFooter(){
$obj = new DB();
$query = "select * from contactus";
$result = $obj->GetQueryResult($query);

$rowConv=$result->fetch_assoc();
$rowSec=$result->fetch_assoc();
$rowLocalConv=$result->fetch_assoc();

$footerMsg="<br/><hr/>";
//$footerMsg.='<footer class="footer bg-dark text-light">
$footerMsg.='<footer class="footer text-light">

<br/><br/>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>'.$rowConv["Post"].'</h5>
          <p class="font-weight-bold">Name: '.
	  $rowConv["Name"].'</p>
          <p>Email: '.$rowConv["Email"].'</p>
          <p>Phone: Tel:'.$rowConv["ContactNumber"].'</p>
        </div>
	<div class="col-md-4">
	  <h5>'.$rowLocalConv["Post"].'</h5>
          <p class="font-weight-bold">Name: '.
          $rowLocalConv["Name"].'</p>
          <p>Email: '.$rowLocalConv["Email"].'</p>
          <p>Phone: Tel:'.$rowLocalConv["ContactNumber"].'</p>
       </div>

       <div class="col-md-4">
	  <h5>'.$rowSec["Post"].'</h5>
          <p class="font-weight-bold">Name: '.
          $rowSec["Name"].'</p>
          <p>Email: '.$rowSec["Email"].'</p>
          <p>Phone: Tel:'.$rowSec["ContactNumber"].'</p>
       </div>
	<!--<div class="col-md-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="nasiFooter" id="Home" function_name="Home">Home</a></li>
            <li><a href="#" class="nasiFooter" id="Contact" function_name="Contact">Contact Us</a></li>
            <li><a href="#" class="nasiFooter" id="Register" function_name="Register">Register</a></li>
            <li><a href="#" class="nasiFooter" id="HowToReach" function_name="HowToReach">How To Reach</a></li>
          </ul>
        </divi>-->'
	;


        /*<div class="col-md-4">
          <h5>Contact Us</h5>
          <p> Developement Team</p>
          <p>Email: support@nasi2023.in</p>
          <p>Phone: 123-456-7890</p>
        </div>*/
$footerMsg.='</div>
    </div>
<br/><br/>
  </footer>';

$associatedJs = '<script>
		$(function(){
		 var data={};
		 $(".nasiFooter").click(function(e){
			e.preventDefault();
			//alert("Link "+$(this).attr("id")+" clicked");
			data["function_name"]=$(this).attr("function_name");
			$.ajax({
			    url: "../controller/func.php",
			    method: "POST",
			    data : data,
			    success: function(response) {
			    $("#result").html(response);
			    }
			  });
		});
		});
		
		
		 </script>';
return $footerMsg.$associatedJs;
}
?>

