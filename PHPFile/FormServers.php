<?php

//require "globals.php";
//require "Forms.php";
//$forms = new Forms();
//Helper function to select the working function
//$formType = $_POST["formType"];
//echo "Raman : $funcName";
//echo "Hello Raman";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Signup') {
                    // call the function to process the form data
                    echo ServeSignup();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $funcName=='Login') {
                    // call the function to process the form data
                    echo ServeLogin();
}

if($formType=="Login"){
echo "Login form called.......";
}

//Real working function
function ServeSignup(){
               return "<div>ServeSignup function called..........</div>";
}

function ServeLogin(){
               return "<div>ServeLogin function called..........</div>";
}
 
?>
