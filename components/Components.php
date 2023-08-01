<?php
class Components{
  public $fid;
  public $fname;
  public $fclass;
  public $fvalue;
  public $fuploadLoc;

  
    function __construct(){}

    //function __construct($id, $name, $class, $value) {
    public function Set($id, $name, $class, $value) {
    $this->fid = $id;
    $this->fname = $name;
    $this->fclass = $class;
    $this->fvalue = $value;
    $this->fuploadLoc = "";
    }
   
     
  public function RenderFileUpload($id='uploadFile',$name='uploadFile',$class='uploadFile',$value='Upload',$loc='/var/www/html/Symposia/Uploads/'){
 	$this->fuploadLoc = $loc;
    	return '<div class="form-group">
	        <input type="file" id="'.$id.'" class="'.$class.'" form-control-file border" name="'.$name.'" value="'.$value.'" loc="'.$this->fuploadLoc.'"></div>';//.$this->RenderButton();
    }

    public function RenderSubmitButton($id='submit',$name='submit',$class='submit',$value='Submit'){
	return '<button type="submit" class="btn btn-primary '.$class.'">'.$value.'</button>';
}
  public function RenderButton(){
	return '<button type="button" class="btn btn-primary">Submit</button>';
}

}

function AuthorList(){
	$authList = '<div id="original">
			<table class="table">
			<tr id="troriginal">
			<td><input type="text"class="form-control authorlastname" placeholder="Last Name" required/></td>
			<td><input type="text"class="form-control authorfirstname" placeholder="First / Middle Name" required/></td>
			<td><input type="email" class="form-control authoremail" placeholder="Author Email" required/></td>
		        <td><button id="0" class="remove btn btn-danger">Remove</button></td>
			</tr>
			</table>
		    </div>
		    <button id="copy" class="btn btn-success">Add Author</button>';
	//$authList.='<button id="testUploadAndSubmit" class="btn btn-warning">Get Author List</button>';

	$authList.='<script>
				$(function(){
				var counter=0;
				    $(".remove").click(function(e){
					//alert("My ID : "+$(this).attr("id"));
					//alert($(this).closest("tr").attr("id"));
					var parId = $(this).closest("tr").attr("id");
					var actId = "troriginal";
					//if((parId.localeCompare(actId))){
					if((parId===actId)){
						alert("Cannot remove the first Author.");
					}else{
					$(this).closest("tr").remove();
					}
				});
				
				$("#copy").click( function(e) {
					e.preventDefault();
                                        counter++;
                                        //alert("Counter : "+counter);
					var copy = $("#troriginal").clone(true);
					copy.attr("id",counter);
                                        copy.insertAfter("#troriginal");
				});
				$("#testUploadAndSubmit").click(function(e){
					e.preventDefault();
					var authorNameTextBoxValues = $(".authorName").map(function() {
  					return $(this).val();
					}).get();
					var authorEmailTextBoxValues = $(".authorEmail").map(function() {
  					return $(this).val();
					}).get();

					alert(authorNameTextBoxValues+" : "+authorEmailTextBoxValues);
				});	
				});

					
			$(document).ready(function() {

								
				
			});
			
		    </script>';
	return $authList;
}

?>
