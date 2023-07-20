<?php
function  SympnpCarousel(){
$carouselMsg='<div id="mySlider" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#mySlider" data-slide-to="0" class="active"></li>
      <li data-target="#mySlider" data-slide-to="1"></li>
      <li data-target="#mySlider" data-slide-to="2"></li>
    </ol>
  
    <!-- Slides -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../images/homeScreen1.PNG" class="d-block w-100" alt="Slide 1">
      </div>
	<div class="carousel-item">
        <img src="../images/homeScreen2.PNG" class="d-block w-100" alt="Slide 1">
      </div>
	<div class="carousel-item">
        <img src="../images/homeScreen3.PNG" class="d-block w-100" alt="Slide 1">
      </div>


       <!-- Add here more blocks to start slide show --> 
     </div>
  
    <!-- Navigation Arrows -->
    <a class="carousel-control-prev" href="#mySlider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#mySlider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

';

return $carouselMsg;
}
?>
