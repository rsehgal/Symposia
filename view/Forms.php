<?php
require "../controller/helpers.php";
require "../components/Components.php";
class Forms{


	function __construc(){
	
	}

	public function Signup(){
	return '<br/><div class="container">
		<h2 class="text-danger">Previous User Accounts are no more valid, Kindly signup to create a new account.</h2><hr/>
		<h2>User Account Creation Form</h2>
		      <form method="POST" id="signup" class="symposiaForms">
			<div class="form-group">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control signupForm" id="firstname" name="firstname" required>
                        </div>
			<div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control signupForm" id="lastname" name="lastname" required>
                        </div>

			<div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control signupForm" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control signupForm" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control signupForm" id="password" name="password" required>
                        </div>
			<div class="form-group">
                                <label for="phonenum">Contact Num:</label>
                                <input type="text" class="form-control signupForm" id="phonenum" name="phonenum" required>
                        </div>

                        <button type="submit" class="btn btn-primary sympFormSubmit round-ended-btn">Create Account</button>
		</form>
		<script>
		$(".symposiaForms").on("submit",function(event){
			//alert("Finally called......");
			event.preventDefault();
			var funcName="";
			var data={};
		
			$(".signupForm").each(function() {
			console.log($(this).val());
			data[$(this).attr("id")]=$(this).val();
			var funcName="ServeSignup";
			data["function_name"]=funcName;
			});
			console.log(data);


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


		</script>


        </div>';
	}


	public function ForgotPassword(){
	
		$formContent='<br/><div class="container">
                <h2> Recover Password </h2>
                <form method="POST" id="reset" >
                        <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control resetForm" id="emailResetForm" name="emailResetForm" required>
                        </div>
                        <button type="submit" id="submitforgot" class="btn btn-primary btn-primary" >Submit</button>
                </form>';

		$associateJs = '<script>
				$("#submitforgot").on("click",function(e){
					e.preventDefault();
					var data={};
					data["function_name"]="ServeForgotPassword";
					data["email"]=$("#emailResetForm").val();
					$.ajax({
						    url: "../controller/func.php",
						    method: "POST",
						    data : data,
						    success: function(response) {
						    $("#result").html(response);
						    }
						  });

					
				});
	
				</script>';

		return $formContent.$associateJs;
	}

	public function Login($loginType){
	return '<br/><div class="container">
		<h2 class="text-danger">Previous User Accounts are no more valid, Kindly signup to create a new account.</h2><hr/>
                <h2>'.$loginType.' Login Form</h2>
                <form method="POST" id="login" class="symposiaForms">
                        <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control loginForm" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control loginForm" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary sympFormSubmit">Login</button>
                        <button type="button" id="forgot" class="btn btn-primary btn-warning" value="Forgot Password">Fogot Password</button>
		</form>
		<script>
		$(".symposiaForms").on("submit",function(event){
		$("loadingGif").show();
		//alert("Finally called......");
		event.preventDefault();
		var funcName="";
		var data={};
	
		$(".loginForm").each(function() {
		//alert($(this).val())
                console.log($(this).val());
                data[$(this).attr("id")]=$(this).val();
		});

		var funcName="ServeLogin";
                data["function_name"]=funcName;
		console.log(data);
		
		$.ajax({
                        url: "../controller/func.php",
                        method: "POST",
                        data : data,
                        success: function(response) {
                          console.log(response);
			  /*$("#loginstatus").html("Logged in as : "+data["username"]);
                          $("#result").html(response);*/
			  $("#loadingGif").show();
			  //$("#loginstatus").html(response);
                          $("#result").html(response);
			  $("#loadingGif").delay(1000).fadeOut();
                        }
		    });
		});

		var dataForgot={};
		$("#forgot").on("click",function(event){
			dataForgot["function_name"]="LoadForgotPasswordForm";

			$.ajax({
                        url: "../controller/func.php",
                        method: "POST",
			data:dataForgot,

			success: function(response) {
				$("#result").html(response);
			}

			});
		});
		</script>
        </div>';
	
	}

/*	public function AddSubEntries($subEntries,$mainEntry){

	$main='<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" id="topicDropDown" data-toggle="dropdown">'.
      $mainEntry.'
    </button>';
        $subMenu='<div class="dropdown-menu">';
        for($i= 0 ; $i < count($subEntries) ; $i++){

           $subMenu.='<a class="dropdown-item topic" id="'.$subEntries[$i].'" name="'.$subEntries[$i].'">'.$subEntries[$i].'</a>';
}
        
        $subMenu.='</div>';
        return $main.$subMenu."</div>";
}


	public function GetTopicDropDown(){
		//return "Hello Raman";
		$obj = new DB();
		$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
		$obj->Connect();
		$valArray = $obj->GetColumnArray("topics","Topic");	
		return $this->AddSubEntries($valArray,"Topic");
		//return $valArray[0];
	}
*/

public function Register($fieldNames){

	//return "Register function called of Forms class";
	session_start();
	if(isset($_SESSION["loggedin"])){
	$obj = new DB();
	$query = 'select uname, count(*) as counter from registration where uname="'.$_SESSION["username"].'"';
	$result = $obj->GetQueryResult($query);
	$row = $result->fetch_assoc();
	$counter = $row["counter"];

	$query = 'select * from registration where uname="'.$_SESSION["username"].'"';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	$result->free();

	$formContent='<br/><div class="container">
                <h2>Participant Registration</h2>
		<raman class="text-danger">(Please fill the below mentioned details carefully, as the same will be used to generate the receipt and certificates.)</raman><br/><br/>
                <form method="POST" id="register" enctype="multipart/form-data" class="">';
		

	$regno="";
	for($i=0 ; $i<count($fieldNames) ; $i++){

		if($fieldNames[$i]=="regno"){
			$regno=$row["regno"];
		}elseif($fieldNames[$i]=="uname"){
				$formContent.='<input type="hidden" class="form-control registration" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" value="'.$_SESSION["username"].'" readonly >';
			}else{
				
			$formContent.='<div class="form-group" id="group_'.$fieldNames[$i].'">
                                <label for="'.$fieldNames[$i].'">'.$fieldNames[$i].':</label>';
				
				//if($fieldNames[$i]=="FirstName" || $fieldNames[$i]=="LastName" || $fieldNames[$i]=="Email" || $fieldNames[$i]=="Mobile")
				if($fieldNames[$i]=="Email")
				$formContent.='<input type="text" class="form-control registration" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" value="'.$_SESSION[$fieldNames[$i]].'" readonly > </div>';
				elseif($fieldNames[$i]=="Initials"){
					$options = array('None', 'Dr.', 'Ms.', 'Mrs.','Mr.','Prof.','Kum.'); // The available options
					$selectedOption=trim($row[$fieldNames[$i]]);
					$selAccReq= '<select class="form-control initials registration" id="Initials" required>';
					foreach ($options as $option) {
						$selected = ($option == $selectedOption) ? 'selected' : '';
						if($counter==0)
						$selAccReq.='<option value="' . $option . '" >' . $option . '</option>';
						else
						$selAccReq.='<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
					}
					$selAccReq.='</select></div>';	
					$formContent.=$selAccReq;	
				}elseif($fieldNames[$i]=="Gender"){
					$options = array('None', 'Female', 'Male'); // The available options
					$selectedOption=trim($row[$fieldNames[$i]]);
					$selAccReq= '<select class="form-control gender registration" id="Gender" required>';
					foreach ($options as $option) {
						$selected = ($option == $selectedOption) ? 'selected' : '';
						$selAccReq.='<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
					}
					$selAccReq.='</select></div>';	
					$formContent.=$selAccReq;
 				}
				elseif($fieldNames[$i]=="Mobile")
				$formContent.='<input type="tel" class="form-control registration" placeholder="10 digit mobile number" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'"  pattern="[0-9]{10}" value="'.$row[$fieldNames[$i]].'" required></div>';
				//elseif($fieldNames[$i]=="Checkin_Date" || $fieldNames[$i]=="Checkout_Date")
				elseif($fieldNames[$i]=="Arrival_Date" || $fieldNames[$i]=="Departure_Date"){
					if($counter==0)
					$formContent.='<input type="date" class="form-control registration" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" required> </div>';	
					else
					$formContent.='<input type="date" class="form-control registration" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" value="'.date('Y-m-d', strtotime($row[$fieldNames[$i]])).'" required> </div>';
				}
				elseif($fieldNames[$i]=="Accommodation_Required"){
					$options = array('None', 'Yes', 'No'); // The available options
					$selectedOption=trim($row[$fieldNames[$i]]);
					$selAccReq= '<select class="form-control accommodation registration" id="Accommodation_Required">';
					foreach ($options as $option) {
						$selected = ($option == $selectedOption) ? 'selected' : '';
						$selAccReq.='<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
					}
					$selAccReq.='</select></div>';	
					$formContent.=$selAccReq;
				}elseif($fieldNames[$i]=="Attending_Orientation"){
					$options = array('None', 'Yes', 'No'); // The available options
					$selectedOption=trim($row[$fieldNames[$i]]);
					$selAccReq= '<select class="form-control accommodation registration" id="Attending_Orientation">';
					foreach ($options as $option) {
						$selected = ($option == $selectedOption) ? 'selected' : '';
						$selAccReq.='<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
					}
					$selAccReq.='</select></div>';	
					$formContent.=$selAccReq;
				}elseif($fieldNames[$i]=="Designation"){
                                        $options = array('None', 'Student', 'Research Associate','Scientist','Faculty','Others'); // The available options
                                        $selectedOption=trim($row[$fieldNames[$i]]);
                                        $selAccReq= '<select class="form-control accommodation registration" id="Designation">';
                                        foreach ($options as $option) {
                                                $selected = ($option == $selectedOption) ? 'selected' : '';
                                                $selAccReq.='<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                                        }
                                        $selAccReq.='</select></div>';  
                                        $formContent.=$selAccReq;
                                }
				elseif($fieldNames[$i]=="Accommodation_Preference"){
					//$options = array('None', 'DAECC Guest House', 'Postgraduate Hostel','Hotel: The Regenza by Tunga','The Jewel Of Chembur'); // The available options
					$options = array('None', 'Hostel', 'Hotel','Others'); // The available options
					$selectedOption=trim($row[$fieldNames[$i]]);
					$selAccReq= '<select class="form-control  accommodation registration" id="Accommodation_Preference" >';
					foreach ($options as $option) {
						$selected = ($option == $selectedOption) ? 'selected' : '';
						$selAccReq.='<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
					}
					$selAccReq.='</select></div>';	
					$formContent.=$selAccReq;

				}
				elseif($fieldNames[$i]=="Accommodation_Type"){
					$options = array('None', 'Single Occupancy', 'Double Occupancy'); // The available options
					$selectedOption=trim($row[$fieldNames[$i]]);
					$selAccReq= '<select class="form-control  accommodation registration" id="Accommodation_Type">';
					foreach ($options as $option) {
						$selected = ($option == $selectedOption) ? 'selected' : '';
						$selAccReq.='<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
					}
					$selAccReq.='</select></div>';	
					$formContent.=$selAccReq;
				}else
				$formContent.='<input type="text" class="form-control registration" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" value="'.$row[$fieldNames[$i]].'" required> </div>';
				
		}
		

		}

		$formContent.='<center><input type="submit" class="btn btn-primary form-group" value="Submit" id="updateRegistration"  functionName="UpdateRegistration" regno="'.$regno.'"></input></center>';
		$formContent.="</form></div>";
		$associateJs = '<script>
					
						var data={};

						$(function(){
							if($("#Accommodation_Required").val()=="No"){
								$("#Accommodation_Preference").val("");
								$("#Accommodation_Type").val("");
								$("#group_Accommodation_Preference").hide();
								$("#group_Accommodation_Type").hide();
								data["Accommodation_Type"]="";
								data["Accommodation_Preference"]="";
								
							}
						});

						$(".accommodation").on("change",function(){
							//alert($(this).attr("id")+" : "+$(this).val());
						});

						$("#Accommodation_Required").on("change",function(){
							if($("#Accommodation_Required").val()=="No"){
								$("#Accommodation_Preference").val("No");
								$("#Accommodation_Type").val("No");
								$("#group_Accommodation_Preference").hide();
								$("#group_Accommodation_Type").hide();
							}
							if($("#Accommodation_Required").val()=="Yes"){
								$("#Accommodation_Preference").val("None");
								$("#Accommodation_Type").val("None");
								$("#group_Accommodation_Preference").show();
								$("#group_Accommodation_Type").show();
							}

						});

						$("#updateRegistration").click(function(e){
						//	$("#register").on("submit",function(e){
						//$("#updateRegistration").on("submit",function(e){
							e.preventDefault();
							$("loadingGif").show();
							
							data["function_name"]=$(this).attr("functionName");
							data["regno"]=$(this).attr("regno");
							//alert(data["function_name"]);
							$(".registration").each(function(){
								if($(this).attr("name")=="MiddleName"){

								}else{
								if($(this).val()=="None" || $(this).val()=="" ){
									alert("Please fill "+$(this).attr("id"));
									exit;
								}
								}
								data[$(this).attr("id")]=$(this).val();
								//alert($(this).attr("id")+" : "+data[$(this).attr("id")])
								//if($(this).attr("id")=="Checkin_Date")
								//alert($(this).val());
							});

							$.ajax({
								url: "../controller/func.php",
								method: "POST",
								data : data,
								success: function(response) {
									
									$("#loadingGif").hide();
									//$("#newsubmission input").prop("disabled", false); 
									//$("#uploadAndSubmit").prop("disabled",false);
									$("#result").html(response);
								}
							});
						});
					
						</script>';

		return $formContent.$associateJs;
	}else{
		return Message("Please login before proceeding for regisration.","alert-danger"); 
	}
}

public function RefereeingConfirmation(){
	 	session_start();	
		$obj=new DB();
		$query="select UploadLocation from symposium";
		$result = $obj->GetQueryResult($query); 
		$row = $result->fetch_assoc();
		$loc = $row["UploadLocation"];
		$fullName=$_SESSION["FullName"];
		$formContent='<div class="container"> <br/>';
		if($_SESSION["appCertReq"]==="Yes" || $_SESSION["appCertReq"]==="yes")
		$formContent.='<input type="button" id="appreciationCertificate" refname="'.$fullName.'" uname="'.$_SESSION["username"].'" appCertReq="'.$_SESSION["appCertReq"].'" server="DownloadRefereeAppreciationCertificate" class="btn-primary taskbutton" value="Download appreciation Certificate SNP-2022"/><br/>';
		$formContent.='
                <h3>Dear Referee, thanks for sparing your time to consider our review request for SNP-2023.</h3>
		<form method="POST" id="consentForm" enctype="multipart/form-data" server="UpdateConsent" class="">';

		$formContent.='<p class="form-group"> Kindly select the appropriate option to accept or decline the review request </p>';
		$formContent.='<div class="custom-control custom-radio form-group">
			      <input type="radio" class="custom-control-input acceptreject" id="accepted" name="reviewrequest" required>
			      <label class="custom-control-label" for="accepted">Accepted</label>
			      </div>';
		$formContent.='<div class="custom-control custom-radio form-group">
			      <input type="radio" class="custom-control-input acceptreject" id="declined" name="reviewrequest">
			      <label class="custom-control-label" for="declined">Declined</label>
			      </div>';
		$formContent.='<input type="submit" class="btn btn-primary" value="Submit" function_name="UpdateConsent" id="submitConsent" />';

		$associatedJS = '<script>
				var data={};
				$(function(){
				$(".acceptreject").change(function() {
						data["invresult"]=$(this).attr("id");
						//alert(data["invresult"]);
				});
	
				$("#appreciationCertificate").click(function(e){
					data={};
					e.preventDefault();
					data["function_name"]=$(this).attr("server");
					data["uname"]=$(this).attr("uname");
					data["refname"]=$(this).attr("refname");
					data["appCertReq"]=$(this).attr("appCertReq");
					//alert(data["function_name"]);
					console.log(data);
				
					$.ajax({
						url: "../controller/func.php",
						method: "POST",
						data : data,
						xhrFields: {responseType: "blob"},
                                                success: function(response) {
				  			$("#pdfIframe").show();
							  var reader = new FileReader();
							  reader.onloadend = function() {
							  $("#pdfIframe").attr("src", reader.result);
                                                         };
                                                         reader.readAsDataURL(response);
                                                        }

					});

				});

				//$("#submitConsent").click(function(e){
				$("#consentForm").on("submit",function(e){
					e.preventDefault();
					//data["function_name"]=$(this).attr("function_name");
					data["function_name"]=$(this).attr("server");
					//alert(data["function_name"]);
					console.log(data);
				
					$.ajax({
						url: "../controller/func.php",
						method: "POST",
						data : data,
						success: function(response) {
							
							$("#loadingGif").hide();
							//$("#newsubmission input").prop("disabled", false); 
							//$("#uploadAndSubmit").prop("disabled",false);
							
							$("#result").html(response);
							var accrej=$(".acceptreject").attr("id");
							if( data["invresult"]=="accepted")
								 $("#YourTasks").show();
							else
								alert("Thank you for your time.");
						}
					});

				});

				});

				</script>';



		return $formContent.$associatedJS;

}


	public function NewSubmission($fieldNames){
	//return
		$obj=new DB();
		$query="select UploadLocation from symposium";
		$result = $obj->GetQueryResult($query); 
		$row = $result->fetch_assoc();
		$loc = $row["UploadLocation"];

		$formContent='<br/><div class="container">
                <h2>Upload new contribution</h2>
                <form method="POST" id="newsubmisson" enctype="multipart/form-data" class="">';
		
		for($i=0 ; $i<count($fieldNames) ; $i++){
			if($fieldNames[$i]=="uname" || $fieldNames[$i]=="status" || $fieldNames[$i]=="AuthorFirstNamesList" || $fieldNames[$i]=="AuthorLastNamesList" ||$fieldNames[$i]=="AuthorEmailsList" || $fieldNames[$i]=="remarks" || $fieldNames[$i]=="refereeName"){
			}else{
			$formContent.='<div class="form-group">
                                <label for="'.$fieldNames[$i].'">'.$fieldNames[$i].':</label>';
			if($fieldNames[$i]=="Topic"){
				$formContent.=GetDropDown("topics","Topic");
				$formContent.='<input type="text" id="topicText" class="form-control" required/>';
			}
			elseif($fieldNames[$i]=="Category"){
				//$formContent.='<div id="Category"></div>';
				$formContent.=GetDropDown("categories","category");
				$formContent.='<input type="text" id="categoryText" class="form-control" required/>';
			}
			elseif($fieldNames[$i]=="Filename"){

   $fileComponent='<div class="custom-file mb-3">
      <input type="file" class="custom-file-input uploadFile form-control" id="uploadFile" loc="../'.$loc.'" name="uploadFile" required>
      <label class="custom-file-label" for="uploadFile">Choose file</label>
    </div>';
    $formContent.=$fileComponent;
				//$uploadObj = new Components();
				//$formContent.=$uploadObj->RenderFileUpload();
			}else
				$formContent.='
                                <input type="text" class="form-control" id="'.$fieldNames[$i].'" name="'.$fieldNames[$i].'" required >
                        </div>
<div id="uploadStatus"></div>
';
}

		}

		 $formContent.=AuthorList().'<br/><hr/>'; 
                 $formContent.='<button type="submit" class="btn btn-primary" id="uploadAndSubmit">Submit</button>
		</form>
		<img id="loadingGif" src="../images/loadingTransparent.gif" style="display: none;" alt="Loading...">
		<script>
		$(function(){
		$("#loadingGif").hide();
		$(".custom-file-input").on("change",function(e){
			//alert("file selected...");
			var fileName = e.target.files[0].name;
			//alert(fileName);

			if(e.target.files[0].size > 1048576){

				alert("File size exceeds the allowed size of 1 MB");
				const form = document.querySelector("form");
				form.reset();
				$(this).siblings(".custom-file-label").removeClass("selected").html("Choose file");
				return;

			}
			dataUp.append("file",e.target.files[0]);
			dataUp.append("loc",$(this).attr("loc"));


			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});	

		//---------- This whole block is NOT required-------	
		//var dataUp=new FormData();
		/*$("#uploadFile").on("change",function(){
		//alert("Symp for submit clicke....");
		var fileInput = document.getElementById($(this).attr("id"));
		alert(fileInput.files[0].name); 
		if(fileInput.files[0].size > 1048576){
			alert("File size exceeds the allowed size of 1 MB");
			//$("#uploadFile").val(""); 
			return;
		}
		

		//console.log(fileInput);
		dataUp.append("file",fileInput.files[0]);
		dataUp.append("loc",$(this).attr("loc"));
		console.log("-----------------");
		console.log(dataUp);
		});*/
		//-----------------------------------------------------

		$("#uploadAndSubmit").on("click",function(e){
			//e.preventDefault();
		dataUp.append("function_name","Upload");
			e.preventDefault();

		$("#loadingGif").show();
                $("#newsubmission input").prop("disabled", true);
		$(this).prop("disabled",true);

		//Lets try to get the author names and email list.
		//$("#testUploadAndSubmit").click(function(e){
                                var authorFirstNameTextBoxValues = $(".authorfirstname").map(function() {
                                return $(this).val();
                                }).get();
				var authorLastNameTextBoxValues = $(".authorlastname").map(function() {
                                return $(this).val();
                                }).get();
				//alert("FirstName : "+authorFirstNameTextBoxValues);
				//alert("LastName : "+authorLastNameTextBoxValues);
                                var authorEmailTextBoxValues = $(".authorEmail").map(function() {
                                return $(this).val();
                                }).get();
				dataUp.append("authorfirstnameslist",authorFirstNameTextBoxValues);
				dataUp.append("authorlastnameslist",authorLastNameTextBoxValues);
				dataUp.append("authoremailslist",authorEmailTextBoxValues);
                               //alert(authorNameTextBoxValues+" : "+authorEmailTextBoxValues);
                 //});


			if($("#topicText").val()==""){
				alert("Please select the paper topic.");
				return;
			}if($("#categoryText").val()==""){
				alert("Please select the paper category.");
				return;
			}if($("#Title").val()==""){
				alert("Please fill the paper title.");
				return;
			}

			var returnVar=0;
			if($("#uploadFile").val()==""){
				returnVar=1;	
         			$("#uploadFile").css("background", "yellow");
				alert("Please select a file to upload.");
				return;
			}

			$(".authorlastname").each(function(){
				if($(this).val()==""){
         			   $(this).css("background", "yellow");
				   returnVar=1;
				   alert("Please fill the Last Name : "+returnVar);
        			}
			});
			if(returnVar==1){
			return;
			}
			$(".authorfirstname").each(function(){
				if($(this).val()==""){
         			   $(this).css("background", "yellow");
				   returnVar=1;
				   alert("Please fill the First Name : "+returnVar);
        			}
			});
			if(returnVar==1){
			return;
			}


			$(".authorEmail").each(function(){
				if($(this).val()==""){
         			   $(this).css("background", "yellow");
				   returnVar=1;
				   alert("Please fill the Author Email : "+returnVar);
        			}
			});
			

			if(returnVar==1){
			return;
			}
			//alert("Should not reach here....");

			dataUp.append("title",$("#Title").val());
			//alert("Upload and Submit clicked...");
			console.log(dataUp);
			$.ajax({
				url: "../controller/func.php",
				method: "POST",
				data : dataUp,
				processData : false,
				contentType : false,
				success: function(response) {
					//$("#uploadStatus").html(response);
					$("#loadingGif").hide();
                                        $("#newsubmission input").prop("disabled", false); 
					$("#uploadAndSubmit").prop("disabled",false);
					$("#result").html(response);
				}
			});

		});

		$(".Topic").on("click",function(event){
			$("#topicText").val($(this).attr("id"));
			dataUp.append("topicid",$(this).attr("catid"));
		});
		$(".category").on("click",function(event){
			$("#categoryText").val($(this).attr("id"));
			dataUp.append("categoryid",$(this).attr("catid"));
		});

	
		/*$(".topic").on("click",function(event){
		//alert("Topic clicked.......");
		$("#topicText").val($(this).attr("id"));
		dataUp.append("topicid",$(this).attr("catid"));
		event.preventDefault();
		var funcName="FillCategory";
		var data={};
		//var funcName=$(this).attr("id");
		//alert(funcName);
		data["function_name"]=funcName;
		data["topic"]=$(this).attr("id");
		console.log(data);
		$.ajax({
		    url: "../controller/func.php",
		    method: "POST",
		    data : data,
		    success: function(response) {
		    $("#Category").html(response);
		    }
		  });

		
		});*/

});		
		</script>
        </div><br/>';

	return $formContent;	
	}



	public function Contact(){
	$tableName='contactus';
	$obj = new DB();
        //$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
        //$obj->Connect();
	$result = "<h2><br/>Contact Us<br/></h2>";
        return $result.$obj->GetTableDataContact($tableName);

	/*return '<div class="container">
		<div class="w-50 p-3" style="background-color: #eee;">
		Raman Sehgal <br/>
		Scientific Secretary <br/>
		</div>		
                        </div>';*/
	
	}

	
	public function ServeSignup(){
		return "<div>ServeSignup function called..........</div>";
	}

	public function ServeLogin(){
		return "<div>ServeLogin function called..........</div>";
	}
       
public function PaymentForm($payment_type){
        session_start();
        return '<br/><div class="container">
                <h2>Payment Detail Form</h2>
                <form method="POST" id="login" server="ServePayment" class="symposiaForms" payment_type="'.$payment_type.'">
                        <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control paymentForm" id="username" name="username" value="'.$_SESSION["username"].'" readonly>
                        </div>
                        <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control paymentForm" id="name" name="name" value="'.$_SESSION["FirstName"].' '.$_SESSION["LastName"].'"readonly>
                        </div>
                        <div class="form-group">
                                <label for="bankname">Bank Name:</label>
                                <input type="text" class="form-control paymentForm" id="bankname" name="bankname" required>
                        </div>
                        <div class="form-group">
                                <label for="dateoftrans">Date of Transaction:</label>
                                <input type="date" class="form-control paymentForm" id="dateoftrans" name="dateoftrans" required>
                        </div>
                        <div class="form-group">
                                <label for="refnum">Transaction Reference Number:</label>
                                <input type="text" class="form-control paymentForm" id="refnum" name="refnum" required>
                        </div><div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="text" class="form-control paymentForm" id="amount" name="amount" required>
                        </div>

                        <button type="submit" class="btn btn-primary paymentFormSubmit">Submit</button>
                </form>
                <script>
                $(".symposiaForms").on("submit",function(event){
                //$("loadingGif").show();
                //alert("Finally called......");
                event.preventDefault();
                var data={};
        
                $(".paymentForm").each(function() {
                //alert($(this).val())
console.log($(this).val());
                data[$(this).attr("id")]=$(this).val();
                });

                var funcName=$(this).attr("server");
                data["function_name"]=funcName;
		data["payment_type"]=$(this).attr("payment_type");
                console.log(data);
                
                $.ajax({
                        url: "../controller/func.php",
                        method: "POST",
                        data : data,
                        success: function(response) {
                          console.log(response);
                          /*$("#loginstatus").html("Logged in as : "+data["username"]);
                          $("#result").html(response);*/
                          //$("#loadingGif").show();
                          //$("#loginstatus").html(response);
                          $("#result").html(response);
                          //$("#loadingGif").delay(1000).fadeOut();
                        }
                    });
                });

                </script>
        </div>';

        }

}
?>
