<?php

function CountDown(){
$countDownMsg = '<div class="bg-secondary text-center text-light">
			<!-- <div class="row">
				<div class="col"><h4><hour>Days</hour></h4> </div>
				<div class="col"><h4><hour>Hours</hour></h4> </div>
				<div class="col"><h4><hour>Minutes</hour></h4> </div>
				<div class="col"><h4><hour>Seconds</hour> </h4> </div>
			</div>
			-->
			
			<div class="container">	
			   <div  class="row justify-content-center align-items-center text-center">
				<div class="col-lg-2 col-md-2 col-sm-12 btn-countdown btn-primary font-weight-bold" style="text-align: center;">
					<days id="countdownDays"></days>  Days</h4> 
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 btn-countdown btn-primary font-weight-bold " style="text-align: center;">
					<hours id="countdownHours"></hours>  Hours</h4> 
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 btn-countdown btn-primary font-weight-bold" style="text-align: center;">
					<minutes id="countdownMinutes"></minutes>  Minutes</h4> 
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 btn-countdown btn-primary font-weight-bold" style="text-align: center;">
					<seconds id="countdownSeconds"></seconds>  Seconds </h4> 
				</div>
			</div>
			</div>
		</div>';
return $countDownMsg;
}


?>
