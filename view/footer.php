<?php
function DisplayFooter(){
$footerMsg="<br/><hr/>";
$footerMsg.='<footer id="nasifooter" class="footer bg-dark text-light">
<br/><br/>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-4 text-center">
	  <h5>Convener</h5>
          <p class="font-weight-bold">Dr. Qwerty Poiuy</p>
	 KLM Institure, POI.

        </div>

        <div class="col-md-4">
        </div>
      </div>
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

