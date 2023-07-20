<?php

function SympnpHeader($headerType=""){

    $headerMsg="";
    $headerType=$_POST["value"];
    if($headerType==""){

    }else{
    $headerMsg='<div class="header" style="margin-bottom: 0px !important;">
                <div class="container">
			<div class="row">
                        <div class="col-12 colHeader">
			    <h3 class="text-center font-weight-bold text-light">'.strtoupper($headerType).'</h3>
                        </div>
			</div>';
	if($headerType==="Home"){
}else
{

                    /*$headerMsg.='<div class="row">
                        <div class="col-12 colHeader">
			    <h3 class="text-center  text-light" id="sympnpHomeLink">Home /&nbsp'.$headerType.' </h3>
                        </div>

                    </div>';*/
}
 $headerMsg.=' </div>
            </div>';

    }

    $associatedJs ="<script>
                    $('#sympnpHomeLink').click(function(){

                        $('#Home').trigger('click');
                    });
                    </script>";
    return $headerMsg.$associatedJs;
}

?>
