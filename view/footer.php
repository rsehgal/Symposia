<?php
function DisplayFooter(){
$footerMsg="<br/><hr/>";
//$footerMsg.='<footer class="footer bg-dark text-light">
$footerMsg.='<footer class="footer text-light">
<br/><br/>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Convener</h5>
          <p class="font-weight-bold">Name: Dr. Aradhana Shrivastava</p>
          <p>Email: convener@sympnp.org</p>
          <p>Phone: Tel:+91-22-2559 3588</p>
        </div>
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="nasiFooter" id="Home" function_name="Home">Home</a></li>
            <li><a href="#" class="nasiFooter" id="Contact" function_name="Contact">Contact Us</a></li>
            <li><a href="#" class="nasiFooter" id="Register" function_name="Register">Register</a></li>
            <li><a href="#" class="nasiFooter" id="HowToReach" function_name="HowToReach">How To Reach</a></li>
          </ul>
        </div>
	<div class="col-md-4">
          <h5>Secretary</h5>
          <p class="font-weight-bold">Name: Dr. Sanat Pandit</p>
          <p>Email: secretary@sympnp.org</p>
          <p>Phone: Tel:+91-22-2559 5193</p>
        </div>';

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
