 
<div class="row">
                        <!-- Penyakit -->
                        <div class="col-xl-3 col-md-6 mb-4">
 <?php 
	$htpenyakit=mysqli_query($conn,"SELECT count(*) as total from penyakit");
	  $dtpenyakit=mysqli_fetch_assoc($htpenyakit); ?>
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Total Penyakit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtpenyakit["total"]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bug fa-2x text-black-50-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            <!-- Gejala -->
                        <div class="col-xl-3 col-md-6 mb-4">
<?php 
  $htgejala=mysqli_query($conn,"SELECT count(*) as total from gejala");
	$dtgejala=mysqli_fetch_assoc($htgejala); ?>
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Gejala</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtgejala["total"]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-radiation fa-2x text-black-50-300 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pengetahuan -->
                        <div class="col-xl-3 col-md-6 mb-4">
<?php 
	$htpengetahuan=mysqli_query($conn,"SELECT count(*) as total from basis_pengetahuan");
	  $dtpengetahuan=mysqli_fetch_assoc($htpengetahuan); ?>
                            <div class="card border-left-Success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pengetahuan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtpengetahuan["total"]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sitemap fa-2x text-black-50-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Administrator -->
                        
<?php 
	$htadmin=mysqli_query($conn,"SELECT count(*) as total from admin");
	  $dtadmin=mysqli_fetch_assoc($htadmin); ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-Primary  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Admin </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dtadmin["total"]; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-black-50-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 </div>
 <!-- Page slider -->

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="https://www.w3schools.com/howto/img_snow_wide.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="https://www.w3schools.com/howto/img_mountains_wide.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
 <!-- Page slider end -->
    <script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" aktif", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " aktif";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>